<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    public function prepareForValidation()
    {
        if(!auth()->user()->hasAllRoles(['Admin', 'Super Admin'])) {
            $this->merge([
                'user_id' => auth()->id()
            ]);
        }
    }
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->can('post_create') || auth()->user()->can('post_update')  ;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'user_id' => [
                'exists:users,id',
                Rule::requiredIf(function(){
                    return auth()->user()->hasAllRoles(['Admin', 'Super Admin']);
                })
            ],
            'title' => 'required',
            'content' => 'required'
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'título',
            'content' => 'conteúdo'
        ];
    }
}

    
