<?php
use Codeception\Util\Stub;
use AspectMock\test;

class UserTest extends \Codeception\TestCase\Test
{
   /**
    * @var \CodeGuy
    */
    protected $codeGuy;


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