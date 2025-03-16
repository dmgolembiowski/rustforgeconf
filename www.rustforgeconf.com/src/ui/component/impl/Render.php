<?php

namespace rfc\ws\ui\component\impl;

trait Render
{
	
	abstract public function should_render() : bool;
	
	abstract protected function generate_output() : string;
	
	public final function render( $echo = true ) : string
	{
		$output = $this->should_render()
			? $this->generate_output()
			: '';
		
		// No output, no dice
		if ( empty( $output ) ) {
			return '';
		}
		
		if ( $echo ) {
			echo $output;
		}
		
		return $output;
	}
}