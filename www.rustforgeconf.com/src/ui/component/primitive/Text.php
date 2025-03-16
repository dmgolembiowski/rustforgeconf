<?php

namespace rfc\ws\ui\component\primitive;

use rfc\ws\ui\component\behaviour;
use rfc\ws\ui\component\impl;
use rfc\ws\ui\component\utility\Sanitize;

class Text
	implements behaviour\Render
{
	
	use impl\Render;
	
	protected string $text;
	
	public function __construct( string $text) {
		$this->text = $text;
	}
	
	public function should_render() : bool
	{
		return !empty($this->text);
	}
	
	protected function generate_output() : string
	{
		return Sanitize::text($this->text);
	}
	
}