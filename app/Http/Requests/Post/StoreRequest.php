<?php

namespace App\Http\Requests\Post;

use Illuminate\Support\Str;
use Illuminate\Http\Response;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class StoreRequest extends FormRequest
{
    /**
     * Hace que el slug se almacene con el formato correcto.
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'slug' => Str::slug($this->title)
        ]);
    }
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        //Siempre a true para que no rechace la petición.
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
            'title' => 'required|min:5|max:500',
            'slug' => 'required|min:5|max:500|unique:posts',
            'content' => 'required|min:7',
            'categoria_id' => 'required|integer',
            'description' => 'required|min:7',
            'posted' => 'required',
            "image" => "mimes:jpeg,jpg,png|max:10240"
        ];
    }

    public function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        if($this->expectsJson()){
            $response = new Response($validator->errors(),422);
            throw new ValidationException($validator,$response);
        }
    }

    
}
