<?php

namespace App\Http\Requests;



use Illuminate\Foundation\Http\FormRequest;

class EntregaRequest extends FormRequest
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
     * 
     */
    public function rules(): array
    {
        return [
            // Campo destino obrigatorio, no minimo 3 letras
            'destino' => 'required|string|min:3',
            // Campo status também obrigatorio, deve conter as opções listadas abaixo
            'status' => 'required|string|in:pendente,saiu para entrega,entregue'
        ];
    }
}
