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

    public function loginUsingUserRecord(FunctionalTester $I)
    {
        $I->dontSeeAuthentication();

        $user = User::create($this->userAttributes);
        $I->amLoggedAs($user);

        $I->amOnPage(PostsPage::$url);
        $I->seeCurrentUrlEquals(PostsPage::$url);
        $I->seeAuthentication();

        $I->logout();
        $I->dontSeeAuthentication();
    }

    public function loginUsingCredentials(FunctionalTester $I)
    {
        $I->dontSeeAuthentication();
        $I->haveRecord('users', $this->userAttributes);
        $I->amLoggedAs(['email' => 'john@doe.com', 'password' => 'password']);

        $I->amOnPage(PostsPage::$url);
        $I->seeCurrentUrlEquals(PostsPage::$url);
        $I->seeAuthentication();

        $I->logout();
        $I->dontSeeAuthentication();
    }

    public function requireAuthenticationForRoute(FunctionalTester $I)
    {
        $I->haveEnabledFilters();

        $I->amOnPage('/secure');
        $I->seeCurrentUrlEquals('/auth/login');
        $I->see('Login');

        $I->amLoggedAs(User::create($this->userAttributes));
        $I->amOnPage('/secure');
        $I->seeResponseCodeIs(200);
        $I->see('Hello World');
    }

}