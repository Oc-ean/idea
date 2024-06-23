<?php

namespace App\Http\Controllers;

use App\Models\Idea;

class DashBoardController extends Controller
{

    public function index()
    {
        // $ideas = Idea::when(request()->has('search'), function ($query) {
        //     $query->search(request('search', ''));
        // })->orderBy('created_at', 'DESC')->paginate(5);
        $ideas = Idea::orderBy('created_at', 'DESC');
        if (request()->has('search')) {
            $search = request('search', '');
            $ideas = $ideas->where('content', 'like', "%{$search}%");
        }

        return view('dashboard', [
            'ideas' => $ideas->paginate(5),
        ]);
    }
}
// public function index()
// {

//     $users = [
//         [

//             'name' => 'Alex',
//             'age' => '30',

//         ],
//         [

//             'name' => 'Micheal',
//             'age' => '25',

//         ],
//     ];
//     return view("dashboard", [
//         "users" => $users,
//     ], );
// }
