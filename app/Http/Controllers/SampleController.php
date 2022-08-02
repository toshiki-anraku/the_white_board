<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class SampleController extends Controller
{
    public function sample()
    {
        return Inertia::render('Home',[
            'time' => Carbon::now(),
        ]);
    }
}