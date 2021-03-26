<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\LectureCustomerProgram;
use Illuminate\Http\Request;

class LectureCustomerProgramController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$lecture_customer_programs = LectureCustomerProgram::orderBy('id', 'desc')->paginate(10);

		return view('lecture_customer_programs.index', compact('lecture_customer_programs'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('lecture_customer_programs.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$lecture_customer_program = new LectureCustomerProgram();

		$lecture_customer_program->level_id = $request->input("level_id");
        $lecture_customer_program->customer_program_id = $request->input("customer_program_id");
        $lecture_customer_program->attendence = $request->input("attendence");
        $lecture_customer_program->assignment = $request->input("assignment");
        $lecture_customer_program->behavior = $request->input("behavior");
        $lecture_customer_program->active = $request->input("active");
        $lecture_customer_program->fees = $request->input("fees");

		$lecture_customer_program->save();

		return redirect()->route('lecture_customer_programs.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$lecture_customer_program = LectureCustomerProgram::findOrFail($id);

		return view('lecture_customer_programs.show', compact('lecture_customer_program'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$lecture_customer_program = LectureCustomerProgram::findOrFail($id);

		return view('lecture_customer_programs.edit', compact('lecture_customer_program'));
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
		$lecture_customer_program = LectureCustomerProgram::findOrFail($id);

		$lecture_customer_program->level_id = $request->input("level_id");
        $lecture_customer_program->customer_program_id = $request->input("customer_program_id");
        $lecture_customer_program->attendence = $request->input("attendence");
        $lecture_customer_program->assignment = $request->input("assignment");
        $lecture_customer_program->behavior = $request->input("behavior");
        $lecture_customer_program->active = $request->input("active");
        $lecture_customer_program->fees = $request->input("fees");

		$lecture_customer_program->save();

		return redirect()->route('lecture_customer_programs.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$lecture_customer_program = LectureCustomerProgram::findOrFail($id);
		$lecture_customer_program->delete();

		return redirect()->route('lecture_customer_programs.index')->with('message', 'Item deleted successfully.');
	}

}
