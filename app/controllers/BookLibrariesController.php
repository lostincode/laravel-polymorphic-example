<?php

class BookLibrariesController extends \BaseController {

	/**
	 * Display a listing of booklibraries
	 *
	 * @return Response
	 */
	public function index()
	{
		$booklibraries = Booklibrary::all();

		return View::make('booklibraries.index', compact('booklibraries'));
	}

	/**
	 * Show the form for creating a new booklibrary
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('booklibraries.create');
	}

	/**
	 * Store a newly created booklibrary in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Booklibrary::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Booklibrary::create($data);

		return Redirect::route('booklibraries.index');
	}

	/**
	 * Display the specified booklibrary.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$booklibrary = Booklibrary::findOrFail($id);

		return View::make('booklibraries.show', compact('booklibrary'));
	}

	/**
	 * Show the form for editing the specified booklibrary.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$booklibrary = Booklibrary::find($id);

		return View::make('booklibraries.edit', compact('booklibrary'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$booklibrary = Booklibrary::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Booklibrary::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$booklibrary->update($data);

		return Redirect::route('booklibraries.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Booklibrary::destroy($id);

		return Redirect::route('booklibraries.index');
	}

}