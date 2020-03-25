<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    //
    protected $table    = 'comments';
	protected $fillable = [
		'comment',
		'news_id',
		'user_id',
		
		
	];
	public function user() {
		return $this->hasOne('App\Admin', 'id', 'user_id');
	}
	public function news() {
		return $this->hasOne('App\Model\News', 'id', 'news_id');
	}
}
