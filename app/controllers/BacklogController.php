<?php

class BacklogController extends \BaseController {

	public function index()
	{
		$backlog = Backlog::orderBy('priority')->get();	
			
		return $backlog->toJson();
	}

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

	public function show($id)
	{
		$backlog = Backlog::findOrFail($id);

		return $backlog->toJson();
	}

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
