<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class paymentsStoreRequest extends FormRequest
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
			'due_date' =>	'date_format:Y-m-d',
			'payment_date' =>	'date_format:Y-m-d',
			'is_paid' =>	'integer',
			'payment_details' =>	'min:10',
			'attachment_file' =>	'file',
			
        ];
    }
}
        