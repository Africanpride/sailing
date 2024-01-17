<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePublicationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    private function toBoolean($booleable)
    {
        return filter_var($booleable, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);
    }
    protected function prepareForValidation()
    {
        $this->merge([
            'active' => $this->toBoolean($this->active),
        ]);
    }
    public function authorize()
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
        return [
            //
            'title' => 'required|max:255',
            'overview' => 'nullable',
            'body' => 'required',
            'featured_image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'active' => 'boolean',
            'category_id' => 'exists:categories,id',
        ];
    }
}
