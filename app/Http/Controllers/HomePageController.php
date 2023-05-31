<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Project;
use App\Models\Skill;
class HomePageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $projects = Project::paginate(1);
        $skills = Skill::all();
        return view('UsersPanel.HomePage', compact('projects','skills'));
    }

   
 // Skills User Page

 public function showSkillsChart() {
    $skills = Skill::all();
    return view('UsersPanel.Skills.show_skills_chart', compact('skills'));
}
    

    /**
     * Display the specified resource.
     */
    public function detail($id)
    {
        $project = Project::find($id);
        return view('UsersPanel.showDetails', compact('project'));
    }

    // add search functioin

    public function search(Request $request){

        $query = $request->input('query');
 
        $searched_items = Project::where('title', 'like' , "%$query%")
             ->orWhere('description', 'like', "%$query%")
             ->orderBy('title', 'desc')
             ->get();
 
         return view('UsersPanel.search_page', compact('searched_items'));
     }

    

    
    
}
