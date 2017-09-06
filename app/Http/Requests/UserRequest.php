<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

class UserRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'surname' => 'optional|string',
//            'email' => 'required|email|unique:users|max:255',
            'email' => ['required|email|max:255', $this->uniqueEmail()],
            'password' => 'required|string|min:6',
        ];
    }

    /**
     * Build a unique rule for the email.
     *
     * @return \Illuminate\Validation\Rule
     */
    protected function uniqueEmail()
    {
        $user = $this->parameter('email');

        Rule::unique('users', 'email')
            ->ignore($user->id)
            ->where(function($query) {
                $query->whereNull('deleted_at');
            });
    }
}
