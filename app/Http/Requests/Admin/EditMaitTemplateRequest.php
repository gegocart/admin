<?php
namespace App\Http\Requests\Admin;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class EditMaitTemplateRequest extends FormRequest
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
        Validator::extend('checksubject', function ($attribute, $value, $parameters, $validator)
        {
           return preg_match('/^\p{L}[\p{L} A-Za-z0-9_~\-!,@#\$%\^&*.:(\)\s]+$/u',$value);
        });
          Validator::extend('checkmail_content', function ($attribute, $value, $parameters, $validator)
        {
           return preg_match('/^\p{L}[\p{L} A-Za-z0-9_~\-!,@#\$%\^&*.:(\)\s]+$/u',$value);
        });

        return [
            'subject'=>'required|checksubject',
            'mail_content'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'subject.required'=>trans('templateedit.subjectrequired'),
            'subject.checksubject'=>trans('templateedit.checksubject'),
            'mail_content.required'=>trans('templateedit.contentrequired'),
          ];
    }

}
