<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

class PagesController extends Controller
{
    public function about()
    {
        return view('pages.about');
    }

    public function home()
    {
        if (Auth::guest()) {
            return view('pages.about');
        }

        return view('pages.home')->with('user', Auth::user());
    }

}
