<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function home() {

        return view('pages.home');
    }

    public function loggedAdmin() {

        if (auth()->user()->email !== 'slivcaigor@gmail.com') {
            return redirect()->back();
        } else {
            return view('pages.admin');
        }
            }
}