<?php
$I = new TestGuy($scenario);
$I->wantTo('perform actions and see result');
$I->amOnPage('/posts');
$I->see('All Posts');
$I->click('Add new post');
$I->fillField('Title:', 'Hello world');
$I->fillField('Body:', 'And greetings for all');
$I->click('Submit');
$I->see('All Posts');
$I->see('Hello world');
