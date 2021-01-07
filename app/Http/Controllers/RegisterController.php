<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{

    protected $fillable = ['name', 'email'];
    /**
     * Create a new registered user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Laravel\Fortify\Contracts\CreatesNewUsers  $creator
     * @return \Laravel\Fortify\Contracts\RegisterResponse|string
     */
    public function register(Request $request)
    {
        $data=$request->all();
        $test=Validator::make($data, [
            'name' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        if($test->fails()){//验证字段失败，失败信息自己封装处理
            return implode("", $test->errors()->all());
        }
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);


    }
}
