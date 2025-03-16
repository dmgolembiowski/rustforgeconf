<?php

namespace rfc\ws\ui\component\shared;

use rfc\ws\ui\component\behaviour\Render;

class Css_Classes implements Render
{
	private array $classes = [];
	
	
	public function __construct( array $classes )
	{
		$this->classes = array_map(
			[ $this, 'sanitize_class' ],
			array_filter( $classes, function ( $c ) {
				return ! empty( $c );
			} )
		);
	}
	
	
	private function sanitize_class( string $class ) : string
	{
		return htmlspecialchars( $class );
	}
	
	
	public function should_render() : bool
	{
		return ! empty( $this->classes );
	}
	
	
	public function to_array() : array
	{
		return $this->classes;
	}
	
	
	public function render( bool $echo = false ) : string
	{
		$html = $this->should_render()
			? $this->generate_output()
			: '';
		
		if ( $echo ) {
			echo $html;
		}
		
		return $html;
	}
	
	
	public function generate_output() : string
	{
		return sprintf(
			'class="%s"',
			implode( ' ', $this->classes )
		);
	}
	
}