<?php

namespace rfc\ws\ui\component\primitive;

use rfc\ws\ui\component\behaviour;
use rfc\ws\ui\component\impl;
use rfc\ws\Plugin;

class Asset
	implements behaviour\Render
{
	
	use impl\Render;

    protected string $id = "";
    protected string $type;
	protected string $name;
	protected string $extension;
	
	
	public function __construct( string $type, string $name, string $extension )
	{
		$this->type      = self::sanitize( $type );
		$this->name      = self::sanitize( $name );
		$this->extension = self::sanitize( $extension );
	}

    public function id(string $id) : self {
        $this->id = self::sanitize( $id );
        return $this;
    }

	public static function sanitize( string $str ) : string
	{
		return preg_replace( '[^a-z0-9-_]', '', strtolower( $str ) );
	}
	
	
	private function has_valid_type( ) : bool
	{
		return in_array( $this->type, [ 'brand', 'icon' ] );
	}
	
	
	private function has_valid_name( ) : bool
	{
		return ! empty( $this->name );
	}
	
	
	private function has_valid_extension() : bool
	{
		return in_array( $this->extension, [ 'svg', 'jpg' ] );
	}
	
	private function filename() : string {
		return $this->name . '.' . $this->extension;
	}
	private function get_asset_file_path() : string
	{
		
		return implode(
			'/',
			[
				Plugin::src_path(),
				'assets',
				$this->type,
				$this->filename()
			] );
	}
	
	
	private function asset_exists() : bool
	{
		
		return $this->has_valid_type() &&
		       $this->has_valid_name() &&
		       $this->has_valid_extension() &&
		       file_exists( $this->get_asset_file_path() );
	}
	
	
	public function should_render() : bool
	{
		return $this->asset_exists();
	}
	

    private function inject_id(string $output) : string {
        return str_replace('id=""', 'id="'.$this->id.'"',  $output);
    }

	protected function generate_output() : string
	{
		return $this->inject_id(
            file_get_contents( $this->get_asset_file_path() )
        );
	}
	
}