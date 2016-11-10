<?php

namespace App\Http\Requests;

//use Illuminate\Foundation\Http\FormRequest;
use App\Fan;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\JsonResponse;

class FansRequest extends FormRequest
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
        $fan = Fan::find($this->fan);
        switch($this->method())
        {
            case 'GET':
            case 'DELETE':
            {
                return [];
                break;
            }
            case 'POST':
            {
                return [
                    'name'                  => 'required|min:3|max:255',
                    'cpf'                   => 'required|unique:fans|min:7',
                    'username' => 'required|unique:users|min:10|max:100',
                    'email'                 => 'required|email|min:10|max:255',
                    'password'              => 'required|min:6|confirmed',
                    'password_confirmation' => 'required|min:6',
                    'club_id'               => 'required|exists:clubs,id',
                    'aceito'                => 'required',
                ];
                break;
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'email'     => 'required|min:10',
                    'username' => 'required|unique:users,username,' . $fan->user_id . ',id|min:10|max:100',
                    'password'  => 'required|min:6',
                    'name'      => 'required|min:3|max:255',
                    'cpf'       => 'required|unique:fans,cpf,' . $fan->id . ',id|min:7',
                    'club_id'   => 'required|exists:clubs,id'
                ];
                break;
            }
            default:break;
        }


    }

    /**
     * Get the response that handle the request errors.
     *
     * @param  array  $errors
     * @return array
     */
    public function response(array $errors)
    {
        if ($this->is('api/*')) {
            $content = [
                'status' => 0,
                'response' => $errors
            ];
            return new JsonResponse($content, 422);
        } else {
            return \Redirect::back()->withErrors($errors)->withInput();
        }
    }

}
