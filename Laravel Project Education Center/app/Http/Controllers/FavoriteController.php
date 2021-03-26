<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Favorite;
use Illuminate\Http\Request;

class FavoriteController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$favorites = Favorite::orderBy('id', 'desc')->paginate(10);

		return view('favorites.index', compact('favorites'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('favorites.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$favorite = new Favorite();

		$favorite->customer_id = $request->input("customer_id");
        $favorite->course_id = $request->input("course_id");

		$favorite->save();

		return redirect()->route('favorites.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$favorite = Favorite::findOrFail($id);

		return view('favorites.show', compact('favorite'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$favorite = Favorite::findOrFail($id);

		return view('favorites.edit', compact('favorite'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @param Request $request
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		$favorite = Favorite::findOrFail($id);

		$favorite->customer_id = $request->input("customer_id");
        $favorite->course_id = $request->input("course_id");

		$favorite->save();

		return redirect()->route('favorites.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$favorite = Favorite::findOrFail($id);
		$favorite->delete();

		return redirect()->route('favorites.index')->with('message', 'Item deleted successfully.');
	}

}
