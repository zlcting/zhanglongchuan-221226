<?php

namespace App\Service;

interface LoggerInterface{
    public function info();
    public function debug();
    public function error();
}


class SimleFactory {
    const TYPE_LOG4PHP = 'log4php';
    const TYPE_THINKLOG = 'thinklog';
    private static $AppLoggerClass;
    private static $ThinkLoggerClass;

    public static function getInstance($factoryName){

        switch ($factoryName) {
            case self::TYPE_LOG4PHP:
                if (!empty(self::$AppLoggerClass)){
                    return self::$AppLoggerClass;
                }
                self::$AppLoggerClass = new AppLogger(self::TYPE_LOG4PHP);
                return self::$AppLoggerClass;
                break;
            case self::TYPE_THINKLOG:

                if (!empty(self::$ThinkLoggerClass)){
                    return self::$ThinkLoggerClass;
                }
                self::$ThinkLoggerClass = new ThinkLogger();
                return self::$ThinkLoggerClass;
                break;
            default:
                # code...
                break;
        }

    }
}


class AppLogger implements LoggerInterface
{
    private $logger;

    public function __construct($type = SimleFactory::TYPE_LOG4PHP)
    {
        if ($type == SimleFactory::TYPE_LOG4PHP) {
            $this->logger = \Logger::getLogger("Log");
        }
    }

    public function info($message = '')
    {
        $this->logger->info($message);
    }

    public function debug($message = '')
    {
        $this->logger->debug($message);
    }

    public function error($message = '')
    {
        $this->logger->error($message);
    }
}

class ThinkLogger implements LoggerInterface{

    public function __construct()
    {
        \think\facade\Log::init([
            'default'	=>	'file',
            'channels'	=>	[
                'file'	=>	[
                    'type'	=>	'file',
                    'path'	=>	'./logs/',
                ],
            ],
        ]);
        
    }

    public function info($message = '')
    {
        
        \think\facade\Log::info($message);
        \think\facade\Log::save();
    }

    public function debug($message = '')
    {

        \think\facade\Log::debug($message);
        \think\facade\Log::save();
    }

    public function error($message = '')
    {

        \think\facade\Log::error($message);
        \think\facade\Log::save();
    }
}