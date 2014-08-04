<?php
class RoutesCest
{
    public function _before(FunctionalTester $I)
    {
        $I->haveDisabledFilters();
    }

    // tests
    public function openPageByRoute(FunctionalTester $I)
    {
        $I->amOnRoute('posts.index');
        $I->seeCurrentUrlEquals('/posts');
        $I->seeCurrentActionIs('PostsController@index');
    }

    public function openPageByAction(FunctionalTester $I)
    {
        $I->amOnAction('PostsController@index');
        $I->seeCurrentUrlEquals('/posts');
        $I->seeCurrentRouteIs('posts.index');
    }
}