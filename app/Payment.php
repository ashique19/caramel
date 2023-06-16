<?php 

namespace App; 

use Illuminate\Database\Eloquent\Model;

class Payment extends Model 
{

	protected $table = "payments";

	protected $fillable = [
		'id', 
		'name', 
		'due_date', 
		'payment_date', 
		'is_paid', 
		'payment_details', 
		'attachment_file', 
		'created_at', 
		'updated_at'
	];


	/**
	* Arrays will be stored as json in database and retrieved and parsed as array
	*/
	protected $casts = [
	];


	/**
	* Dates will be parsed as Carbon instance
	*/
	protected $dates = ['due_date', 'payment_date', 'created_at', 'updated_at'];



	/**
	* @is_paid : 0 = no, 1 = yes 
	*/
	public function scopePaid($query)
	{

		return $query->where('is_paid', 1);

	}


	public static function boot()
	{

		parent::boot();

		static::creating(function($model)
		{
            

                
        });
            
        

	}
        
        

}