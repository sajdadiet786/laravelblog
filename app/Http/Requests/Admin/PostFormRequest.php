<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PostFormRequest extends FormRequest
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
        $rules= [
            // 'category_id'=>[
            //     // "required",
            //     "integer"
                

            // ],
            'name'=>[
                "required",
                "string",
                "max:200"

            ],
            'slug'=>[
               "unique"
            ],
            'description'=>["required"
        ],
         
            'title'=>[
              
                "string",
                "max:200"
            ],
            
            'status'=>[
                "nullable",
              
            ]


           
                     ];
                     return $rules;
    }
    
}
