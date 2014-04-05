<?php

class BooksController extends \BaseController {

	/**
	 * Display a listing of books
	 *
	 * @return Response
	 */
	public function index()
	{
		$books = Book::all();

		return View::make('books.index', compact('books'));
	}

	/**
	 * Show the form for creating a new book
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('books.create');
	}

	/**
	 * Store a newly created book in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Book::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Book::create($data);

		return Redirect::route('books.index');
	}

	/**
	 * Display the specified book.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$book = Book::findOrFail($id);

		return View::make('books.show', compact('book'));
	}

	/**
	 * Show the form for editing the specified book.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$book = Book::find($id);

		return View::make('books.edit', compact('book'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$book = Book::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Book::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$book->update($data);

		return Redirect::route('books.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Book::destroy($id);

		return Redirect::route('books.index');
	}

}