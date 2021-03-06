<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VacancyStoreRequest extends FormRequest
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
     * This method will be called after successful validation
     */
    public function passedValidation() {
        //In case the vacancy title is not passed then we initialize it with an empty value to avoid null insertion
        if (is_null($this->title)) {
            $this->title = '';
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'max:254',
            'position' => 'required|max:40',
            'company_name' => 'required|max:40',
            'link' => 'required|url|max:2083',
            'status' => 'required|exists:status,name',
        ];
    }
}
