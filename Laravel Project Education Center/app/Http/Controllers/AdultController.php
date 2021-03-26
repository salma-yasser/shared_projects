<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Adult;
use App\Job;
use App\HowKnow;
use App\Course;
use App\Program;
use App\CustomerProgram;
use App\Customer;
use App\Favorite;
use App\PreviousCourse;
use Illuminate\Http\Request;

class AdultController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$adults = Adult::orderBy('id', 'desc')->paginate(10);

		return view('adults.index', compact('adults'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()

	{
		$howKnows =HowKnow::all();
		$jobs=Job::orderBy("id","asc")->get();
		$programs = Program::all();
		foreach ($programs as $program) {
			# code...
			$course=Course::where("id",$program->course_id)->first();
			$program->course=$course;
		}
		//var_dump($programs);die();
		return view('adults.create',compact("jobs","howKnows",'programs'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function createApplication()

	{
		$jobs=Job::orderBy("id","asc")->get();
        $courses=Course::orderBy("name","asc")->get();
		return view('adults.create_application',compact("jobs","courses"));
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
	        'name' => 'required|max:255',
	        'email' => 'required|email|unique:adults|max:255',
	        'nationality' => 'required|max:255',
	        'national_id' => 'required|digits:14|unique:customers|max:255',
	        'birthdate' => 'required|before:today|max:255',
	        'address' => 'required|max:255',
	        'city' => 'required|max:100',
	        'mobile1' => 'required|digits_between:11,12',
	        'mobile2' => 'digits_between:11,12',
	        'phone' => 'digits_between:7,10',
	        'qualification' => 'required|max:255',
	        'program_id' => 'required',
    	]);
		$customer = new Customer();

		$customer->name = $request->input("name");
        $customer->nationality = $request->input("nationality");
        $customer->national_id = $request->input("national_id");
        $customer->birthdate = $request->input("birthdate");
        $customer->gender = $request->input("gender");
        #type [adult-> 1, kids-> 2]
        $customer->type = 1;
        $customer->how_know = $request->input("how_know");
        #status Applicant , Registered , Verified , Blocked
        $customer->status ="Registered";
        $customer->save();

		$adult = new Adult();
		$adult->customer_id =$customer->id;
		$adult->address = $request->input("address");
		$adult->city = $request->input("city");
        $adult->mobile1 = $request->input("mobile1");
        $adult->mobile2 = $request->input("mobile2");
        $adult->phone = $request->input("phone");
        $adult->email = $request->input("email");
        $adult->job_status = $request->input("job_status");
        $adult->work = $request->input("work");
        $adult->qualification = $request->input("qualification");

		$adult->save();


		$customer_program = new CustomerProgram();

		$customer_program->customer_id = $customer->id;
        $customer_program->program_id = $request->input("program_id");
        $customer_program->goals = $request->input("goals");
    //    $customer_program->status = $request->input("status");

		$customer_program->save();

		#then generate username and password 
		$username=str_random(10);

		return redirect()->route('customers.index')->with('message', 'Item created successfully.');
	}

	/**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeApplication(Request $request)
    {
    	
    	$this->validate($request, [
	        'name' => 'required|max:255',
	       	'birthdate' => 'required|before:today|max:255',
	       	'email' => 'required|email|unique:adults|max:255',
	        'nationality' => 'required|max:255',  
	        'address' => 'required|max:255',
	        'mobile' => 'required|digits_between:11,12',
	        'phone' => 'digits_between:7,10',
	        'qualification' => 'required|max:255',
	        'work' => 'max:255',
	    ]);

    	DB::beginTransaction();
    	try{
	        $customer= new Customer();
	        $customer->name = $request->input("name");
	        $customer->gender = $request->input("gender");
	        $customer->birthdate = $request->input("birthdate");
	        $customer->nationality = $request->input("nationality");
	        #type [adult-> 1, kids-> 2]
	        $customer->type = 1;
	        #status Applicant , Registered , Verified , Blocked
	        $customer->status = "Applicant";
	        $customer->save();
	        
	        $adult = new Adult();
	        $adult->customer_id = $customer->id;
	        $adult->address = $request->input("address");
	        $adult->mobile1 = $request->input("mobile");
	        $adult->phone = $request->input("phone");
	        $adult->email = $request->input("email");
	        $adult->qualification = $request->input("qualification");
	        $adult->work = $request->input("work");
	        $adult->save();

	        $courses = $request->input("courses");
	        foreach( $courses as $course ){
	            $favorite = new Favorite();
	            $favorite->customer_id = $customer->id;
	            $favorite->course_id = $course;
	            $favorite->save();
	        }
	        $other_courses = $request->input("other");
	        if($other_courses!=null)
	        {
	        	$favorite = new Favorite();
	            $favorite->customer_id = $customer->id;
	            $favorite->other = $other_courses;
	            $favorite->save();
	        }
	        
	        $courses_before = $request->input("courses_before");
	        if($courses_before=='Yes'){
	        	$previousCourse = new PreviousCourse();
	        	$previousCourse->customer_id = $customer->id;
	        	$previousCourse->course_name = $request->input("course_name");
	        	$previousCourse->level = $request->input("level");
	        	$previousCourse->place = $request->input("place");
	        	$previousCourse->save();
	        }
	        DB::commit();
        }catch (Exception $e) {
		    DB::rollback();
		    // something went wrong
		}
        return redirect()->route('customers.index')->with('message', 'Item created successfully.');
    }

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$adult = Adult::findOrFail($id);

		return view('adults.show', compact('adult'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$adult = Adult::findOrFail($id);

		return view('adults.edit', compact('adult'));
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
		$adult = Adult::findOrFail($id);

		$adult->address = $request->input("address");
        $adult->mobile1 = $request->input("mobile1");
        $adult->mobile2 = $request->input("mobile2");
        $adult->phone = $request->input("phone");
        $adult->email = $request->input("email");
        $adult->job_status = $request->input("job_status");
        $adult->work = $request->input("work");
        $adult->job_id = $request->input("job_id");

		$adult->save();

		return redirect()->route('adults.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$adult = Adult::findOrFail($id);
		$adult->delete();

		return redirect()->route('adults.index')->with('message', 'Item deleted successfully.');
	}

}
