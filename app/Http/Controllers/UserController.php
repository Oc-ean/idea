<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     //
    // }

    /**
     * Show the form for creating a new resource.
     *
     */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     *
     *
     */

    /**
     * Display the specified resource.
     *

     */
    public function show(User $user)
    {
        $ideas = $user->ideas()->paginate(5);
        return view("users.show", compact("user", 'ideas'));
        //
    }

    // /**
    //  * Show the form for editing the specified resource.
    // //  *
    // // //  * @param  int  $id
    // // //  * @return \Illuminate\Http\Response
    // //  */
    public function edit(User $user)
    {
        $editing = true;
        $ideas = $user->ideas()->paginate(5);

        return view("users.edit", compact('user', 'editing', 'ideas'));

        //
    }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    public function update(User $user)
    {
        $validate = request()->validate([
            'name' => 'required|min:3|max:40',
            'bio' => 'nullable|min:1|max:255',
            'image' => 'image',
        ]);

        if (request()->hasFile('image')) {
            $image = request()->file('image');
            Log::info('File uploaded: ' . $image->getClientOriginalName());

            $imagePath = $image->store('profile', 'public');
            Log::info('File stored at: ' . $imagePath);
            $validate['image'] = $imagePath;
            Storage::disk('public')->delete($user->image);

        }

        $user->update($validate);

        return redirect()->route('profile');
    }

    public function profile()
    {
        $user = Auth::user();

        if (!($user instanceof User)) {
            abort(404, 'User not found');
        }

        return $this->show($user);
    }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */

}
