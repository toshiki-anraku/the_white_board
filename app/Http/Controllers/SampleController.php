<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;

class SampleController extends Controller
{
    public function top() {
        return Inertia::render('Top', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
        ]);
    }

    public function sample()
    {
        return Inertia::render('Home');
    }

    public function dashboard()
    {
        return Inertia::render('Dashboard');
    }
}