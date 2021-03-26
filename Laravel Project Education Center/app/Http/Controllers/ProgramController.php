<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Program;
use App\Customer;
use App\Department;
use App\Favorite;
use App\CustomerProgram;
use App\Course;
use App\CourseMenu;
use App\Menu;
use App\Level;
use Auth;
use Illuminate\Http\Request;

class ProgramController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$programs = Program::orderBy('id', 'desc')->paginate(10);

		return view('programs.index', compact('programs'));
	}


	public function course_programs($id)
	{
		$programs = Program::where('course_id',$id)->orderBy('id', 'desc')->paginate(10);

		return view('programs.index', compact('programs'));
	}

	public function user_programs($key)
	{

		$user = Auth::user();
		$user = Customer::where('id',$user->customer_id)->first();
		$departments =array();
		$customer_programs = CustomerProgram::where('customer_id',$user->id)->orderBy('id', 'desc')->pluck('program_id')->toArray();
		$favorite_ids = Favorite::where('customer_id',$user->id)->orderBy('id', 'desc')->pluck('course_id')->toArray();

		$courses = Course::where('department_id',$key)->pluck('id')->toArray();

			$currently_programs = Program::whereIn('course_id',$courses)->whereIn('id',$customer_programs)->where('status',0)->orderBy('id', 'desc')->paginate(10);
			$next_programs = Program::whereIn('course_id',$courses)->whereIn('id',$customer_programs)->where('status',1)->orderBy('id', 'desc')->paginate(10);
			$done_programs = Program::whereIn('course_id',$courses)->whereIn('id',$customer_programs)->where('status',2)->orderBy('id', 'desc')->paginate(10);
			$favorites = Course::whereIn('id',$courses)->whereIn('id',$favorite_ids)->paginate(10);

		return view('customer_programs.user_programs', compact('currently_programs','next_programs','done_programs','favorites'));
	}



	#view_course

	public function view_course($id)
	{
		$program = Program::where('id',$id)->first();
		$course = Course::where('id',$program->course_id)->first();
		$levels = Level::where('course_id',$course->id)->get();
		$menu_ids = CourseMenu::where('course_id',$id)->orderBy('id','desc')->pluck('menu_id')->toArray();
		$menus = Menu::whereIn('id',$menu_ids)->get();
		//$menus = Menu::whereIn('id',$menu_ids)->orderBy('id','desc')->get();

		return view('customer_programs.view_course', compact('program','course','menus','levels'));
	}


	public static function user_departments()
	{
		$user = Auth::user();
		$user = Customer::where('id',$user->customer_id)->first();
		$departments =array();
		$customer_programs = CustomerProgram::where('customer_id',$user->id)->orderBy('id', 'desc')->pluck('program_id')->toArray();

		if(count($customer_programs) >0){
			$couse_ids = Program::whereIn('id',$customer_programs)->distinct('course_id')->pluck('course_id')->toArray();

		$department_ids = Course::whereIn('id',$couse_ids)->pluck('department_id')->toArray();

		$departments =Department::whereIn('id',$department_ids)->get();
		}
		

		return $departments;
	}
	

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$courses= Course::all();
		return view('programs.create',compact("courses"));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$program = new Program();

		$program->course_id = $request->input("course_id");
        $program->from_date = $request->input("from_date");
        $program->to_date = $request->input("to_date");
        $program->duration = $request->input("duration");
        $program->price = $request->input("price");
        $program->priority = $request->input("priority");

		$program->save();

		return redirect()->route('programs.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$program = Program::findOrFail($id);

		return view('programs.show', compact('program'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$program = Program::findOrFail($id);

		return view('programs.edit', compact('program'));
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
		$program = Program::findOrFail($id);

		$program->course_id = $request->input("course_id");
        $program->from_date = $request->input("from_date");
        $program->to_date = $request->input("to_date");
        $program->duration = $request->input("duration");
        $program->price = $request->input("price");
        $program->priority = $request->input("priority");

		$program->save();

		return redirect()->route('programs.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$program = Program::findOrFail($id);
		$program->delete();

		return redirect()->route('programs.index')->with('message', 'Item deleted successfully.');
	}

}
