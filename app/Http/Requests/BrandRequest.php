<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $data = [
            'name' => 'required|string|unique:brands,name',
            'logo' => ['required', 'file', 'mimes:jpeg,png,jpg,svg', 'max:2048', 'dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000']
        ];
        if ($this->method() == 'PUT') {
            $data['name'] = 'required|string|unique:brands,name,' . $this->brand->id;
            $data['logo'] = ['nullable', 'file', 'mimes:jpeg,png,jpg,svg', 'max:2048', 'dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000'];
        }
        return $data;
    }
}
