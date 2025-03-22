<?php

namespace rfc\ws\ui\component\utility;

class Sanitize {

    public static function text( string $unsafe_text ) : string {
		return self::encode_html($unsafe_text);
	}
	
	public static function url( string $unsafe_url ) : string {
		return self::esc_url( $unsafe_url );
	}

    public static function attr( string $unsafe_attr ) : string {
        return self::esc_attr( $unsafe_attr );
    }
	
	public static function html( string $unsafe_html ) : string {
		return $unsafe_html;
		//@todo sanitize
	}

    private static function encode_html( string $text ) : string {
        return $text;
        //@todo sanitize text and remove html or render as special chars;
    }

    private static function esc_url( string $unsafe_url ) : string {
        return $unsafe_url;
        //@todo sanitize
    }

    private static function esc_attr( string $unsafe_attr ) : string {
        return $unsafe_attr;
        //@todo sanitize
    }
}