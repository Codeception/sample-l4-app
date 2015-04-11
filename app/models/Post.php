<?php

class Post extends Eloquent {

    /**
     * @var array
     */
    public static $rules = array(
		'title' => 'required',
		'body' => 'required'
	);

    /**
     * @var array
     */
    protected $fillable = array('title', 'body');

}