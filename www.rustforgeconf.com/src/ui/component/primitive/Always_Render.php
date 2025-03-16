<?php

namespace rfc\ws\ui\component\primitive;

use rfc\ws\ui\component\behaviour;
use rfc\ws\ui\component\impl;
use rfc\ws\ui\component\shared\Component as Base;

class Always_Render extends Base
{
	
	public function __construct()
	{
		parent::__construct();
	}
	
	
	public function should_render() : bool
	{
		return true;
	}
	
	
	protected function generate_output() : string
	{
		return '';
	}
	
}