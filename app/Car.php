<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{

    protected $table = 'cars';

    public function comments()
    {
    	return $this->hasMany(Comment::class);
    }

}
