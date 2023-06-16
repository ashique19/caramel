<?php 

namespace App; 

use Illuminate\Database\Eloquent\Model;

class Category extends Model 
{

	protected $table = "categories";

	protected $fillable = ['id', 'name', 'name_slug', 'summary', 'display_order', 'created_at', 'updated_at'];


	/**
	* Arrays will be stored as json in database and retrieved and parsed as array
	*/
	protected $casts = [
	];


	/**
	* Dates will be parsed as Carbon instance
	*/
	protected $dates = ['created_at', 'updated_at', ];
	
	
	public function products()
	{
		
		return $this->hasMany('\App\Product');
		
	}



	public static function boot()
	{

		parent::boot();

		static::creating(function($model)
		{
            

                
        });
            
        

	}
        
        

}