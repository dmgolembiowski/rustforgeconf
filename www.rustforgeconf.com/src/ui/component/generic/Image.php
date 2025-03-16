<?php

namespace rfc\ws\ui\component\generic;

use rfc\ws\ui\component\shared\Component as Base;
use rfc\ws\ui\component\utility\Sanitize;

class Image extends Base
{
	
	protected string $url    = "";
	protected string $srcset = "";
	protected string $alt    = "";
	
	
	public function __construct( string $id = "" )
	{
		parent::__construct( $id );
		$this->name( "image" );
		$this->tag( 'img' );
	}
	
	
	public function alt( string $alt = '' ) : self
	{
		$this->alt = $alt;
		
		return $this;
	}
	
	
	public function src( string $url = '' ) : self
	{
		$this->url = $url;
		
		return $this;
	}
	
	public function srcset( string $srcset = '' ) : self
	{
		$this->srcset = $srcset;
		
		return $this;
	}
	
	
	public function should_render() : bool
	{
		
		return ! empty( $this->url );
	}
	
	
	protected function generate_alt( string $alt = '' ) : string
	{
		if ( empty( $alt ) ) {
			return '';
		}
		
		return sprintf( 'alt="%s"', Sanitize::text( $alt ) );
	}
	
	
	protected function generate_src( string $url = '' ) : string
	{
		if ( empty( $url ) ) {
			return '';
		}
		
		return sprintf( 'src="%s"', Sanitize::url( $url ) );
	}
	
	protected function generate_src_set( string $src_set = '' ) : string
	{
		if ( empty( $src_set ) ) {
			return '';
		}
		
		return sprintf( 'srcset="%s"', Sanitize::attr($src_set ));
	}
	
	
	protected function generate_output() : string
	{
		return sprintf( '
			<%s %s %s %s %s %s %s loading="lazy" />',
			$this->tag->render( false ),
			$this->id->render( false ),
			$this->classes->render( false ),
			$this->name->render( false ),
			$this->generate_src_set( $this->srcset),
			$this->generate_alt( $this->alt ),
			$this->generate_src( $this->url ),
		);
	}
}