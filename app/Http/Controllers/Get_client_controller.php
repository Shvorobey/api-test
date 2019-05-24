<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Get_client_controller extends Controller
{
   public function __invoke($id)
   {
       return response()->json(\App\client::find($id), 200);
   }
}
