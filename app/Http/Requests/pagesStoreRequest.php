<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class pagesStoreRequest extends FormRequest
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
			 'details'     => '',
			 'meta_tag_title'     => '',
			 'meta_tag_description'     => '',
			 'meta_tag_keywords'     => '',
			 'created_at'     => '',
			 'updated_at'      => ''
        ];
    }
}

        