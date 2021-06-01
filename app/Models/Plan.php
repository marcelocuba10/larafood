<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable=['name','url','price','description','status'];

    protected $hidden=['created_at','updated_at'];
}
