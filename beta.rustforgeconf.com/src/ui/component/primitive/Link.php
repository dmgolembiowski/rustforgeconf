<?php

namespace rfc\ws\ui\component\primitive;

use rfc\ws\ui\component\shared\Component as Base;

class Link extends Base
{
	protected string $url = "";
	protected bool $download = false;

	public function __construct( string $id = "" )
	{
		parent::__construct( $id );
		$this->name( "button" );
		$this->tag( 'a' );
	}
	
	public function url( string $url = '' ) : self
	{
		$this->url = $url;
		return $this;
	}

    public function download( bool $enabled = true) : self
    {
        $this->download = $enabled;
        return $this;
    }
	
	public function go_to( string $url = '') : self {
		$this->url( $url);
		return $this;
	}
	
	public function should_render() : bool
	{
		return ! empty( $this->components );
	}
	
	protected function generate_href( string $url = '' ) : string {
		if ( empty( $url ) ) {
			return '';
		}
		return sprintf( ' href="%s" ', esc_url($url));
	}

    protected function generate_download() : string {
        return $this->download ? ' download ' : '';
    }

	protected function generate_output() : string
	{
		
		return sprintf( '
			<%s %s %s %s %s %s>
				%s
			</%s>',
			$this->tag->render( false ),
			$this->id->render( false ),
			$this->classes->render( false ),
			$this->render_attributes(),
//			$this->name->render( false ),
			$this->generate_href( $this->url  ),
            $this->generate_download( $this->url  ),
			$this->components->render( false ),
			$this->tag->render( false )
		);
	}
	
}