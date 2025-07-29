<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;


class AgreementForm extends Model
{
    use SoftDeletes;

    protected $table = 'agreement_form';
    public $timestamps = true;
    protected $dates = ['deleted_at'];

}
