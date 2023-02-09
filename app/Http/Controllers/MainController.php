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

    public function admin() {

        $projects = Project :: all();
        
        if (auth()->user()->email !== 'admin@mail.com') {
            return redirect('/');
        } else {
            return view('pages.admin', compact('projects'));
        }
    }

    // show
    public function projectShow(Project $project) {

        return view('pages.projectShow', compact('project'));
    }

    // delete
    public function projectDelete(Project $project) {

        $project -> delete();
    
        return redirect() -> route('admin');
    }
}