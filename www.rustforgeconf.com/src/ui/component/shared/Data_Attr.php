<?php

namespace rfc\ws\ui\component\shared;

use rfc\ws\ui\component\behaviour\Render;

class Data_Attr implements Render
{
	private string $attr  = '';
	private string $value = '';
	
	
	public function __construct( string $attr, string $value )
	{
		$this->attr  = $attr;
		$this->value = $value;
	}
	
	public function property() : string {
		return $this->attr;
	}
	
	public function value() : string {
		return $this->value;
	}
	
	public function should_render() : bool
	{
		return ! empty( $this->attr );
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
			'data-%s="%s"',
			$this->html_attr(),
			$this->html_val()
		);
	}
	
	
	public function html_attr() : string
	{
		return htmlspecialchars( $this->attr );
	}
	
	
	public function html_val() : string
	{
		return htmlspecialchars( $this->value );
	}
	
}