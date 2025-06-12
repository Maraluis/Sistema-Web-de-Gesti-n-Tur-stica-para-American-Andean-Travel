<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTrasporteRequest extends FormRequest
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
            'tipo' => 'required|string|max:255',
            'placa' => 'required|string|max:255|unique:transportes,placa',
            'empresa' => 'nullable|string|max:255',
            'capacidad' => 'required|integer|min:1',
            'estado' => 'required|in:activo,mantenimiento',
        ];
    }
}
