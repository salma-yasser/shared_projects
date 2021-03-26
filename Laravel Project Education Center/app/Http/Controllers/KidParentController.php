<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\KidParent;
use Illuminate\Http\Request;

class KidParentController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$kid_parents = KidParent::orderBy('id', 'desc')->paginate(10);

		return view('kid_parents.index', compact('kid_parents'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('kid_parents.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$kid_parent = new KidParent();

		$kid_parent->parent_id = $request->input("parent_id");
        $kid_parent->kid_id = $request->input("kid_id");

		$kid_parent->save();

		return redirect()->route('kid_parents.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$kid_parent = KidParent::findOrFail($id);

		return view('kid_parents.show', compact('kid_parent'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$kid_parent = KidParent::findOrFail($id);

		return view('kid_parents.edit', compact('kid_parent'));
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
		$kid_parent = KidParent::findOrFail($id);

		$kid_parent->parent_id = $request->input("parent_id");
        $kid_parent->kid_id = $request->input("kid_id");

		$kid_parent->save();

		return redirect()->route('kid_parents.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$kid_parent = KidParent::findOrFail($id);
		$kid_parent->delete();

		return redirect()->route('kid_parents.index')->with('message', 'Item deleted successfully.');
	}

}
