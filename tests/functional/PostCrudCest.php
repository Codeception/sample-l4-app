<?php
use \FunctionalTester;

class CreatePostCest
{
    public function _before(FunctionalTester $I)
    {
        $I->amHttpAuthenticated('john@doe.com', 'password');
    }

    // tests
    public function createPost(FunctionalTester $I)
    {
        PostsPage::of($I)->createPost(['title' => 'Hello world', 'body' => 'And greetings for all']);
        $I->seeCurrentUrlEquals(PostsPage::$url);
        $I->see('Hello world', '.table');
    }

    public function createPostValidationFails(FunctionalTester $I)
    {
        PostsPage::of($I)->createPost();
        $I->seeCurrentUrlEquals(PostsPage::route('/create'));
        $I->seeSessionHasErrors();
        $I->seeSessionErrorMessage(['title' => 'The title field is required.']);
        $I->see('The body field is required.','.error');
        $I->see('The title field is required.','.error');
    }

    public function editPost(FunctionalTester $I)
    {
        $randTitle = "Edited at ".microtime();
        $id = $I->haveRecord('posts', ['title' => 'Hello Universe', 'body' => 'You are so awesome']);
        PostsPage::of($I)->editPost($id, ['title' => 'Edited at '.$randTitle]);
        $I->seeCurrentUrlEquals(PostsPage::route("/$id"));
        $I->see('Show Post', 'h1');
        $I->see($randTitle);
        $I->dontSee('Hello Universe');
    }

    public function deletePost(FunctionalTester $I)
    {
        $id = $I->haveRecord('posts', ['title' => 'Hello Universe', 'body' => 'You are so awesome']);
        $I->amOnPage(PostsPage::$url);
        $I->see('Hello Universe');
        PostsPage::of($I)->deletePost($id);
        $I->seeCurrentUrlEquals(PostsPage::$url);
        $I->dontSee('Hello Universe');
    }
}