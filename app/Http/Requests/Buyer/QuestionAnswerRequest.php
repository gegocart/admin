<?php

namespace App\Http\Requests\Buyer;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use App\Models\ProductQuestion;

use Auth;
class QuestionAnswerRequest extends FormRequest
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
        


        Validator::extend('check', function ($attribute, $value, $parameters, $validator) 
       {
             
 $check=ProductQuestion::where('product_id',request()->entityid)->where('question',$value)->where('buyer_id',Auth()->id())->exists();
      
            if ($check)
            { 
                return false;
            }
            
           return true;
        });

  
   
        return [
            'question'=>'required|check',
        ];
    }
    public function messages()
    {
        return[
            'question.required'=>trans('questionanswer.question_required_detail'),
            'question.check'=>trans('questionanswer.question_check_detail'),
        ];
    }
}
