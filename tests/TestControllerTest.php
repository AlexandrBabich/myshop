<?php



class TestControllerTest extends TestCase
{


    public function testSluggifyReturnsSluggifiedString()
{

    $details = array();

    $user = new \App\Http\Controllers\TestController($details);

    $password = 'fubar';

    $user->setPassword($password);

    $expectedPasswordResult = '5185e8b8fd8a71fc80545e144f91faf2';

    $currentUser = $user->getUser();

    $this->assertEquals($expectedPasswordResult, $currentUser['password']);
}


}