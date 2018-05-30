<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class CreateItem extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:255',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png',
            'category_id' => 'sometimes|exists:categories,id',
        ];
    }
}

