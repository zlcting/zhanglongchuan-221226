<?php

namespace Test\Service;

use PHPUnit\Framework\TestCase;
use App\Service\AppLogger;
use App\Service\ThinkLogger;

use \App\Service\SimleFactory;
/**
 * Class ProductHandlerTest
 */
class AppLoggerTest extends TestCase
{

    public function testInfoLog()
    {
        $logger = new AppLogger('log4php');
        $logger->info('This is info log message');

       // $SimleFactoryClass = new SimleFactory();
        $logger = \App\Service\SimleFactory::getInstance(SimleFactory::TYPE_LOG4PHP);
        $logger->info('This is info log message');
        $logger->debug('This is debug log message');
        $logger->error('This is error log message');

        $Thinklogger = \App\Service\SimleFactory::getInstance(SimleFactory::TYPE_THINKLOG);
        $Thinklogger->info('This is Thinklogger info log message');
        $Thinklogger->debug('This is Thinklogger debug log message');
        $Thinklogger->error('This is Thinklogger error log message');

    }
}