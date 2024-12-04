<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
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
    protected $redirectTo = '/';

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
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
{
    return Validator::make($data, [
        'username' => ['required', 'string', 'max:255'],
        'fullname' => ['required', 'string', 'max:255'],
        'gender' => ['required', 'integer', 'in:0,1'],
        'address' => ['required', 'string', 'max:255'],
        'phonenumber' => ['required', 'string', 'max:15'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
    ]);
}

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
{
    Log::debug('Register Data:', $data); // Ghi dữ liệu gửi lên vào log
    $user = User::create([
        'username' => $data['username'],
        'fullname' => $data['fullname'],
        'gender' => $data['gender'],
        'address' => $data['address'],
        'phonenumber' => $data['phonenumber'],
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
    ]);
    Log::debug('Created User:', ['user' => $user]);
    return $user;
}
}
