<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEnderecoRequest extends FormRequest
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
            'endereco'    => 'required|string|max:255',
            'numero'      => 'required|string|max:20',
            'bairro'      => 'required|string|max:100',
            'complemento' => 'nullable|string|max:100',
            'cidade'      => 'required|string|max:100',
            'uf'          => 'required|string|size:2',
        ];
    }

    public function messages()
    {
        return [
            'endereco.required'    => 'O campo endereço é obrigatório.',
            'endereco.string'      => 'O campo endereço deve ser um texto.',
            'endereco.max'         => 'O campo endereço não pode ter mais que 255 caracteres.',

            'numero.required'      => 'O campo número é obrigatório.',
            'numero.string'        => 'O campo número deve ser um texto.',
            'numero.max'           => 'O campo número não pode ter mais que 20 caracteres.',

            'bairro.required'      => 'O campo bairro é obrigatório.',
            'bairro.string'        => 'O campo bairro deve ser um texto.',
            'bairro.max'           => 'O campo bairro não pode ter mais que 100 caracteres.',

            'complemento.string'   => 'O campo complemento deve ser um texto.',
            'complemento.max'      => 'O campo complemento não pode ter mais que 100 caracteres.',

            'cidade.required'      => 'O campo cidade é obrigatório.',
            'cidade.string'        => 'O campo cidade deve ser um texto.',
            'cidade.max'           => 'O campo cidade não pode ter mais que 100 caracteres.',

            'uf.required'          => 'O campo UF é obrigatório.',
            'uf.string'            => 'O campo UF deve ser um texto.',
            'uf.size'              => 'O campo UF deve conter exatamente 2 caracteres (ex: SP, RJ).',
        ];
    }
}
