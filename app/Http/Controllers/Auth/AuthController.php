<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
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

    # Where should the user be redirected to if their login succeeds?
    protected $redirectPath = '/store';

    # Where should the user be redirected to if their login fails?
    protected $loginPath = '/login';

    # Where should the user be redirected to after logging out?
    protected $redirectAfterLogout = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
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
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
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
        //Adding custom field to user registration form:
        //http://www.easylaravelbook.com/blog/2015/09/25/adding-custom-fields-to-a-laravel-5-registration-form/
        return User::create([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            //'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    /*
    * Continue to redirect the user to http://localhost/ after logging out, but send a flash message to confirm the logout.
    * In order to do this, you'll need to override the default getLogout() method that is set in AuthenticateUsers.php.
    * Note, we're overriding, not overwriting. Overwriting would imply we're changing
    * AuthenticateUsers.php which we do not want to do as any changes could be lost in the next update since this is a vendor file
    */
    public function getLogout()
    {
        \Auth::logout();
        \Session::flash('flash_message','You have been logged out');
        return redirect(property_exists($this, 'redirectAfterLogout') ? $this->redirectAfterLogout : '/');
    }
}
