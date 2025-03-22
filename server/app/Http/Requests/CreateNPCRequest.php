<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateNPCRequest extends FormRequest
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
        return [
            'gender' => 'required|integer|exists:gender,id',
            'name' => 'required|string|max:255',
            'skinColor' => 'required|integer|exists:skin_colors,id',
            'hairColor' => 'required|string|regex:/^#([0-9a-fA-F]{6})$/',
        ];
    }
}
