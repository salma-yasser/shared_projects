<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\HowKnow;
use Illuminate\Http\Request;

class HowKnowController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$how_knows = HowKnow::orderBy('id', 'desc')->paginate(10);

		return view('how_knows.index', compact('how_knows'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('how_knows.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$how_know = new HowKnow();

		$how_know->name = $request->input("name");

		$how_know->save();

		return redirect()->route('how_knows.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$how_know = HowKnow::findOrFail($id);

		return view('how_knows.show', compact('how_know'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$how_know = HowKnow::findOrFail($id);

		return view('how_knows.edit', compact('how_know'));
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
		$how_know = HowKnow::findOrFail($id);

		$how_know->name = $request->input("name");

		$how_know->save();

		return redirect()->route('how_knows.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$how_know = HowKnow::findOrFail($id);
		$how_know->delete();

		return redirect()->route('how_knows.index')->with('message', 'Item deleted successfully.');
	}

}
