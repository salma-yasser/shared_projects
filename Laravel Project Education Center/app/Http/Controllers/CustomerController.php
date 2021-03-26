<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Customer;
use App\Course;
use App\Camp;
use App\User;
use App\Program;
use App\HowKnow;
use Illuminate\Http\Request;

class CustomerController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$customers = Customer::orderBy('id', 'desc')->paginate(15);

		return view('customers.index', compact('customers'));
	}
	
	public function listByHowKnow($id)
	{
		$customers = Customer::where('how_know',$id)->orderBy('id', 'desc')->paginate(15);

		return view('customers.index', compact('customers'));
	}
	

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
			$howKnows = HowKnow::all();
		
		return view('customers.create',compact("howKnows"));
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
	        'name' => 'required|unique:customers|max:255',
	        'email' => 'required|unique:customers|max:255',
	        'nationality' => 'required|max:255',
	        'birthdate' => 'required|max:255',
	        'gender' => 'required|max:255',
	        'type' => 'required|max:255',
    	]);
		$customer = new Customer();

		$customer->name = $request->input("name");
        $customer->email = $request->input("email");
        $customer->nationality = $request->input("nationality");
        $customer->national_id = $request->input("national_id");
        $customer->birthdate = $request->input("birthdate");
        $customer->gender = $request->input("gender");
        $customer->type = (int)$request->input("type");
        $customer->how_know = $request->input("how_know");
        #status applicant , registered , verified , blocked
        $customer->status ="registered";

        //$value = session('customer');

	    // Store a piece of data in the session...
	    session(['customer' => $customer]);

	//	$customer->save();
	    if($customer->type == 2){
	    	#kids
			return redirect()->route('kids.create')->with('message', 'Item created successfully.');

	    }elseif ($customer->type == 1) {
	    	#adult
			return redirect()->route('adults.create')->with('message', 'Item created successfully.');

	    }else{
			return redirect()->route('customers.create')->with('message', 'Item created successfully.');

	    }
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$customer = Customer::findOrFail($id);

		return view('customers.show', compact('customer'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$customer = Customer::findOrFail($id);

		return view('customers.edit', compact('customer'));
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
		$customer = Customer::findOrFail($id);

		$customer->name = $request->input("name");
        $customer->email = $request->input("email");
        $customer->nationality = $request->input("nationality");
        $customer->birthdate = $request->input("birthdate");
        $customer->gender = $request->input("gender");
        $customer->type = $request->input("type");
        $customer->how_know = $request->input("how_know");
        $customer->status = $request->input("status");

		$customer->save();

		return redirect()->route('customers.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$customer = Customer::findOrFail($id);
		$customer->delete();

		return redirect()->route('customers.index')->with('message', 'Item deleted successfully.');
	}

}
