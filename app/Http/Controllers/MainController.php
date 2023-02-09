<?php

namespace App\Http\Controllers;
use App\Models\Project;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function home() {

        return view('pages.home');
    }

    public function projects() {

        $projects = Project :: all();

        return view('pages.projects', compact('projects'));
    }

    public function loggedAdmin() {

        if (auth()->user()->email !== 'slivcaigor@gmail.com') {
            return redirect('/');
        } else {
            return view('pages.admin');
        }
            }

    // show
    public function projectShow(Project $project) {

        return view('pages.projectShow', compact('project'));
    }
}