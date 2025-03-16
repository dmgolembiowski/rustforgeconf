<?php

namespace rfc\ws\ui\component\shared;

use rfc\ws\ui\component\behaviour;
use rfc\ws\ui\component\behaviour\Render; // For convenience
use rfc\ws\ui\component\impl;

/**
 * A collection of components that can be rendered
 */
class Collection
	implements behaviour\Render
{
	use impl\Render;
	
	private     $components = [];
	private int $index;
	
	
	public function __construct( $components = [] )
	{
		$this->components = array_filter(
			$components,
			function ( $component ) {
				return $component instanceof Render;
			} );
	}
	
	
	public function is_empty() : bool
	{
		return empty( $this->components );
	}
	
	
	public function add( Render $component ) : Collection
	{
		$this->components[] = $component;
		
		return $this;
	}
	
	
	public function current() : ?Render
	{
		return $this->components[ $this->index ] ?? null;
	}
	
	
	public function next()
	{
		$this->index = $this->key()+1;
	}
	
	
	public function key() : int
	{
		return $this->index;
	}
	
	
	public function valid() : bool
	{
		return $this->current() instanceof Render;
	}
	
	
	public function rewind()
	{
		$this->index = 0;
	}
	
	
	public function first() : ?Render
	{
		return $this->components[0] ?? null;
	}
	
	
	public function should_render() : bool
	{
		if ( empty( $this->components ) ) {
			return false;
		}
		foreach( $this->components as $c ) {
			if ( $c->should_render() ) {
				return true;
			}
		}
		return false;
	}
	
	
	protected function generate_output() : string
	{
		return array_reduce(
			$this->components,
			function ( $html, Render $component ) {
				$html .= $component->render( false );
				
				return $html;
			},
			""
		);
		
	}
	
}

