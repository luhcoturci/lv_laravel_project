<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Project;
class AdminProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $projects = Project::all();
        return view('AdminProject.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view ('AdminProject.create_project',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'title' => 'required',
            'thumbnail' => 'required',
            'description' => 'required',
            'github_link' => 'required',
            'youtube_link' => 'required',
            'skills' => 'required',
            'category_id' => 'required'
        ]);

        $project = new Project;

        // Image Upload

        if($file = $request->file('thumbnail')) {

            $name = time() . $file->getClientOriginalName();

            $file->move('images', $name);

            $project->thumbnail = $name;
        }

        //others fields

        $project->title = $request->title;
        $project->description = $request->description;
        $project->github_link = $request->github_link;
        $project->youtube_link = $request->youtube_link;
        $project->skills = $request->skills;
        $project->category_id = $request->category_id;

        $project->save();

        return redirect()->route('admin.projects.create')->with('success', 'Project Created Successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $project = Project::find($id);
       // $categories = Category::all();
        //return view('AdminProject.edit_project');

        $categories = Category::all();
        return view ('AdminProject.edit_project',compact('categories','project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'github_link' => 'required',
            'youtube_link' => 'required',
            'skills' => 'required',
            'category_id' => 'required'
        ]);

        $project = Project::find($id);

        if($file = $request->file('thumbnail')) {

            $name = time() . $file->getClientOriginalName();

            $file->move('images', $name);

            $project->thumbnail = $name;
        }

        $project->title = $request->title;
        $project->description = $request->description;
        $project->github_link = $request->github_link;
        $project->youtube_link = $request->youtube_link;
        $project->skills = $request->skills;
        $project->category_id = $request->category_id;

        $project->save();

        return redirect()->route('admin.projects.index')->with('success', 'Project Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //

        $project = Project::find($id);
        @unlink(public_path($project->thumbnail));
        $project->delete();

        return redirect()->route('admin.projects.index')->with('success', 'Project Updated Successfully!');
    }
}
