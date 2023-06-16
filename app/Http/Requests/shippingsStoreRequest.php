<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class shippingsStoreRequest extends FormRequest
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
            'id'     => '',
			 'name'     => '',
			 'cost'     => '',
			 'delivery_days'     => '',
			 'created_at'     => '',
			 'updated_at'      => ''
        ];
    }
}

        