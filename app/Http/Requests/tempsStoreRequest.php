
<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class tempsStoreRequest extends FormRequest
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
			'role_id' =>	'integer',
			'is_active' =>	'integer',
			'thumb_image' =>	'image',
			'thumb_file' =>	'file',
			'other_files' =>	'array',
			'thumb_images' =>	'array',
			'temp_description' =>	'min:10',
			'more_detail' =>	'min:10',
			'stat_details' =>	'min:10',
			'published_date' =>	'date_format:Y-m-d',
			'reviewed_date' =>	'date_format:Y-m-d',
			
        ];
    }
}
        