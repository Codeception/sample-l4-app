<?php
$I = new TestGuy($scenario);
$I->wantTo('perform actions and see result');
$I->amOnPage('/posts');
$I->seeCurrentUrlEquals('/posts');
$I->amOnPage('/back');
$I->seeCurrentUrlEquals('/posts');
