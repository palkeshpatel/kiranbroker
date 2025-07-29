<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
class DownloadBrochure extends Model
{
   
	 use SoftDeletes;
     protected $table = 'download_brochures';
	 protected $dates = ['deleted_at'];

	 
}
