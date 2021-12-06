<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // $this->user()->isAdmin(); // Si devuelve verdadero se ejecutaran las reglas de validación sino devuelve un HTTP Response 403 Forbidden (Prohibido)
        // return false;
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if (request()->method === 'PATCH')
        {
            return [
                'title' => "required|between:2,80|unique:projects,title,{$this->project->id}",
                'description' => 'required|between:3,2048',
                ];
        }

        return [
            'title' => 'required|between:2,80|unique:projects,title',
            'description' => 'required|between:3,2048',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'El proyecto necesita un título',
        ];
    }
}
