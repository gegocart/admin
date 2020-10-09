<?php

namespace App\Http\Requests\Admin\Buyer;

use Illuminate\Foundation\Http\FormRequest;

class SendMailRequset extends FormRequest
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
        return [
             'subject'=>'required',
             'message'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'subject.required'=>trans('sendmail.subject_required'),
            'message.required'=>trans('sendmail.message_required'),
        ];
    }
}
