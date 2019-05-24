<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\DB;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AccessorTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testClient()
    {
        $db_client = DB::select('select * from clients where id = 1');
        $db_client_first_name = $db_client [0] ->first_name;

        $response = $this->get('/clients/1');

        $response->assertStatus(200);
        $response->assertSeeText($db_client_first_name);
    }

    public function testProject()
    {
        $db_project = DB::select('select * from projects where id = 1');
        $db_project_name = $db_project [0] ->name;

        $response = $this->get('/projects/1');

        $response->assertStatus(200);
        $response->assertSeeText($db_project_name);
    }
}
