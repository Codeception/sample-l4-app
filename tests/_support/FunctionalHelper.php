<?php
namespace Codeception\Module;

// here you can define custom functions for FunctionalTester

class FunctionalHelper extends \Codeception\Module
{
    public function _before()
    {
        $I = $this->getModule('Laravel4');
        $artisan = $I->grabService('artisan');
        $artisan->call('migrate');
    }
}
