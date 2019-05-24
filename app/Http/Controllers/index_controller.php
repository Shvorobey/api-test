<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class index_controller extends Controller
{
   public function __invoke()
   {
       return response()->json(['welcome'=>['Welcome to the test case! '], 'current time'=>date('Y-m-d h:m:s')], 200);
   }
}
