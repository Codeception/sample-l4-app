<?php
// include_once '/home/davert/Codeception/src/Codeception/Platform/Extension.php';
// include_once '/home/davert/Notifier/src/Codeception/Extension/UbuntuNotifier.php';
// include_once '/home/davert/Notifier/src/Codeception/Extension/EmailNotifier.php';
include __DIR__.'/../vendor/autoload.php';

$kernel = \AspectMock\Kernel::getInstance();
$kernel->init([
    'includePaths' => [__DIR__.'/../app/']
]);

$app = require_once __DIR__.'/../bootstrap/start.php';

\Codeception\Util\Autoload::registerSuffix('Page', __DIR__.DIRECTORY_SEPARATOR.'_pages');