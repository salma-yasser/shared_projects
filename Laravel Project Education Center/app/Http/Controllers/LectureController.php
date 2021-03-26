<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Lecture;
use Illuminate\Http\Request;

class LectureController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$lectures = Lecture::orderBy('id', 'desc')->paginate(10);

		return view('lectures.index', compact('lectures'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('lectures.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$lecture = new Lecture();

		$lecture->date = $request->input("date");
        $lecture->start_time = $request->input("start_time");
        $lecture->program_id = $request->input("program_id");

		$lecture->save();

		return redirect()->route('lectures.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$lecture = Lecture::findOrFail($id);

		return view('lectures.show', compact('lecture'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$lecture = Lecture::findOrFail($id);

		return view('lectures.edit', compact('lecture'));
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
		$lecture = Lecture::findOrFail($id);

		$lecture->date = $request->input("date");
        $lecture->start_time = $request->input("start_time");
        $lecture->program_id = $request->input("program_id");

		$lecture->save();

		return redirect()->route('lectures.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$lecture = Lecture::findOrFail($id);
		$lecture->delete();

		return redirect()->route('lectures.index')->with('message', 'Item deleted successfully.');
	}

}
