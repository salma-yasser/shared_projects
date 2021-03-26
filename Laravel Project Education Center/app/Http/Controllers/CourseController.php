<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\CustomerProgram;
use App\Program;
use App\Course;
use App\Department;
use Illuminate\Http\Request;

class CourseController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$courses = Course::with('department')->orderBy('id', 'desc')->paginate(10);

		return view('courses.index', compact('courses'));
	}

	public function allcourses()
	{
		$courses = Course::orderBy('id', 'desc')->paginate(10);

		return view('courses.all', compact('courses'));
	}

#customercourses
	public function customercourses($key)
	{
		$userPrograms=CustomerProgram::where('id', $key)->pluck('program_id');
		$porograms=Program::whereIn('id', $userPrograms)->pluck('course_id');
		$courses = Course::whereIn('id', $porograms)->paginate(10);

		return view('courses.customer', compact('courses'));
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$departments = Department::orderBy("id","asc")->get();
		return view('courses.create', compact('departments'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$course = new Course();
		$this->validate($request, [
	        'name' => 'required|unique:courses|max:255',
	        'age' => 'required|max:255',
    	]);
		$course->name = $request->input("name");
        $course->description = $request->input("description");
        $goals=implode(",",$request->input("goals"));
        $course->goals = $goals;

        $course->age = $request->input("age");
        $course->duration = $request->input("duration");
        $course->levels = $request->input("levels");
        $course->tutorials = $request->input("tutorials");
        $course->how_performance = $request->input("how_performance");
        $course->how_register = $request->input("how_register");
        $course->how_degree = $request->input("how_degree");
        $course->department_id = $request->input("department");

      //  var_dump($course);die();

		$course->save();

		return redirect()->route('courses.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$course = Course::findOrFail($id);

		return view('courses.show', compact('course'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$course = Course::findOrFail($id);
		$departments = Department::orderBy("id","asc")->get();
		return view('courses.edit', compact('course','departments'));
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
		$course = Course::findOrFail($id);

		$course->name = $request->input("name");
        $course->description = $request->input("description");
        $course->goals = $request->input("goals");
        $course->age = $request->input("age");
        $course->duration = $request->input("duration");
        $course->levels = $request->input("levels");
        $course->tutorials = $request->input("tutorials");
        $course->how_performance = $request->input("how_performance");
        $course->how_register = $request->input("how_register");
        $course->how_degree = $request->input("how_degree");

		$course->save();

		return redirect()->route('courses.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$course = Course::findOrFail($id);
		$course->delete();

		return redirect()->route('courses.index')->with('message', 'Item deleted successfully.');
	}

}
