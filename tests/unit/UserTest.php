<?php
use Codeception\Util\Stub;
use AspectMock\Test as test;

class UserTest extends \PHPUnit_Framework_TestCase
{

    protected function _after()
    {
        test::clean();
    }

    // tests
    public function testMe()
    {
        test::double('User',['getAuthPassword' => '1234']);
        $user = new User;
        $this->assertEquals('1234', $user->getAuthPassword());
    }

}