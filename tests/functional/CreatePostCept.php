<?php
$I = new TestGuy($scenario);
$I->wantTo('create post');
ArticlePage::of($I)->createArticle('Hello world again', 'And greetings for all');
$I->see('Hello world');
