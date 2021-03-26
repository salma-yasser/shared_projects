<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\ProgramEmployee;
use Illuminate\Http\Request;

class ProgramEmployeeController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$program_employees = ProgramEmployee::orderBy('id', 'desc')->paginate(10);

		return view('program_employees.index', compact('program_employees'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('program_employees.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$program_employee = new ProgramEmployee();

		$program_employee->employee_id = $request->input("employee_id");
        $program_employee->program_id = $request->input("program_id");
        $program_employee->role_id = $request->input("role_id");

		$program_employee->save();

		return redirect()->route('program_employees.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$program_employee = ProgramEmployee::findOrFail($id);

		return view('program_employees.show', compact('program_employee'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$program_employee = ProgramEmployee::findOrFail($id);

		return view('program_employees.edit', compact('program_employee'));
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
		$program_employee = ProgramEmployee::findOrFail($id);

		$program_employee->employee_id = $request->input("employee_id");
        $program_employee->program_id = $request->input("program_id");
        $program_employee->role_id = $request->input("role_id");

		$program_employee->save();

		return redirect()->route('program_employees.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$program_employee = ProgramEmployee::findOrFail($id);
		$program_employee->delete();

		return redirect()->route('program_employees.index')->with('message', 'Item deleted successfully.');
	}

}
