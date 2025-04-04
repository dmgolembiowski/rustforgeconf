<?php

namespace rfc\ws;

class LilReggie {

    const API_CACHE_PATH = __DIR__ .'/../cache/remote/';

    public static function get_bookings() {
        return self::cached_get('bookings');
    }

    public static function get_attendees() {
        return self::cached_get('attendees');
    }

    public static function cached_get( string $name ) {
        $cache_file = self::API_CACHE_PATH . $name . '.json';
        $api_key = getenv('LIL_REGIE_API_KEY');

        if ( ! file_exists( self::API_CACHE_PATH )) {
            mkdir(self::API_CACHE_PATH, 0755, true);  // create directory if not exists
        }

        if (file_exists($cache_file) && (time() - filemtime($cache_file)) < 3600) {
            return json_decode(file_get_contents($cache_file), true);
        } else {
            $response = file_get_contents('https://api.lilregie.com/v1/'.$name.'?api_key=' . $api_key);
            file_put_contents($cache_file, $response);
            return json_decode($response, true);
        }
    }

}