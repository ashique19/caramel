<?php 

namespace App; 

use Illuminate\Database\Eloquent\Model;

class Order_product extends Model 
{

	protected $table = "order_products";

	protected $fillable = ['id', 'order_id', 'product_id', 'name', 'product_image', 'quantity', 'price', 'purchase_price', 'value', 'created_at', 'updated_at'];


	/**
	* Arrays will be stored as json in database and retrieved and parsed as array
	*/
	protected $casts = [
	];


	/**
	* Dates will be parsed as Carbon instance
	*/
	protected $dates = ['created_at', 'updated_at', ];



	/*
	* order_id belongs to \App\Order 
	*/
	public function order()
	{

		return $this->belongsTo('\App\Order');

	}


	/*
	* product_id belongs to \App\Product 
	*/
	public function product()
	{

		return $this->belongsTo('\App\Product');

	}


	public static function boot()
	{

		parent::boot();

		static::creating(function($model)
		{
            

                
        });
            
        

	}
        
        

}