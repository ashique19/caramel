<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class productsStoreRequest extends FormRequest
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
        	'name' =>	'min:3',
			'category_id' =>	'integer',
			'thumb_image' =>	'image',
			'all_images' =>	'array',
			'product_detail' =>	'',
			'price' =>	'',
			'display_order' =>	'',
			'note' =>	'',
			
        ];
    }
}
        