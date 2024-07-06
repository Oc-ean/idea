<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //

    public function registerUser()
    {
        return view('auth.register');
    }

    public function store()
    {
        //validate
        $ideas = Idea::paginate(10);
        // dd($ideas);
        $validateData = request()->validate(
            [
                'name' => 'required|min:3|max:40',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|confirmed|min:8',
            ]
        );

        $user = User::create([
            'name' => $validateData['name'],
            'email' => $validateData['email'],
            'password' => Hash::make($validateData['password']),
        ]);

        // dd($user);
        return view('dashboard', compact('ideas'))->with('success', 'Idea deleted successfully!');
    }

    public function signinUser()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $validated = request()->validate(
            [
                'email' => 'required|email',
                'password' => 'required|min:8',
            ]
        );
        // dd($validated);
        if (auth()->attempt($validated)) {
            request()->session()->regenerate();

            return redirect()->route('dashboard')->with('success', 'Logged in successfully!');
        }

        return redirect()->route('login')->withErrors([
            'email' => "No matching user found with the provided email and password",
        ]);
    }
    // if (Auth::attempt($validateData)) {
    //     request()->session()->regenerate();
    //     return redirect()->route('dashboard')->with('success', 'Signed in Successful');
    // }
    // return redirect()->route('login')->withErrors([
    //     'emmail' => 'User not found',
    // ]);

    public function logout()
    {
        auth()->logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('dashboard')->with('success', 'logged out successfully');
    }
}
