<?php
namespace App\Http\Requests\Orders;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\PincodeRegion;

class EditPincode extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return ture;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
         

         

        return ['modifiedPincode'=>'required|unique:pincode_region,pincode'];
    }
}
