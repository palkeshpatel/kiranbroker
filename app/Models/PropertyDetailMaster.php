<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PropertyDetailMaster extends Model
{
    use SoftDeletes;
    protected  $table="property_detail_master";
    public $timestamps=true;
    protected $dates=['deleted_at'];

}
