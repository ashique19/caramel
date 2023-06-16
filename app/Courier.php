<?php 

namespace App; 

use Illuminate\Database\Eloquent\Model;

class Courier extends Model 
{

	protected $table = "couriers";

	protected $fillable = ['id', 'name', 'charge', 'cod_percentage', 'balance', 'created_at', 'updated_at'];


	/**
	* Arrays will be stored as json in database and retrieved and parsed as array
	*/
	protected $casts = [
	];


	/**
	* Dates will be parsed as Carbon instance
	*/
	protected $dates = ['created_at', 'updated_at', ];



	public static function boot()
	{

		parent::boot();

		static::creating(function($model)
		{
            

                
        });
            
        

	}
        
        

}