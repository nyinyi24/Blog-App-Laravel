<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function destory()
    {
        auth()->logout();

        return redirect('/login');
    }
}
