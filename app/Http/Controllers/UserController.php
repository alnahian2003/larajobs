<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginFormRequest;
use App\Http\Requests\RegisterFormRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("users.login", [
            'title' => 'Login to your account',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.register', [
            'title' => 'Create a new account',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(RegisterFormRequest $request)
    {
        $validated = $request->safe()->only(['name', 'email', 'password']);

        // Hash the password
        $validated['password'] = bcrypt($validated['password']);

        // Create and login the user
        $user = User::create($validated);
        auth()->login($user, true);

        return redirect()->route('jobs.index')->with('message', 'Account Created Successfully!');
    }

    /**
     * Authenticate and Login a User
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(LoginFormRequest $request)
    {
        $validated = $request->safe()->only(['email', 'password']);
        $remember = request()->has('remember') ? true : false;

        // Attempt to login with safe values
        if (auth()->attempt($validated, $remember)) {
            session()->regenerate();

            return redirect()->intended('/')->with('message', "You're now logged in 🥰");
        }

        return back()->withErrors(['email' => 'Invalid credentials provided'])->onlyInput('email');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function logout(User $user)
    {
        auth()->logout($user);
        session()->invalidate();
        session()->regenerate();
        session()->regenerateToken();

        return redirect()->route('jobs.index')->with('message', 'You have been logged out! 😶');
    }
}
