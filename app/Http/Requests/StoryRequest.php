<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoryRequest extends FormRequest
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
        
        $storyId = $this->route('story.id');
        return [
           
                'title' =>     ['required' , 'min:10' , 'max:50' ,

                function($attribute , $value , $fail){
                    if($value == 'dummy title'){
                        $fail($attribute . 'is not valid');
                    }
                },
                Rule::unique('stories')->ignore($storyId)

            ],
                'body' =>  'required',
                'type' =>  'required',
                'status' =>    'required'
        ];
    }

    public function withValidator($v){
       
        $v->sometimes('body' , 'max:50' , function($input){
                return 'type' == $input->type;
        });
    }
    public function messages(){
        return [
            'required' => 'please inter :attribute',
        ];
    }
}