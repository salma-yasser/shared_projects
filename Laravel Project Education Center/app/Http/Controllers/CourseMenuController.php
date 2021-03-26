<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\CourseMenu;
use Illuminate\Http\Request;

class CourseMenuController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$course_menus = CourseMenu::orderBy('id', 'desc')->paginate(10);

		return view('course_menus.index', compact('course_menus'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('course_menus.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$course_menu = new CourseMenu();

		$course_menu->menu_id = $request->input("menu_id");
		$course_menu->course_id = $request->input("course_id");

		$course_menu->save();

		return redirect()->route('course_menus.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$course_menu = CourseMenu::findOrFail($id);

		return view('course_menus.show', compact('course_menu'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$course_menu = CourseMenu::findOrFail($id);

		return view('course_menus.edit', compact('course_menu'));
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
		$course_menu = CourseMenu::findOrFail($id);

		$course_menu->menu_id = $request->input("menu_id");
		$course_menu->course_id = $request->input("course_id");
		

		$course_menu->save();

		return redirect()->route('course_menus.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$course_menu = CourseMenu::findOrFail($id);
		$course_menu->delete();

		return redirect()->route('course_menus.index')->with('message', 'Item deleted successfully.');
	}

}
