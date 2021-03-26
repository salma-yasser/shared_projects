<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Level;
use Illuminate\Http\Request;

class LevelController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$levels = Level::orderBy('id', 'desc')->paginate(10);

		return view('levels.index', compact('levels'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('levels.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$level = new Level();

		$level->name = $request->input("name");
        $level->course_id = $request->input("course_id");

		$level->save();

		return redirect()->route('levels.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$level = Level::findOrFail($id);

		return view('levels.show', compact('level'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$level = Level::findOrFail($id);

		return view('levels.edit', compact('level'));
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
		$level = Level::findOrFail($id);

		$level->name = $request->input("name");
        $level->course_id = $request->input("course_id");

		$level->save();

		return redirect()->route('levels.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$level = Level::findOrFail($id);
		$level->delete();

		return redirect()->route('levels.index')->with('message', 'Item deleted successfully.');
	}

}
