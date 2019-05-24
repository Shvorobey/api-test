<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Get_projects_controller extends Controller
{
    public function __invoke()
    {
        return response()->json(\App\project::all(), 200);
    }
}
