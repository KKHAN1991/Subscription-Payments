<?php

class SubscriptionController extends \BaseController
{

	protected $user;

	public function __construct()
	{

		$this->user = Auth::user();
	}

	public function getIndex()
	{
		return View::make('subscription/index')->with('user', $this->user);
	}

	public function getJoin()
	{
		return View::make('subscription/join');
	}

	public function postJoin()
	{
		$this->user->subscription(Input::get('plan'))
			->create(Input::get('token'), [
				'email' => $this->user->email
			]);

		return Redirect::action('subscription')->with('notice', 'You Are now subscribed. Thanks!');
	}

	public function getCancel()
	{
		$this->user->subscription()->cancel();

		return Redirect::action('subscription')->with('notice', 'Sorry, to see you go.');
	}

	public function getResume()
	{
		$this->user->subscription($this->user->stripe_plan)->resume();

		return Redirect::action('subscription');
	}

	public function getCard()
	{
		return View::make('subscription/card');
	}
	public function postCard ()
	{
		$this->user->updateCard(Input::get('token'));

		return Redirect::action('subscription')->with('notice', 'Your card has been updated');
	}

	/**
	 * Display a listing of the resource.
	 * GET /subscription
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /subscription/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /subscription
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /subscription/{id}
	 *
	 * @param  int $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /subscription/{id}/edit
	 *
	 * @param  int $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /subscription/{id}
	 *
	 * @param  int $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /subscription/{id}
	 *
	 * @param  int $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}