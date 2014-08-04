<?php namespace Api;

use Symfony\Component\HttpFoundation\JsonResponse;

class PostsController extends \BaseController {

    /**
     * Post Repository
     *
     * @var Post
     */
    protected $post;

    public function __construct(\Post $post)
    {
        $this->post = $post;
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return \Response::json($this->post->all());
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $input = \Request::only('title','body');
        $validation = \Validator::make($input, \Post::$rules);

        if ($validation->passes()) {
            $post = $this->post->create($input);
            return $post;
        }
        return \Response::json(['errors' => $validation->errors()->toArray()], 412);
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return  $this->post->findOrFail($id);

	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $input = \Request::only('title','body');

        if (!empty($input))
        {
            $post = $this->post->find($id);
            $post->update($input);
            return $post;
        }
        return \Response::json([], 412);

	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $this->post->find($id)->delete();
	}


}
