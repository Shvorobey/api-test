<?php

namespace Tests\Unit;

use App\project;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class getProjectTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function GetProjectTest()
    {

        $db_project = DB::select('select * from projects where id = 1');
        $db_project_name = $db_project [0] ->name;


        $model_project = project::find(1);
        $model_project_name = $model_project->name;

        $this->assertEquals($db_project_name, $model_project_name);
    }
}
