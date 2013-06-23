<?php
$rand = "edited_on_".microtime();

$I = new TestGuy($scenario);
$I->wantTo('edit post');
$I->amOnPage('/posts/2/edit');
$I->see('Edit Post', 'h1');
$I->fillField('#title', $rand);
$I->fillField('Body:', 'And greetings for all');
$I->click('Update');
$I->see('Show Post');
$I->see($rand);

