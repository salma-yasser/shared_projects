<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Job;
use App\HowKnow;
use App\Customer;
use App\Course;
use App\Program;
use App\Kid;
use App\ParentChild;
use App\KidParent;
use App\CustomerProgram;
use App\Favorite;
use App\PreviousCourse;
use Illuminate\Http\Request;

class KidController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$kids = Kid::orderBy('id', 'desc')->paginate(10);

		return view('kids.index', compact('kids'));
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
		return view('kids.create',compact("jobs","howKnows",'programs'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function createApplication()

	{
		$courses=Course::orderBy("name","asc")->get();
		return view('kids.create_application',compact("courses"));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
	//	$customer = session('customer');
		$this->validate($request, [
			'name' => 'required|unique:customers|max:255',
	        'email' => 'required|unique:customers|max:255',
	        'nationality' => 'required|max:255',
	        'birthdate' => 'required|max:255',
	        'gender' => 'required|max:255',

	        'school_name' => 'required|max:255',
	        'school_type' => 'required|max:255',
	        'year' => 'required|max:255',
	        'level' => 'required|max:255',
	      
    	]);
    	$customer = new Customer();

		$customer->name = $request->input("name");
        $customer->email = $request->input("email");
        $customer->nationality = $request->input("nationality");
        $customer->national_id = $request->input("national_id");
        $customer->birthdate = $request->input("birthdate");
        $customer->gender = $request->input("gender");
        #type [adult-> 1, kids-> 2]
        $customer->type = 2;
        $customer->how_know = $request->input("how_know");
        #status Applicant , Registered , Verified , Blocked
        $customer->status ="Registered";
        $customer->save();

		$kid = new Kid();

        $kid->customer_id = $customer->id;
        $kid->school_name = $request->input("school_name");
        $kid->school_type = $request->input("school_type");
        $kid->school_address = $request->input("school_address");
        $kid->year = $request->input("year");
        $kid->level = $request->input("level");
        $kid->mobile = $request->input("mobile");


       $kid->save();

      //  echo $request->input("parent_name")[0];die();

        for ($i=0; $i < 2; $i++) { 

        	$parent = new ParentChild();

			$parent->name = $request->input("parent_name")[$i];
	        $parent->relative = $request->input("relative")[$i];
	        $parent->mobile1 = $request->input("parent_mobile1")[$i];
	        $parent->mobile2 = $request->input("parent_mobile2")[$i];
	        $parent->phone = $request->input("phone_parent")[$i];
	        $parent->address = $request->input("address_parent")[$i];
	        $parent->email = $request->input("email_parent")[$i];

			$parent->save();
			$kid_parent = new KidParent();

			$kid_parent->parent_id = $parent->id;
	        $kid_parent->kid_id = $kid->id;

			$kid_parent->save();
			
        }

  
        $customer_program = new CustomerProgram();

		$customer_program->customer_id = $customer->id;
        $customer_program->program_id = $request->input("program_id")[0];
        $customer_program->goals = $request->input("goals");
    //    $customer_program->status = $request->input("status");

	//	$customer_program->save();

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
	        'nationality' => 'required|max:255',
	        'school_name' => 'required|max:255',
	        'school_year' => 'required|max:255',
	        'school_level' => 'required|max:255',
	        'parent_name' => 'required|max:255',
	        'relative' => 'required|max:255',
	        'parent_mobile1' => 'required|digits_between:11,12',
	        'parent_mobile2' => 'digits_between:11,12',
	        'phone_parent' => 'digits_between:7,10',
	        'address_parent' => 'required|max:255',
	        'email_parent' => 'email|max:255',
	        'parent_mobile1_2' => 'digits:11',
	        'parent_mobile2_2' => 'digits:11',
	    ]);

    	DB::beginTransaction();
    	try{
	        $customer= new Customer();
	        $customer->name = $request->input("name");
	        $customer->nationality = $request->input("nationality");
	        $customer->birthdate = $request->input("birthdate");
	        $customer->gender = $request->input("gender");
	        #type [adults-> 1, kids-> 2]
	        $customer->type = 2;
	        #status Applicant , Registered , Verified , Blocked
	        $customer->status = "Applicant";
	        $customer->save();
	        
	        $kid = new kid();
	        $kid->customer_id = $customer->id;
	        $kid->school_name = $request->input("school_name");
	        $kid->school_type = $request->input("school_type");
	        $kid->school_address = $request->input("school_address");
	        $kid->year = $request->input("school_year");
	        $kid->level = $request->input("school_level");
	        $kid->save();
	        #Parent 1
        	$parent = new ParentChild();
			$parent->name = $request->input("parent_name");
	        $parent->relative = $request->input("relative");
	        $parent->mobile1 = $request->input("parent_mobile1");
	        $parent->mobile2 = $request->input("parent_mobile2");
	        $parent->phone = $request->input("phone_parent");
	        $parent->address = $request->input("address_parent");
	        $parent->email = $request->input("email_parent");
	        $parent->work = $request->input("work_parent");
	        $parent->save();
			$kid_parent = new KidParent();
			$kid_parent->parent_id = $parent->id;
	        $kid_parent->kid_id = $kid->id;
			$kid_parent->save();
			#Parent 2
	        $parent = new ParentChild();
			$parent->name = $request->input("parent_name_2");
	        $parent->relative = $request->input("relative_2");
	        $parent->mobile1 = $request->input("parent_mobile1_2");
	        $parent->mobile2 = $request->input("parent_mobile2_2");
	        $parent->save();
	        $kid_parent = new KidParent();
			$kid_parent->parent_id = $parent->id;
	        $kid_parent->kid_id = $kid->id;
			$kid_parent->save();
			
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
		$kid = Kid::findOrFail($id);

		return view('kids.show', compact('kid'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$kid = Kid::findOrFail($id);

		return view('kids.edit', compact('kid'));
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
		$kid = Kid::findOrFail($id);

		$kid->name = $request->input("name");
        $kid->school_name = $request->input("school_name");
        $kid->school_type = $request->input("school_type");
        $kid->school_address = $request->input("school_address");
        $kid->year = $request->input("year");
        $kid->level = $request->input("level");
        $kid->mobile = $request->input("mobile");

		$kid->save();

		return redirect()->route('kids.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$kid = Kid::findOrFail($id);
		$kid->delete();

		return redirect()->route('kids.index')->with('message', 'Item deleted successfully.');
	}

}
