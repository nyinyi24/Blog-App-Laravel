<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index() {
        $name = 'Nyi Nyi Min Lwin';
        return view('about', [
            'name' => $name
        ]);
    }
}
