<?php

namespace rfc\ws;

class Env
{
    const PATH = __DIR__ . '/../.env';

    public static function init() {
        $env = file_get_contents(self::PATH);
        $lines = explode("\n",$env);

        foreach($lines as $line){
            preg_match("/([^#]+)\=(.*)/",$line,$matches);
            if(isset($matches[2])){ putenv(trim($line)); }
        }
    }

}
