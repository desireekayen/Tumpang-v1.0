<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    //Show Register/Create users Form
    public function create()
    {
        return view('users.register');
    }

    //Create New User 
    public function store(Request $request) {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'], 
            'phone' => ['required', 'regex:/^(\+?6?01)[0-46-9]-*[0-9]{7,8}$/'],
            'email' => ['required','email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6'
        ]);

        //Hash Password
        $formFields['password'] = bcrypt($formFields['password']);

        //Create User
        $user = User::create($formFields);

        //Login
        auth()->login($user);

        return redirect('/')->with('message', 'User created and logged in');
    }

    //Logout User
    public function logout(Request $request) {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You have been logged out!');
    }

    //Show Login Form
    public function login() {
        return view('users.login');
    }

    //Authenticate User
    public function authenticate(Request $request) {
        $formFields = $request->validate([ 
            'email' => ['required','email'],
            'password' => 'required'
        ]);

        if(auth()->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect('/')->with('message', 'You are now logged in!');
        }

        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }
}
