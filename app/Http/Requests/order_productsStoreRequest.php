<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class order_productsStoreRequest extends FormRequest
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
        'order_id' =>	'integer',
			'product_id' =>	'integer',
				'name' =>	'min:3',
			'product_image' =>	'image',
			'quantity' =>	'',
			'price' =>	'',
			'value' =>	'',
			
        ];
    }
}
        