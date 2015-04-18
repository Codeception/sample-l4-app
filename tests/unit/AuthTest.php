<?php


class AuthTest extends \Codeception\TestCase\Test
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    private $userAttributes;

    public function  __construct()
    {
        $this->userAttributes= [
            'email' =>  'john@doe.com',
            'password' => Hash::make('password'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
    }

    public function testAuthFacadeReturnsCorrectInformationAfterLoggingIn()
    {
        $this->assertNull(Auth::user());
        $this->assertNull(Auth::id());

        $user = User::firstOrNew($this->userAttributes);
        $this->tester->amLoggedAs($user);

        $this->assertEquals($user, Auth::user());
        $this->assertEquals($user->id, Auth::id());
    }

}