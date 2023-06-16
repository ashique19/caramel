<?php 

namespace App; 

use Illuminate\Database\Eloquent\Model;

class Product extends Model 
{

	protected $table = "products";

	protected $fillable = ['id', 'name', 'category_id', 'thumb_image', 'all_images', 'product_detail', 'price', 'purchase_price', 'display_order', 'is_published', 'stock_quantity', 'note', 'created_at', 'updated_at'];


	/**
	* Arrays will be stored as json in database and retrieved and parsed as array
	*/
	protected $casts = [
		'all_images'=> 'array',
	];


	/**
	* Dates will be parsed as Carbon instance
	*/
	protected $dates = ['created_at', 'updated_at', ];



	/*
	* category_id belongs to \App\Category 
	*/
	public function Category()
	{

		return $this->belongsTo('\App\Category');

	}
	
	
	public function orders()
	{
		
		return $this->hasMany('\App\Order_product');
		
	}


	/**
	* @is_published : 0 = no, 1 = yes 
	*/
	public function scopePublished($query)
	{

		return $query->where('is_published', 1);

	}


	public static function boot()
	{

		parent::boot();

		static::creating(function($model)
		{
            

                
        });
            
        

	}
        
        

}