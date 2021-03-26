<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Customer;
use App\Adult;
use App\kid;
use App\Program;
use App\CustomerProgram;
use Illuminate\Http\Request;

class CustomerProgramController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$customer_programs = CustomerProgram::orderBy('id', 'desc')->paginate(15);

		return view('customer_programs.index', compact('customer_programs'));
	}

	public function listbyProgram($id)
	{
		$customer_programs = CustomerProgram::where('program_id',$id)->orderBy('id', 'desc')->paginate(15);

		return view('customer_programs.index', compact('customer_programs'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$programs = Program::all();
		return view('customer_programs.create',compact('programs'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{

		//var_dump(session("adult"));
	

		$customer_program = new CustomerProgram();

		$customer_program->customer_id = $request->customer_id;
        $customer_program->program_id = $request->program_id;
        $customer_program->goals = $request->goals;
       // $customer_program->status = $request->input("status");

		$customer_program->save();

		return redirect('allcourses')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$customer_program = CustomerProgram::findOrFail($id);

		return view('customer_programs.show', compact('customer_program'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$customer_program = CustomerProgram::findOrFail($id);

		return view('customer_programs.edit', compact('customer_program'));
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
		$customer_program = CustomerProgram::findOrFail($id);

		$customer_program->customer_id = $request->input("customer_id");
        $customer_program->program_id = $request->input("program_id");
        $customer_program->goals = $request->input("goals");
        $customer_program->status = $request->input("status");

		$customer_program->save();

		return redirect()->route('customer_programs.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$customer_program = CustomerProgram::findOrFail($id);
		$customer_program->delete();

		return redirect()->route('customer_programs.index')->with('message', 'Item deleted successfully.');
	}

}
