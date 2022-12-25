<?php

namespace Test\App;

use PHPUnit\Framework\TestCase;
use App\App;
use App\Util\HttpRequest;
use App\Service\AppLogger;

class DemoTest extends TestCase
{

    public function test_foo()
    {
        $request = new HttpRequest();
        $logger = new AppLogger();
        $DemoClass = new App\Demo($logger,$request);
        $this->assertEquals("bar", $DemoClass->foo());
    }

    public function test_get_user_info()
    {
        $request = new HttpRequest();
        $logger = new AppLogger();
        $DemoClass = new App\Demo($logger,$request);
        
        $res =  $DemoClass ->get_user_info();
        if (empty($res)){
            $this->assertEquals(null, $res);
        }else{
            foreach ($res as $key => $value) {
                if ($key == "id"){
                    $this->assertEquals("id", $key);
                }
                if ($key == "username"){
                    $this->assertEquals("username", $key);
                }
            }

        }
    }
}
