<?php
$rand = "edited_on_".microtime();

$I = new TestGuy($scenario);
$I->wantTo('edit post');
$id = $I->haveRecord('posts', array('title' => 'Hello World', 'body' => 'But not you'));
$I->amOnPage("/posts/$id/edit");
$I->see('Edit Post', 'h1');
$I->fillField('#title', $rand);
$I->fillField('Body:', 'And greetings for all');
$I->click('Update');
$I->see('Show Post');
$I->see($rand);

