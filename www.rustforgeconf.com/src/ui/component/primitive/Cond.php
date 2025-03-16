<?php

namespace rfc\ws\ui\component\primitive;

use rfc\ws\ui\component\behaviour;
use rfc\ws\ui\component\shared\Component as Base;
use rfc\ws\ui\component\impl;

class Cond extends Base {
	
	private $predicate;
	
	
	public function __construct( callable $predicate )
	{
		parent::__construct();
		$this->predicate = $predicate;
	}
	
	
	public function should_render() : bool
	{
		return (bool) call_user_func( $this->predicate );
	}
	
	
	protected function generate_output() : string
	{
		return $this->components->render( false );
	}
	
}