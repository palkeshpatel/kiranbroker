<?php

namespace App\Http\Controllers;


use App\Models\ProjectMaster;
use App\Views\FullPropertyDetail;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function GetProjectList(){
        $projectMaster = ProjectMaster::get();
        return view('project.project', ['projectMaster'=>$projectMaster]);
    }
    public function GetProjectDetail($slug){
		$projectMaster = ProjectMaster::where('slug',$slug)->first();
        return view('project.project_details',[ 'projectMaster'=>$projectMaster]);
    }
}
