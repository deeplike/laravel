<?php
/**
 * Class AccountController
 * @property \Illuminate\View\View $layout
 */

class AccountController extends BaseController {
    protected $layout = 'layouts.default';

    public function __construct()
    {
        $this->beforeFilter('auth', array('only'=>array('getProfile', 'getSignout')));
        $this->beforeFilter('guest', array('only'=>array('getSignin', 'getSignup', 'postSignin', 'postSignup')));
    }

    public function getSignup()
    {
        $this->layout->content = View::make('account.signup');
    }

    public function postSignup()
    {
        $rules = array(
            'email' => 'required|between:3,40|email|unique:users',
            'password' => 'required|alpha_num|between:6,20|confirmed',
            'password_confirmation' => 'required',
            'name' => 'required|unique:users',
        );
        $validator = Validator::make(Input::all(), $rules);
        if($validator->fails())
            return Redirect::action('AccountController@getSignup')->withInput(Input::except(array('password', 'password_confirmation')))->withErrors($validator);
        else{
            $user = new User();
            $user->email = Input::get('email');
            $user->password = Hash::make(Input::get('password'));
            $user->name = Input::get('name');
            if($user->save())
                return Redirect::action('AccountController@getSignin')->withInput(Input::only(array('email')));
            else{
                Log::error('Error while saving User in Account@postSignup');
                return Redirect::action('AccountController@getSignup');
            }
        }
    }

    public function getSignin()
    {
        $this->layout->content = View::make('account.signin');
    }

    public function postSignin(){
        $rule = array(
            'email'=>'required|email|between:3,40',
            'password'=>'required|alpha_num|between:6,20',
        );
        $validator = Validator::make(Input::all(), $rule);
        if($validator->fails())
            return Redirect::action('AccountController@getSignin')->withInput(Input::only(array('email')))->withErrors($validator);
        else{
            if(Auth::attempt(array('email'=>Input::get('email'), 'password'=>Input::get('password')))){
                return Redirect::action('AccountController@getProfile');
            }else{
                $validator->messages()->add('email', '用户名不存在或密码错误。');
                return Redirect::action('AccountController@getSignin')->withInput(Input::only(array('email')))->withErrors($validator);
            }
        }
    }

    public function getProfile()
    {
        $this->layout->content = View::make('account.profile');
    }

    public function getSignout()
    {
        Auth::logout();
        return Redirect::action('AccountController@getSignup');
    }
}