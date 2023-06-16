<?php 

namespace App; 

use Illuminate\Database\Eloquent\Model;

class Order extends Model 
{

	protected $table = "orders";

	protected $fillable = [
		'id',
		 'user_id',
		 'name',
		 'address',
		 'area',
		 'city',
		 'state',
		 'postcode',
		 'phone',
		 'email',
		 'subtotal',
		 'charge',
		 'discount',
		 'total',
		 'order_date',
		 'courier_id',
		 'courier_name',
		 'courier_tracker',
		 'courier_data',
		 'delivery_charge',
		 'cod',
		 'courier_collectable_amount',
		 'collected_amount',
		 'due_amount',
		 'paid_amount',
		 'payment_gateway',
		 'courier_balance_before_delivery',
		 'courier_balance_after_delivery',
		 'dispatch_date',
		 'expected_delivery_date',
		 'actual_delivery_date',
		 'payment_date',
		 'status',
		 'note',
		 'created_at',
		 'updated_at'
	];


	/**
	* Arrays will be stored as json in database and retrieved and parsed as array
	*/
	protected $casts = [
		'courier_data' => 'array'
	];


	/**
	* Dates will be parsed as Carbon instance
	*/
	protected $dates = [
		'order_date',
		 'dispatch_date',
		 'expected_delivery_date',
		 'actual_delivery_date',
		 'payment_date',
		 'created_at',
		 'updated_at',
	 ];

	
	public function products()
	{
		
		return $this->hasMany('\App\Order_product');
		
	}
	
	public function courier()
	{
		
		return $this->belongsTo('\App\Courier');
		
	}
	
	
	public function user()
	{
		
		return $this->belongsTo('\App\User');
		
	}
	
	
	public function scopeDispatched($query)
	{
		
		return $query->where('status', 'Dispatched');
		
	}
	
	
	public function createdBy()
	{
		
		return $this->belongsTo('\App\User', 'created_by');
		
	}
	
	
	public function updatedBy()
	{
		
		return $this->belongsTo('\App\User', 'updated_by');
		
	}
	

	public static function boot()
	{

		parent::boot();

		static::creating(function($model)
		{
            
			if(auth()->user())
            {
                
                $model->created_by = auth()->user()->id;
                
                $model->updated_by = auth()->user()->id;
                
            }
                
        });
        
        static::updating(function($model)
        {
            if(auth()->user())
            {
                
                $model->updated_by = auth()->user()->id;
                
            }
            
        });
            
        

	}
        
        

}