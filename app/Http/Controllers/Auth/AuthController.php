<?php

namespace App\Http\Controllers\Auth;



use App\User;
use Laravel\Socialite\Facades\Socialite;
use Validator;
use App\Http\Controllers\MainController;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends MainController
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct(MainController $mainController)
    {
        $this->data=$mainController->data;
        $this->middleware('guest', ['except' => 'getLogout']);

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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'address' => $data['address'],
            'number' => $data['number'],
        ]);
    }

    public function getRegister()
    {
        return view('auth.register',$this->data);
    }



    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */


    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        try {
            $user = \Socialite::driver($provider)->user();
        } catch (\Exception $e) {
            return Redirect::to('auth/{provider}');
        }

        $authUser = $this->findOrCreateUser($user);

        Auth::diner()->login($authUser, true);

        return redirect()->route('/');
    }

    /*
    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }
*/
    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    /*
    public function handleProviderCallback()
    {
        $user = Socialite::driver('github')->user();

        // $user->token;
    }
    */
}
