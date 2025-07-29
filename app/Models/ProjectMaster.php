<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectMaster extends Model
{
	 use SoftDeletes;
    protected $table = 'project_master';
	protected $dates = ['deleted_at'];
}
