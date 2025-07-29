<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BannerMaster extends Model
{
	 use SoftDeletes;
     protected $table = 'banner_master';
	 protected $dates = ['deleted_at'];
}
