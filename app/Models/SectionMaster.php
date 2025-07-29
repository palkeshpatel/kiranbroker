<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SectionMaster extends Model
{
	 use SoftDeletes;
    protected $table = 'section_master';
	protected $dates = ['deleted_at'];
}
