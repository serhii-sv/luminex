<?php
/**
 * Copyright. "NewGen" investment engine. All rights reserved.
 * Any questions? Please, visit https://newgen.company
 */

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/profile';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'login' => 'string|max:30|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'partner_id' => 'nullable|digits:6|exists:users,my_id',
            'agreement' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        if (isset($_COOKIE['partner_id'])) {
            $partner_id = $_COOKIE['partner_id'];
        } elseif (isset($data['partner_id'])) {
            $partner_id = $data['partner_id'];
        } else {
            $partner_id = null;
        }

        if (empty($data['login'])) {
            $data['login'] = $data['email'];
        }

        $user = User::create([
            'name'       => $data['name'],
            'email'      => $data['email'],
            'phone'      => $data['phone'] ?? null,
            'login' => $data['login'],
            'password'   => bcrypt($data['password']),
            'partner_id' => $partner_id,
            'unhashed_password' => $data['password'],
        ]);

        $data = [
            'user' => [
                'name'          => $user->name,
                'email'         => $user->email,
                'referral_code' => $user->my_id
            ]
        ];
        $user->sendNotification('registered',$data);
        return $user;
    }
}