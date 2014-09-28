<?php
use \FunctionalTester;

class AuthCest
{
    // tests
    public function loginUsingUserRecord(FunctionalTester $I)
    {
        $I->dontSeeAuthentication();
        $I->amLoggedAs(User::firstOrNew([]));
    }

    public function loginUsingCredentials(FunctionalTester $I)
    {
        $I->dontSeeAuthentication();
        $I->amLoggedAs(['email' => 'john@doe.com', 'password' => 'password']);
    }

    public function _after(FunctionalTester $I)
    {
        $I->amOnPage(PostsPage::$url);
        $I->seeCurrentUrlEquals(PostsPage::$url);
        $I->seeAuthentication();
        $I->logout();
        $I->dontSeeAuthentication();
    }
}