<?php

namespace App\Http\Requests\Admin\Place;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'about' => 'required|string|max:1000',
            'price' => 'required|numeric',
            'location' => 'required|string|max:255',
            'safety' => 'required|integer|min:1|max:101',
            'fun' => 'required|integer|min:1|max:101',
            'internet' => 'required|integer|min:1|max:101',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10000',
        ];
    }
}
