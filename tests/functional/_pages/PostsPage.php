<?php

class PostsPage
{
    // include url of current page
    static $url = '/posts';

    public static function route($param = '')
    {
        return static::$url.$param;
    }

    static $formFields = ['title' => '#title', 'body' => 'Body:'];

    /**
     * @var FunctionalTester;
     */
    protected $tester;

    public function __construct(FunctionalTester $I)
    {
        $this->tester = $I;
    }

    public static function of(FunctionalTester $I)
    {
        return new static($I);
    }

    public function createPost($fields = array())
    {
        $I = $this->tester;
        $I->amOnPage(self::$url);
        $I->click('Add new post');
        $this->fillFormFields($fields);
        $I->click('Submit');
        
        return $this;
    }

    public function editPost($id, $fields = array())
    {
        $I = $this->tester;
        $I->amOnPage(self::route("/$id/edit"));
        $I->see('Edit Post', 'h1');
        $this->fillFormFields($fields);
        $I->click('Update');
    }

    public function deletePost($id)
    {
        $I = $this->tester;
        $I->amOnPage($I->amOnPage(self::route("/$id")));
        $I->click('Delete');
    }

    protected function fillFormFields($data)
    {
        foreach ($data as $field => $value) {
            if (!isset(self::$formFields[$field])) throw new \Exception("Form field $field does not exist");
            $this->tester->fillField(self::$formFields[$field], $value);
        }
    }
}