<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ordersStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
        	'name' =>	'min:3|required',
			'address' =>	'required',
			'area' =>	'required',
			'city' =>	'',
			'state' =>	'',
			'postcode' =>	'',
			'phone' =>	'required',
			'email' =>	'',
			'subtotal' =>	'',
			'charge' =>	'',
			'discount' =>	'',
			'total' =>	'',
			'order_date' =>	'date|required',
			'dispatch_date' =>	'date_format:Y-m-d H:i:s',
			'note' =>	'',
			
        ];
    }
}
        