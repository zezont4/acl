<?php

namespace Zezont4\ACL\Http\Requests;

use App\Http\Requests\Request;

class ACLUserRequest extends Request
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
     * Custom error messages.
     *
     * @return array
     */
    public function messages()
    {
        return [
            // 'birth_date.before' => 'berth date must be at least one day before :date ,
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'             => 'sometimes|required',
            'email'            => 'email',
            'password'         => 'sometimes|required|min:4',
            'confirm_password' => 'sometimes|required|same:password',
            'user_name'        => 'sometimes|required|unique:users,user_name,'.@$this->route()->id.',id',
            'mobile_no'        => 'sometimes|required|digits:10',
            'allowed_gender'   => 'sometimes|required|numeric',
            'is_active'        => 'sometimes|required|numeric',

        ];
    }
}
