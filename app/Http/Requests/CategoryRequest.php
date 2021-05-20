<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if (!empty($this->id)) {
            $id = $this->id;
        }
        $rulesCollection = [
            'name' => 'required|unique:categories,name',         
        ];
        if (strcmp($this->method(), "PUT") == 0 && !empty($this->id)) {
            $rulesCollection['name'] .= "," . $this->id;
            
        }
        
        return $rulesCollection;
           
        
    }

    public function messages()
    {
        return [
            'name.required' => 'Name can not empty',
            'name.unique' =>'This category has already exits',
            'name.regex' => 'Name can not contain special characters',
            'price.required' => 'Price can not empty'
        ];
    }
}
