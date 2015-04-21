<?php
$I = new FunctionalTester($scenario);
$I->wantTo('test session errors');

$I->amOnPage('/auth/register');
$I->click('button[type=submit]');

$I->seeCurrentUrlEquals('/auth/register');

$I->seeSessionHasErrors();
$I->seeSessionErrorMessage(['name' =>  'The name field is required.']);
