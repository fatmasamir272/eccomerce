<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table    = 'products';
	protected $fillable = [
		'title',
		'photo',
		'content',
		'department_id',
		'trade_id',
        'manu_id',
        'color_id',
        'size_id',
        'weight_id',
        'other_data', 
        'weight',
        'currency_id',
        'stock',
        'start_at',
        'end_at',
        'price',
        'start_offer_at',
        'end_offer_at',
        'price_offer',
        'status',
        'reason',

	];
    public function files() {
        return $this->hasMany('App\file', 'relation_id', 'id')->where('file_type','product');
    }
    public function other_data() {
        return $this->hasMany(\App\Model\OtherData::class , 'product_id', 'id');
    }
    public function related() {
        return $this->hasMany(\App\Model\RelatedProudct::class , 'product_id', 'id');
    }

    public function mall_product() {
        return $this->hasMany(\App\Model\MallProduct::class , 'product_id', 'id');
    }

public function malls() {
        return $this->hasMany(\App\Model\MallProduct::class , 'product_id', 'id');
    }

}
