<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClienteRequest extends FormRequest
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
            'nome'            => 'required|string|max:255',
            'data_nascimento' => 'required|date',
            'tipo_pessoa'     => 'required|in:fisica,juridica',
            'cpf_cnpj'        => 'required|string|max:20|unique:clientes,cpf_cnpj',
            'email'           => 'required|email|unique:clientes,email',
            'telefone'        => ['required', 'regex:/^\(\d{2}\)\s?\d{4,5}-\d{4}$/'], // (99) 99999-9999
            'id_endereco'     => 'required|exists:enderecos,id',
            'id_profissao'    => 'required|exists:profissoes,id',
            'status'          => 'required|in:ativo,inativo',

            'endereco'        => 'required|string|max:255',
            'numero'          => 'required|string|max:20',
            'bairro'          => 'required|string|max:100',
            'complemento'     => 'nullable|string|max:100',
            'cidade'          => 'required|string|max:100',
            'uf'              => 'required|string|size:2',
        ];
    }

    public function messages()
    {
        return [
            'nome.required'             => 'O campo nome é obrigatório.',
            'nome.string'               => 'O campo nome deve ser um texto.',
            'nome.max'                  => 'O campo nome não pode ter mais que 255 caracteres.',

            'data_nascimento.required'  => 'O campo data de nascimento é obrigatório.',
            'data_nascimento.date'      => 'O campo data de nascimento deve ser uma data válida.',

            'tipo_pessoa.required'      => 'O campo tipo de pessoa é obrigatório.',
            'tipo_pessoa.in'            => 'O tipo de pessoa deve ser "fisica" ou "juridica".',

            'cpf_cnpj.required'         => 'O campo CPF/CNPJ é obrigatório.',
            'cpf_cnpj.string'           => 'O campo CPF/CNPJ deve ser um texto.',
            'cpf_cnpj.max'              => 'O campo CPF/CNPJ não pode ter mais que 20 caracteres.',
            'cpf_cnpj.unique'           => 'Já existe um cliente com este CPF/CNPJ.',

            'email.required'            => 'O campo e-mail é obrigatório.',
            'email.email'               => 'O campo e-mail deve conter um endereço de e-mail válido.',
            'email.unique'              => 'Já existe um cliente com este e-mail.',

            'telefone.required'         => 'O campo telefone é obrigatório.',
            'telefone.regex'            => 'O telefone deve conter DDD e número válido com 8 ou 9 dígitos. Ex: (11) 91234-5678',

            'id_endereco.required'      => 'O campo endereço é obrigatório.',
            'id_endereco.exists'        => 'O endereço selecionado não existe.',

            'id_profissao.required'     => 'O campo profissão é obrigatório.',
            'id_profissao.exists'       => 'A profissão selecionada não existe.',

            'status.required'           => 'O campo status é obrigatório.',
            'status.in'                 => 'O status deve ser "ativo" ou "inativo".',

            'endereco.required'       => 'O endereço é obrigatório.',
            'endereco.max'            => 'O endereço deve ter no máximo 255 caracteres.',

            'numero.required'         => 'O número é obrigatório.',
            'numero.max'              => 'O número deve ter no máximo 20 caracteres.',

            'bairro.required'         => 'O bairro é obrigatório.',
            'bairro.max'              => 'O bairro deve ter no máximo 100 caracteres.',

            'complemento.max'         => 'O complemento deve ter no máximo 100 caracteres.',

            'cidade.required'         => 'A cidade é obrigatória.',
            'cidade.max'              => 'A cidade deve ter no máximo 100 caracteres.',

            'uf.required'             => 'O estado (UF) é obrigatório.',
            'uf.size'                 => 'O UF deve conter exatamente 2 letras.',
        ];
    }
}
