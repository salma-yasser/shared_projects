<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\ParentChild;
use Illuminate\Http\Request;

class ParentController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$parents = ParentChild::orderBy('id', 'desc')->paginate(10);

		return view('parents.index', compact('parents'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('parents.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$parent = new ParentChild();

		$parent->name = $request->input("name");
        $parent->relative = $request->input("relative");
        $parent->mobile1 = $request->input("mobile1");
        $parent->mobile2 = $request->input("mobile2");
        $parent->phone = $request->input("phone");
        $parent->address = $request->input("address");
        $parent->email = $request->input("email");

	//	$parent->save();
		 // Store a piece of data in the session...
	    session(['parent1' => $parent]);
		//return redirect()->route('parents.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$parent = ParentChild::findOrFail($id);

		return view('parents.show', compact('parent'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$parent = ParentChild::findOrFail($id);

		return view('parents.edit', compact('parent'));
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
		$parent = ParentChild::findOrFail($id);

		$parent->name = $request->input("name");
        $parent->relative = $request->input("relative");
        $parent->mobile1 = $request->input("mobile1");
        $parent->mobile2 = $request->input("mobile2");
        $parent->phone = $request->input("phone");
        $parent->address = $request->input("address");
        $parent->email = $request->input("email");

		$parent->save();

		return redirect()->route('parents.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$parent = ParentChild::findOrFail($id);
		$parent->delete();

		return redirect()->route('parents.index')->with('message', 'Item deleted successfully.');
	}

}
