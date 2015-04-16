<?php


class AuthTest extends \Codeception\TestCase\Test
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    public function testAuthFacadeReturnsCorrectInformationAfterLoggingIn()
    {
        $this->assertNull(Auth::user());
        $this->assertNull(Auth::id());

        $user = User::first();
        $this->tester->amLoggedAs($user);

        $this->assertEquals($user, Auth::user());
        $this->assertEquals($user->id, Auth::id());
    }

}