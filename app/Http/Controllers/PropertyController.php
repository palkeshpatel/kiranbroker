<?php

namespace App\Http\Controllers;

use App\Models\PropertyClass;
use App\Models\PropertyDetailMaster;
use App\Models\Gallery;
use App\Models\Amenity;
use App\Views\FullPropertyDetail;
use Illuminate\Http\Request;

class PropertyController extends Controller
{

    public function agreement_form($slug=null){
		$FullPropertyDetail= FullPropertyDetail::where('slug',$slug)->first();
		$property='';	
		if(!empty($FullPropertyDetail) && $slug!=''){
			$property='<div class="col-md-12 form-group">
						<label>Property</label>	
						<p>'.$FullPropertyDetail->name.'</p>
						<input type="hidden" name="property_id" value="'.$FullPropertyDetail->id.'">
					</div>';
		} 		
        return view('AgreementForm.create',['property'=>$property]);
    }
	public function GetProperty(){
        $result=PropertyClass::get();
        return view('property.properties',['result'=>$result]);
    }
    public function GetPropertyList($type){
       
        $PropertyClass = PropertyClass::get();
        $FullPropertyDetail= FullPropertyDetail::where('is_status',"1")->where('property_class_slug',$type)->get();
		
        $result=['PropertyClass'=>$PropertyClass,'FullPropertyDetail'=>$FullPropertyDetail];

        if($type=="Investment-opportunities"){
            return view('property.investment_opportunities', $result);
        }
      
        return view('property.properties_type', $result);
    }
    public function GetPropertyDetail($slug){
		
		$PropertyDetail = PropertyDetailMaster::where('slug',$slug)->first();
		$property_id = $PropertyDetail->property_id;		
        $Property = FullPropertyDetail::find($PropertyDetail->property_id);
        
		// $PropertyDetail= PropertyDetailMaster::first();
		$Gallery= Gallery::where('property_detail_id',$PropertyDetail->id)->first();
		$Amenity= Amenity::where('property_detail_id',$PropertyDetail->id)->first();
		
        return view('property.properties_details',[ 'Property'=>$Property,'PropertyDetail'=>$PropertyDetail,'Gallery'=>$Gallery,'Amenity'=>$Amenity ]);
    }
}
