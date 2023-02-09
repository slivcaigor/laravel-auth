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

    // create
    public function projectCreate() {

        return view('pages.projectCreate');
    }

    // store
    public function projectStore(Request $request) {

        $data = $request -> validate([
            'name' => 'required|string|max:64',
            'description' => 'nullable|string',
            'main_image' => 'string',
            'release_date' => 'date',
            'repo_link' => 'string',
        ]);
    
        $project = new Project();
    
        $project -> name = $data['name'];
        $project -> description = $data['description'];
        $project -> main_image = $data['main_image'];
        $project -> release_date = $data['release_date'];
        $project -> repo_link = $data['repo_link'];

    
        $project -> save();
    
        return redirect() -> route('admin');
    }

    // edit
    public function projectEdit(Project $project) {

        return view('pages.projectEdit', compact('project'));
    }

    // update
    public function projectUpdate(Request $request, Project $project) {

        $data = $request -> validate([
            'name' => 'required|string|max:64',
            'description' => 'nullable|string',
            'main_image' => 'string',
            'release_date' => 'date',
            'repo_link' => 'string',
        ]);
    
        $project -> name = $data['name'];
        $project -> description = $data['description'];
        $project -> main_image = $data['main_image'];
        $project -> release_date = $data['release_date'];
        $project -> repo_link = $data['repo_link'];

    
        $project -> save();
    
    
        return redirect() -> route('admin');
    }
}