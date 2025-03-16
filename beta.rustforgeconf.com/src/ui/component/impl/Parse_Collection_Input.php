<?php

namespace rfc\ws\ui\component\impl;

use rfc\ws\ui\component\shared\Collection;

trait Parse_Collection_Input
{
	protected function parse_collection_input( $collection_obj_or_array = [] ) : Collection
	{
		if ( $collection_obj_or_array instanceof Collection ) {
			return $collection_obj_or_array;
		}
		
		if ( is_array( $collection_obj_or_array ) ) {
			return new Collection($collection_obj_or_array );
		}
		
		return new Collection();
	}
}