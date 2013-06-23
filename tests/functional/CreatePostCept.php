<?php
$I = new TestGuy($scenario);
$I->wantTo('create post');
$I->amOnPage('/posts');
$I->see('All Posts');
$I->click('Add new post');
$I->fillField('#title', 'Hello world again');
$I->fillField('Body:', 'And greetings for all');
$I->click('Submit');
$I->see('All Posts');
$I->see('Hello world');
