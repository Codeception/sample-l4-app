<?php
$I = new FunctionalTester($scenario);
$I->wantTo('see flash message');
$I->amOnPage('/flash');
$I->see('Its a flash');