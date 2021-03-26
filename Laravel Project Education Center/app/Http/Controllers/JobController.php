<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Job;
use Illuminate\Http\Request;

class JobController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$jobs = Job::orderBy('id', 'desc')->paginate(10);

		return view('jobs.index', compact('jobs'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('jobs.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$this->validate($request, [
	        'name' => 'required|unique:jobs|max:255',
    	]);
		$job = new Job();

		$job->name = $request->input("name");

		$job->save();

		return redirect()->route('jobs.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$job = Job::findOrFail($id);

		return view('jobs.show', compact('job'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{

		$job = Job::findOrFail($id);

		return view('jobs.edit', compact('job'));
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
		$this->validate($request, [
	        'name' => 'required|max:255|unique:jobs,name,'.$id,
    	]);
		$job = Job::findOrFail($id);

		$job->name = $request->input("name");

		$job->save();

		return redirect()->route('jobs.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$job = Job::findOrFail($id);
		$job->delete();

		return redirect()->route('jobs.index')->with('message', 'Item deleted successfully.');
	}

}
