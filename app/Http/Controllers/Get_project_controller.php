<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Get_project_controller extends Controller
{
   public function __invoke($id)
   {
       return response()->json(\App\project::find($id), 200);
   }
}
