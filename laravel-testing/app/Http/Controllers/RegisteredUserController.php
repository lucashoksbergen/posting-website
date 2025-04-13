<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store()
    {

        $validatedAttributes = request()->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email', 'confirmed'],
            'password' => ['required', Password::min(5)->letters(), 'confirmed'] // Can add more requirements eventually
        ]);

        $user = User::create($validatedAttributes);

        Auth::login($user);

        return redirect('/posts');
    }
}
