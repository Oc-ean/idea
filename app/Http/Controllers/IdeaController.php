<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class IdeaController extends Controller
{
    //

    public function show(Idea $idea)
    {
        // dd($idea->comments());
        return view("ideas.show", compact('idea'));
    }
    public function edit(Idea $idea)
    {
        $editing = true;
        return view("ideas.show", compact("idea", "editing"));
    }
    public function store()
    {
        try {
            $data = $this->validateRequest();

            $data['user_id'] = auth()->id();
            $data['image'] = $this->handleImageUpload();

            $idea = Idea::create($data);

            return redirect()->route('dashboard')->with('success', 'Idea created successfully!');
        } catch (\Exception $e) {
            Log::error('Error creating idea: ' . $e->getMessage());
            return redirect()->back()->with('error', 'There was an issue creating the idea. Please try again.');
        }
    }

    private function validateRequest()
    {
        return request()->validate([
            'content' => 'required|min:5|max:350',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    }

    private function handleImageUpload()
    {
        if (request()->hasFile('image')) {
            $image = request()->file('image');
            Log::info('File uploaded: ' . $image->getClientOriginalName());

            $imagePath = $image->store('images', 'public');
            Log::info('File stored at: ' . $imagePath);

            return $imagePath;
        }

        return null;
    }

    public function destroy(Idea $idea)
    {
        if (auth()->id() !== $idea->user_id) {
            abort(404, 'You can\'t delete the post');
        }

        // Delete the associated image from storage if it exists
        if ($idea->image) {
            Storage::disk('public')->delete($idea->image ?? '');
            Log::info('Image deleted: ' . $idea->image);
        }

        $idea->delete();
        return redirect()->route('dashboard')->with('success', 'Idea deleted successfully!');
    }

    public function update(Idea $idea)
    {
        $data = request()->validate([
            'content' => 'required|min:5|max:350',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        Log::info('Update method called');
        Log::info('Request data: ' . json_encode(request()->all()));

        $idea->content = $data['content'];

        if (request()->hasFile('image')) {
            Log::info('Image uploaded: ' . request()->file('image')->getClientOriginalName());

            // Delete old image if it exists
            if ($idea->image) {
                Storage::disk('public')->delete($idea->image);
                Log::info('Old image deleted: ' . $idea->image);
            }

            $imagePath = request()->file('image')->store('images', 'public');
            $idea->image = $imagePath;
            Log::info('New image stored at: ' . $imagePath);
        }

        $idea->save();

        Log::info('Idea updated: ' . json_encode($idea));

        // dd($idea);

        return redirect()->route('ideas.show', $idea->id)->with('success', 'Idea updated successfully!');
    }

}
