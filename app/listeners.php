<?php

Event::forget('artisan-event');
Event::listen('artisan-event', function($message) {
    \Codeception\Util\Debug::debug($message);
});
