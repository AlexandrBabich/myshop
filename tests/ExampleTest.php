<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    /*
    public function testBasicExample()
    {
        $this->visit('/')
             ->see('Laravel 5');
    }
*/
    public function testHomePage(){
        $response=$this->call('GET','/');
        $this->assertTrue(strpos($response->getContent(),'Register')!==false);

    }
}
