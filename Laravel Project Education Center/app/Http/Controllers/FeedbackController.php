<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$feedback = Feedback::orderBy('id', 'desc')->paginate(10);

		return view('feedback.index', compact('feedback'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('feedback.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$feedback = new Feedback();

		$feedback->title = $request->input("title");
        $feedback->reason = $request->input("reason");
        $feedback->customer_id = $request->input("customer_id");
        $feedback->message = $request->input("message");

		$feedback->save();

		return redirect()->route('feedback.create')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$feedback = Feedback::findOrFail($id);

		return view('feedback.show', compact('feedback'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$feedback = Feedback::findOrFail($id);

		return view('feedback.edit', compact('feedback'));
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
		$feedback = Feedback::findOrFail($id);

		$feedback->title = $request->input("title");
        $feedback->reason = $request->input("reason");
        $feedback->customer_id = $request->input("customer_id");
        $feedback->message = $request->input("message");

		$feedback->save();

		return redirect()->route('feedback.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$feedback = Feedback::findOrFail($id);
		$feedback->delete();

		return redirect()->route('feedback.index')->with('message', 'Item deleted successfully.');
	}

}
