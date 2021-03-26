<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\ProgramLevel;
use Illuminate\Http\Request;

class ProgramLevelController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$program_levels = ProgramLevel::orderBy('id', 'desc')->paginate(10);

		return view('program_levels.index', compact('program_levels'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('program_levels.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$program_level = new ProgramLevel();

		$program_level->start_date = $request->input("start_date");
        $program_level->end_date = $request->input("end_date");
        $program_level->program_id = $request->input("program_id");
        $program_level->level_id = $request->input("level_id");

		$program_level->save();

		return redirect()->route('program_levels.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$program_level = ProgramLevel::findOrFail($id);

		return view('program_levels.show', compact('program_level'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$program_level = ProgramLevel::findOrFail($id);

		return view('program_levels.edit', compact('program_level'));
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
		$program_level = ProgramLevel::findOrFail($id);

		$program_level->start_date = $request->input("start_date");
        $program_level->end_date = $request->input("end_date");
        $program_level->program_id = $request->input("program_id");
        $program_level->level_id = $request->input("level_id");

		$program_level->save();

		return redirect()->route('program_levels.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$program_level = ProgramLevel::findOrFail($id);
		$program_level->delete();

		return redirect()->route('program_levels.index')->with('message', 'Item deleted successfully.');
	}

}
