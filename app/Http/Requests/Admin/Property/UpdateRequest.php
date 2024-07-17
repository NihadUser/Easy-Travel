<?php

namespace App\Http\Requests\Admin\Property;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'description' => 'required',
            'stars' => 'required',
            'location' => 'required',
            'price' => 'required',
            'bed_count' => 'required',
            'bath_count' => 'required',
            'sqft_count' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif',
            'supplies' => 'required|array',
        ];
    }
}
