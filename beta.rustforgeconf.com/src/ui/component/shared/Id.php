<?php

namespace rfc\ws\ui\component\shared;

use rfc\ws\ui\component\behaviour\Render;

class Id implements Render
{
	private string $id;
	
	
	public function __construct( string $id )
	{
		$this->id = $id;
	}
	
	
	public function should_render() : bool
	{
		return ! empty( $this->id );
	}
	
	public function val(): string {
		return $this->id;
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
		return sprintf( 'id="%s"', $this->html_attr() );
	}
	
	public function html_attr() : string
	{
		return htmlspecialchars( $this->id );
	}
	
}