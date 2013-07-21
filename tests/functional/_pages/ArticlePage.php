<?php

class ArticlePage
{
    // include url of current page
    const URL = '/posts';

     public static function route($param)
     {
        return static::URL.$param;
     }

    /**
     * @var TestGuy;
     */
    protected $testGuy;

    public function __construct(TestGuy $I)
    {
        $this->testGuy = $I;
    }

    public static function of(TestGuy $I)
    {
        return new static($I);
    }

    public function createArticle($title, $body)
    {
        $I = $this->testGuy;

        $I->amOnPage(ArticlePage::URL);
        $I->click('Add new post');
        $I->fillField('#title', $title);
        $I->fillField('Body:', $body);
        $I->click('Submit');
        
        return $this;
    }    
}