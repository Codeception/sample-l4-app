<?php

class HomeController extends BaseController {

	public function index()
	{
		return View::make('hello');
	}

    public function flash()
    {
        Session::flash('message', "It's a flash");

        return View::make('flash');
    }

    public function back()
    {
        return Redirect::back();
    }

    public function secure()
    {
        return View::make('hello');
    }

    public function session($message)
    {
        Session::set('message', $message);
    }

    public function form()
    {
        $message = Request::get('message', '');

        return View::make('form', compact('message'));
    }

    public function specialCharacters()
    {
        return View::make('special-characters');
    }

}