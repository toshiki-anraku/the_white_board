<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function mypage()
    {
        return Inertia::render('Mypage');
    }
}