<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


use function Laravel\Prompts\alert;

class LoginController extends Controller
{
    public function create()
    {
        return view('login.create');
    }
    
    public function store()
    {
        request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8']
        ]);

        if(auth()->attempt([
            'email' => request('email'),
            'password' => request('password')
        ])){
            return redirect('/');
        }else{
            return back()->withErrors([
                'email' => 'Wrong credentials'
            ]);
        }

        // $user = User::where('email',request('email'))->first();
        // if($user){
        //     if(Hash::check(request('password'),$user->password)){
        //         auth()->login($user);
        //         return redirect('/');
        //     }
        //     else{
        //         return back()->withErrors([
        //             'password' => 'Password incorrect'
        //         ]);
        //     }
        // }else{
        //     return back()->withErrors([
        //         'email' => 'User does not exist'
        //     ]);
        // }
    }
}
