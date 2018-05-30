<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class CreateCategory extends FormRequest
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
            'parent_id' => 'sometimes|exists:categories,id',
        ];
    }
}

