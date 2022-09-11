<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        //return view('auth.register');
        return view('teste');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'cpf' => ['required', 'string', 'max:11', 'unique:users'],
            'ramal' => ['required', 'string', 'max:4'],
            'department' => ['required', 'string', 'max:60'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        

        $user = User::create([
            'name' => $request->name,
            'cpf' => $request->cpf,
            'ramal' => $request->ramal,
            'department' => $request->department,
            'password' => Hash::make($request->password)
        ])->givePermissionTo('users');
        
        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
