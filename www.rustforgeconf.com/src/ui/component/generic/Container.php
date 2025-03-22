<?php

namespace rfc\ws\ui\component\generic;

use rfc\ws\ui\component\shared\Component as Base;

class Container extends Base
{
	
	public function __construct( string $id = "" )
	{
		parent::__construct($id);
		$this->name("container");
	}
	
}
