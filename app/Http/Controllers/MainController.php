<?php

namespace App\Http\Controllers;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


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
            'name' => 'required|string|min:3|max:64|unique:projects,name',
            'description' => 'nullable|string',
            'main_image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'release_date' => 'required|date|before:today',
            'repo_link' => 'required|string|unique:projects,repo_link',
        ]);
        $img_path = Storage::put('uploads', $data['main_image']);
        $data['main_image'] = $img_path;

        $project = Project::create($data);
    
        return redirect() -> route('admin', $project);
    }

    // edit
    public function projectEdit(Project $project) {

        return view('pages.projectEdit', compact('project'));
    }

    // update
    public function projectUpdate(Request $request, Project $project) {

        $data = $request -> validate([
            'name' => 'required|string|min:3|max:64|unique:projects,name,' . $project -> id,
            'description' => 'nullable|string',
            'main_image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'release_date' => 'required|date|before:today',
            'repo_link' => 'required|string|unique:projects,repo_link,' . $project -> id,
        ]);
    
        $img_path = Storage::put('uploads', $data['main_image']);
        $data['main_image'] = $img_path;

        $project -> update($data);
        $project -> save();

    
    
        return redirect() -> route('admin', $project);
    }
}