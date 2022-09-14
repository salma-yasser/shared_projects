<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
   {
       // $role = Auth::user()->role;
       // $checkrole = explode(',', $role);
       // dd($role);
       // if (in_array('admin', $checkrole)) {
       //     return redirect('dog/indexadmin');
       // } else {
       //     return redirect('pet/index');
       // }

   }
}
