<?php 

namespace App; 

use Illuminate\Database\Eloquent\Model;

class Cost extends Model 
{

	protected $table = "costs";

	protected $fillable = ['id', 'name', 'cost_type_id', 'amount', 'note', 'incurred_date', 'created_at', 'updated_at'];


	/**
	* Arrays will be stored as json in database and retrieved and parsed as array
	*/
	protected $casts = [
	];


	/**
	* Dates will be parsed as Carbon instance
	*/
	protected $dates = ['incurred_date', 'created_at', 'updated_at', ];



	/*
	* cost_type_id belongs to \App\Cost_type 
	*/
	public function Cost_type()
	{

		return $this->belongsTo('\App\Cost_type');

	}


	public static function boot()
	{

		parent::boot();

		static::creating(function($model)
		{
            

                
        });
            
        

	}
        
        

}