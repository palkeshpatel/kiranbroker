<?php
namespace App\Helpers;

use App\Models\BannerMaster;
use App\Models\ServicesMaster;
use App\Models\Testimonial;

class HtmlComponent
{
    public static function service(){
        $services = ServicesMaster::get();
        return view('helper.home_service',['services'=>$services]);
    }
    public static function banner(){
        $banner = BannerMaster::get();
        return view('helper.home_banner',['banner'=>$banner]);
    }
    public static function testimonials(){
        $testimonial = Testimonial::get();
        return view('helper.home_testimonials',['testimonial'=>$testimonial]);
    }
}
