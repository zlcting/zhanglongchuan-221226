<?php
namespace App\Util;

class HttpRequest {
    function get($url) {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch,CURLOPT_TIMEOUT,1);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }
    function mockGet($url){

        return '{
            "error": 0,
            "data": {
                "id": 1,
                "username": "hello world"
            }
        }';
    }
}