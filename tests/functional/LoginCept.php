<?php
$I = new FunctionalTester($scenario);
$I->wantTo('login as a user');

$I->haveRecord('users', [
    'email' =>  'john@doe.com',
    'password' => Hash::make('password'),
    'created_at' => new DateTime(),
    'updated_at' => new DateTime(),
]);

$I->amOnPage('/auth/login');
$I->fillField('email', 'john@doe.com');
$I->fillField('password', 'password');
$I->click('Login');

$I->amOnPage('/');
$I->seeAuthentication();
$I->see('Logged in as john@doe.com');