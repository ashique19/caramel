<?php 

namespace App; 

use Illuminate\Database\Eloquent\Model;

class Cost_type extends Model 
{

	protected $table = "cost_types";

	protected $fillable = ['id', 'name', 'created_at', 'updated_at'];


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