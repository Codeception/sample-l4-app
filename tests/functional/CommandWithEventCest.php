<?php
class CommandWithEventCest
{

    /**
     * @group event
     */
    public function firstTest(FunctionalTester $I)
    {
        $I->callArtisan('test:fire-event');
    }

    public function secondTest(FunctionalTester $I)
    {
        $I->callArtisan('test:fire-event');
    }

}