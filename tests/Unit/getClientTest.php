<?php

namespace Tests\Unit;

use App\client;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class getClientTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->assertTrue(true);
    }
    public function GetClientTest()
    {

        $db_client = DB::select('select * from clients where id = 1');
       $db_client_first_name = $db_client [0] ->first_name;


        $model_client = client::find(1);
        $model_client_first_name = $model_client->first_name;

        $this->assertEquals($db_client_first_name, $model_client_first_name);
    }
}
