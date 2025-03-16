<?php

namespace rfc\ws\ui\component\impl;

use rfc\ws\ui\component\Config;
use rfc\ws\ui\component\behaviour\Render;
use rfc\ws\ui\component\utility\Sanitize;
trait Generate_Output_Nested
{
	protected string $name;
	protected string $id;
	protected Render $component;
	
	public function should_render() : bool
	{
		return $this->component->should_render();
	}
	
	private function generate_output() : string
	{
		$tag = Config::namespace() . Sanitize::attr($this->name);
		return sprintf( '
			<%s id="%s">
				%s
			</%s>
			',
			$tag,
            Sanitize::attr($this->id),
			$this->component->generate_output(),
			$tag
		);
	}
	
}