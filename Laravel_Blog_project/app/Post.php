<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $timestamps = false;

    public function user()
	{
	    return $this->belongsTo('App\User', 'post_by');
	}
}
