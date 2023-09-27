<?php

namespace App\Http\Requests\Api;
use App\Http\Requests\api\CustomRulesRequest;
use Illuminate\Foundation\Http\FormRequest;
class ClienteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return Bool
     */
    public function authorize(): Bool
    {
        return true;
    }
        /**
         * Get the validation rules that apply to the request.
         *
         * @return array<string, mixed>
         */
        public function rules()
        {
            return [
            'nome'  => ['required'],
            'cnpj' =>  ['required'],
            'data_cadastro' => ['required'],
            'cpf'=> ['required'],
            'email'=> ['required'],
            'status'=> ['required'],
            ];
        }



}