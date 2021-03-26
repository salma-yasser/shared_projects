<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function create(Request $request)
	{
		$this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
        $user=User::where("customer_id",$request->input('id'))->first();
        if(count($user)>0){
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = bcrypt($request->input('password'));
            $user->save();
        }else{
            $user = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password')),
                'customer_id' => $request->input('id'),
                'type' => 3
            ]);
        }
        
		return redirect()->route('customers.index')->with('message', 'Item created successfully.');

	}
}
