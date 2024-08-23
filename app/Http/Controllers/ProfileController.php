<?php

namespace App\Http\Controllers;

use App\Models\blog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function show(User $user)
    {
        return view('profile.show', [
            'user' => $user,
            'blog' => Blog::all()
        ]);
        
    }

    public function edit(User $user) {
        return view('profile.edit' , [
            'user' => $user
        ]);
    }

    public function update(User $user)
    {
        request()->validate([
            'photo' => ['nullable' , 'image'],
            'name' => ['required'],
            'username' => ['required'],
            'email' => ['required'],
            'biouser' => ['nullable']
        ]);

        $user->name = request('name');
        $user->username = request('username');
        $user->email = request('email');
        $user->biouser = request('biouser');
        if(request('photo')){
        $path = public_path('storage' . $user->photo);
        if($user->photo && File::exists($path)){
            File::delete($path);
        }

        $user->photo = '/' . request('photo')->store('/users' , 'public');
        }
        $user->save();
        

        return redirect('/');
    }

    public function store(){
        return view('profile.store');
    }

    public function changePassword(User $user){
        if(Hash::check(request('oldpassword'), $user->password)){
            $user->password = request('newpassword');
            $user->save();
        }else{
            return back()->withErrors([
                            'oldpassword' => 'Password incorrect'
                        ]);
        }

        return redirect('/');
    }

}
