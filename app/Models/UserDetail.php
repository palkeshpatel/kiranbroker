<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserDetail extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'user_details';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'name',
        'email',
        'phone',
        'industry',
        'created_at',
        'updated_at',
        'delete_at'

    ];
}
