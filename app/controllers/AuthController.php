<?php

class AuthController extends BaseController {

    /**
     * @return string
     */
    public function getLogin()
    {
        return View::make('auth.login');
    }

    public function postLogin()
    {
        $credentials = Request::only('email', 'password');
        $validator = Validator::make($credentials, [
            'email' => 'required|email', 'password' => 'required',
        ]);

        if ($validator->valid()) {
            if (Auth::attempt($credentials)) {
                return Redirect::intended('/');
            }
        }

        return Redirect::to('auth/login')
            ->withInput(Request::only('email'))
            ->withErrors(['email' => 'Invalid credentials']);
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function getRegister()
    {
        return View::make('auth.register');
    }

    /**
     * Handle a registration request for the application.
     *
     * @return \Illuminate\Http\Response
     */
    public function postRegister()
    {
        $validator = $this->getValidator(Request::all());

        if ($validator->fails())
        {
            return Redirect::to('auth/register')->withErrors($validator);
        }

        Auth::login($this->createUser(Request::all()));

        return Redirect::to('/');
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function getLogout()
    {
        Auth::logout();

        return Redirect::to('/');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Validation\Validator
     */
    protected function getValidator(array $data)
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
     * @param array $data
     * @return User
     */
    protected function createUser(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

}
