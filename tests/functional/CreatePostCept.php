<?php
$I = new TestGuy($scenario);
$I->wantTo('create post');
ArticlePage::of($I)
	->createArticle('Bye world again', 'And greetings for all');
$I->see('Bye world');
