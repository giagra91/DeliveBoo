<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Models\CookingType;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Storage;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'address' => ['required', 'string', 'max:255'],
            'vat_number' => ['required', 'string', 'max:20'],
            'cooking_types' => ['required']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $request = request();
        $user = new User();
        $user->name =  $data['name'];
        $user->email = $data['email'];
        $user->address = $data['address'];
        $user->vat_number = $data['vat_number'];

        if ($request->hasFile('img_url')) { 
            $user->img_url = Storage::put('uploads', $data['img_url']);
        } 
        if ($request->hasFile('logo_url')) { 
            $user->logo_url = Storage::put('uploads', $data['logo']);
        }   

        $user->password = Hash::make($data['password']);
        $user->save();
        $user->cookingTypes()->attach($data["cooking_types"]);
        return $user;
    }

        public function showRegistrationForm(){
            $cookingTypes = CookingType::all();
            return view('auth.register', compact("cookingTypes"));
        }
}
