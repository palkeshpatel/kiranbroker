<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServicesMaster extends Model
{
	 use SoftDeletes;
    protected $table = 'services_master';
	protected $dates = ['deleted_at'];
}
