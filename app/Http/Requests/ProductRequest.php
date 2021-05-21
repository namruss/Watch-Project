<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        $priced = $this->price;
        if (!empty($this->id)) {
            $id = $this->id;
        }
        $rulesCollection = [
            'name' => 'required|between:5,30|unique:products,name',
            'price' => 'required|integer|min:0',
            'sale_price'  => 'min:0|max:'.$priced,
            'image_upload' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'stock' => 'required|integer|min:0'         
        ];
        if (strcmp($this->method(), "PUT") == 0 && !empty($this->id)) {
            $rulesCollection['name'] .= "," . $this->id;
            
        }
        
        return $rulesCollection;
    }

    public function messages()
    {
        return [
            'price.required' => 'Price can not empty',
            
            
        ];
    }
}
