<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    //
    protected $fillable = ['model', 'data', 'user_name', 'user_id', 'model_id'];
}
