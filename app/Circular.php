<?php 

namespace App; 

use Illuminate\Database\Eloquent\Model;

class Circular extends Model 
{

	protected $table = "circulars";

	protected $fillable = ['id', 'name', 'deadline_date', 'circular_detail', 'created_at', 'updated_at'];


	/**
	* Arrays will be stored as json in database and retrieved and parsed as array
	*/
	protected $casts = [
	];


	/**
	* Dates will be parsed as Carbon instance
	*/
	protected $dates = ['deadline_date', 'created_at', 'updated_at', ];



	public static function boot()
	{

		parent::boot();

		static::creating(function($model)
		{
            

                
        });
            
        

	}
        
        

}