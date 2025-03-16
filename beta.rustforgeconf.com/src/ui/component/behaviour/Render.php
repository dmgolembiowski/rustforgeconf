<?php

namespace rfc\ws\ui\component\behaviour;

interface Render
{
	public function should_render() : bool;
	
	
	public function render( bool $echo ) : string;
}

