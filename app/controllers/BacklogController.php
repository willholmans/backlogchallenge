<?php

class BacklogController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$backlog = Backlog::orderBy('priority')->get();	
			
		return $backlog->toJson();
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('backlog.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
							'points' => 'required',
							'priority' => 'required',
							'title' => 'required',
						);
		$input = Input::get();
			$validation = Validator::make($input, $rules);

		if ($validation->fails()){
			return Response::json(array(
				'status' => '400',
				'message' => 'An error occured.'
			), 400);	
		}
			$backlog = new Backlog;
			$backlog->points = Input::get('points');
			$backlog->priority = Input::get('priority');
			$backlog->title = Input::get('title');
			$backlog->save();
			return Response::json(array(
				'success' => 'woop'));
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$backlog = Backlog::findOrFail($id);

		return $backlog->toJson();
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$rules = array(
							'points' => 'required',
							'priority' => 'required',
							'title' => 'required',
						);
		$input = Input::get();
			$validation = Validator::make($input, $rules);

		if ($validation->fails()){
			return Response::json(array(
				'status' => '400',
				'message' => 'An error occured.'
			), 400);	
		}

		$backlog = Backlog::findOrFail($id);
		
		$backlog->points = Input::get('points');
		$backlog->priority = Input::get('priority');
		$backlog->title = Input::get('title');
		$backlog->save();
		
		return Response::json(array(
			'success' => 'woop'));
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$backlog = Backlog::findOrFail($id);
		
		if($backlog->exists){
			$backlog->delete();
			return Response::json(array(
				'success' => 'woop'));
		}
	}

}
