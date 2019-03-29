<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $guarded = ['id','create_at','updated_at'];
}
