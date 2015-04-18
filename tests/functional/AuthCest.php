<?php

class AuthCest
{
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

    public function _after(FunctionalTester $I)
    {
        $I->amOnPage(PostsPage::$url);
        $I->seeCurrentUrlEquals(PostsPage::$url);
        $I->seeAuthentication();
        $I->logout();
        $I->dontSeeAuthentication();
    }

    public function loginUsingUserRecord(FunctionalTester $I)
    {
        $I->dontSeeAuthentication();
        $I->amLoggedAs(User::firstOrNew($this->userAttributes));
    }

    public function loginUsingCredentials(FunctionalTester $I)
    {
        $I->dontSeeAuthentication();
        $I->haveRecord('users', $this->userAttributes);
        $I->amLoggedAs(['email' => 'john@doe.com', 'password' => 'password']);
    }

}