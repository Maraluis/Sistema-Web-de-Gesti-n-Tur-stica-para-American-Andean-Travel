<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClienteRequest extends FormRequest
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
        $cliente = $this->route('cliente');
        return [
            'nombres' => ['required', 'string', 'max:255'],
            'apellidos' => ['required', 'string', 'max:255'],
            'tipo_documento' => ['required', 'in:dni,carnet,pasaporte,ptp,otro'],
            'documento' => ['required', 'string', 'max:255', 'unique:clientes,documento,'.$cliente->id],
            'correo' => ['required', 'string', 'email', 'max:255', 'unique:clientes,correo,'.$cliente->id],
            'telefono' => ['required', 'string', 'max:25'],
            'nacionalidad' => ['nullable', 'string', 'max:100'],
        ];
    }

    public function messages(): array
    {
        return [
            'telefono.required' => 'El teléfono es obligatorio.',
            'telefono.max' => 'El teléfono no puede tener más de 25 caracteres.',
        ];
    }
}
