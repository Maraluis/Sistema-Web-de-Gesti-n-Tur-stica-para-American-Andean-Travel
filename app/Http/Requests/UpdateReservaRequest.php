<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateReservaRequest extends FormRequest
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
            'cliente_id' => ['required', 'exists:clientes,id'],
            'paquete_id' => ['required', 'exists:paquetes,id'],
            'fecha_reserva' => ['required', 'date', 'after_or_equal:today'],
            'estado' => ['required', 'in:pendiente,confirmada,pagada,cancelada'],
            'detalles' => ['nullable', 'string'],
        ];
    }
}
