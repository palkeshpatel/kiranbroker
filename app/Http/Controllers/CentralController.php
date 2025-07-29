<?php

namespace App\Http\Controllers;


use App\Models\SectionMaster;
use App\Views\FullPropertyDetail;
use Illuminate\Http\Request;

class CentralController extends Controller
{

    public function index(Request $request,$slug='home'){

       $segment_count=  count($request->segments());
        $section=[];
        if($segment_count<=2){
                $section = SectionMaster::where('slug',$slug)->orderBy('orderby')->get();
        }
        $view_page=(count($section)==0)?'pages.404':'pages.home';
        return view( $view_page, ['section'=>$section]);
    }

}
