<?php

namespace rfc\ws\ui\component\shared;

use rfc\ws\ui\component\behaviour;
use rfc\ws\ui\component\impl;

class Null_Component
	implements behaviour\Render
{
	use impl\Render;
	
	public function should_render() : bool
	{
		return false;
	}
	
	
	protected function generate_output() : string
	{
		return '';
	}
	
}
