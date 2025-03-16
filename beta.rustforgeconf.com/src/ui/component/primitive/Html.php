<?php

namespace rfc\ws\ui\component\primitive;

use rfc\ws\ui\component\behaviour;
use rfc\ws\ui\component\impl;
use rfc\ws\ui\component\utility\Sanitize;

class Html
	implements behaviour\Render
{
	
	use impl\Render;
	
	protected string $text;
	
	public function __construct( string $text) {
		$this->text = $text;
	}

    // Strings as tags or arrays with tag -> property value pairs
    public function allowed_tags( ...$allowed_tags_or_tags_and_properties) : self {
        $allowed_tags = [];

        foreach( $allowed_tags_or_tags_and_properties as $t) {
            if( is_string( $t)) {
                $allowed_tags[$t] = [];
            }
            if ( is_array( $t)) {
                $allowed_tags = array_merge( $allowed_tags, $t);
            }
        }

        $this->text = wp_kses( $this->text, $allowed_tags );
        return $this;
    }
	
	public function should_render() : bool
	{
		return !empty($this->text);
	}
	
	protected function generate_output() : string
	{
		return Sanitize::html($this->text);
	}
	
}