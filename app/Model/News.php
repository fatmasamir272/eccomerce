<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    //
    protected $table    = 'news';
	protected $fillable = [
		'title',
		'desc',
		'content',
		'status',
		'user_id',
		
	];
	public function user() {
		///////hasone ==belongs to but ma'koos
		return $this->hasOne('App\Admin', 'id', 'user_id');
	}
public function comments() {
		return $this->hasMany('App\Model\Comments', 'news_id', 'id');
	}

}
