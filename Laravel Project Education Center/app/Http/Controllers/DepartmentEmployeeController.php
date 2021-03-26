<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\DepartmentEmployee;
use Illuminate\Http\Request;

class DepartmentEmployeeController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$department_employees = DepartmentEmployee::orderBy('id', 'desc')->paginate(10);

		return view('department_employees.index', compact('department_employees'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('department_employees.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$department_employee = new DepartmentEmployee();

		$department_employee->employee_id = $request->input("employee_id");
        $department_employee->department_id = $request->input("department_id");
        $department_employee->role_id = $request->input("role_id");

		$department_employee->save();

		return redirect()->route('department_employees.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$department_employee = DepartmentEmployee::findOrFail($id);

		return view('department_employees.show', compact('department_employee'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$department_employee = DepartmentEmployee::findOrFail($id);

		return view('department_employees.edit', compact('department_employee'));
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
		$department_employee = DepartmentEmployee::findOrFail($id);

		$department_employee->employee_id = $request->input("employee_id");
        $department_employee->department_id = $request->input("department_id");
        $department_employee->role_id = $request->input("role_id");

		$department_employee->save();

		return redirect()->route('department_employees.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$department_employee = DepartmentEmployee::findOrFail($id);
		$department_employee->delete();

		return redirect()->route('department_employees.index')->with('message', 'Item deleted successfully.');
	}

}
