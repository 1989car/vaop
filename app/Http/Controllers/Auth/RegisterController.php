<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Clarkeash\Doorman\Exceptions\DoormanException;
use Clarkeash\Doorman\Facades\Doorman;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Junaidnasir\GlobalSettings\Facades\GlobalSettings;

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
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        switch(GlobalSettings::get('registration')) {
            case 'closed':
                return view('auth.register.closed');
            case 'invite-email':
            case 'invite-code':
                if (session('invite_code_valid')){
                    return view('auth.register.invite');
                }else{
                    return view('auth.register.invite-validate');
                }
            case 'open':
            default:
                return view('auth.register.open');
        }
    }
    
    /**
     * Handle a registration request for the application.
     *
     * @return \Illuminate\Http\Response
     */
    public function register()
    {
        if(substr(GlobalSettings::get('registration'),0,6) == 'invite'){
            if(session('invite_code_valid') !== true) {
                if (GlobalSettings::get('registration') == 'invite-email') {
                    $result = Doorman::check(request()->input('invite_code'), request()->input('email'));
                } else {
                    $result = Doorman::check(request()->input('invite_code'));
                }
                if ($result) {
                    // Valid Invite Code
                    session(['invite_code_valid' => true]);
                    session(['invite_code' => request()->input('invite_code')]);
        
                    // If Email Present
                    if (request()->input('email') !== '') {
                        session(['invite_code_email' => request()->input('email')]);
                    }
                    return redirect('/register');
                } else {
                    return redirect('/register')->withErrors(['The invite code entered is not valid.']);
                }
            }else{
                try {
                    Doorman::redeem(session('invite_code'), request()->get('email'));
                } catch (DoormanException $e) {
                    return redirect('/register')->withErrors([$e->getMessage()]);
                }
            }
        }
        
        $this->validator(request()->all())->validate();
        
        event(new Registered($user = $this->create(request()->all())));
        
        $this->guard()->login($user);
    
        session()->forget(['invite_code_valid','invite_code','invite_code_email']);
        
        return $this->registered(request(), $user)
            ?: redirect($this->redirectPath());
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
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
