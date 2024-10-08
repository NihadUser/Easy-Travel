<?php

namespace App\Http\Requests\Admin\Place\Images;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize():bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'id' => 'required|integer|exists:places,id',
            'file' => 'required|array',
            'file.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10000'
        ];
    }
}
