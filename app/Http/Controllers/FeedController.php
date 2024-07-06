<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    /**
     * Handle the incoming request.
     *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {

        $user = auth()->user();
        $following_ids = $user->followings()->pluck("user_id");
        //
        $ideas = Idea::WhereIn('user_id', $following_ids)->latest();
        if (request()->has('search')) {
            $search = request('search', '');
            $ideas = $ideas->where('content', 'like', "%{$search}%");
        }

        return view('users.feed', [
            'ideas' => $ideas->paginate(5),
        ]);
    }
}
