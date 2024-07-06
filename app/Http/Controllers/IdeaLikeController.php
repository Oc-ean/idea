<?php

namespace App\Http\Controllers;

use App\Models\Idea;

class IdeaLikeController extends Controller
{
    public function like(Idea $idea)
    {
        $liker = auth()->user();

        $liker->likes()->attach($idea->id);
        return redirect()->route('dashboard')->with("success", "Liked successfully");

    }

    public function unlike(Idea $idea)
    {
        $liker = auth()->user();

        $liker->likes()->detach($idea->id);
        return redirect()->route('dashboard')->with("success", "unlike successfully");

    }
}
