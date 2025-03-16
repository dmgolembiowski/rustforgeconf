<?php


namespace rfc\ws\ui\component;


use rfc\ws\ui\component\generic;
use rfc\ws\ui\component\primitive;
use rfc\ws\ui\component\complex;

// It is expected that people will pop
// use \rfc\ws\ui\component\Api as ui;
// in the top of their template to make the api
// namespacing more declarative.

// add support for ui conditions
class Api
{
	
	/**
	 * Layout - Larger Components
	 */
	
	public static function site_row( string $id = "" ) : generic\Container
	{
		return ( new generic\Container( $id ) )->name( 'site-row' );
	}
	
	
	public static function site_column( string $id = "" ) : generic\Container
	{
		return ( new generic\Container( $id ) )->name( 'site-column' );
	}
	
	
	public static function site_column_main( string $id = "" ) : generic\Container
	{
		return ( new generic\Container( $id ) )->name( 'site-column-main' );
	}
	
	
	public static function site_column_sidebar( string $id = '' ) : generic\Container
	{
		return ( new generic\Container( $id ) )->name( 'site-column-sidebar' );
	}
	
	
	/**
	 * Layout - Smaller Components
	 */
	public static function group() : primitive\Group
	{
		return ( new primitive\Group() );
	}

    public static function section( string $id = '' ) : generic\Container
    {
        return ( new generic\Container( $id ) )->tag('section')->name( 'section' );
    }

	public static function area( string $id = '' ) : generic\Container
	{
		return ( new generic\Container( $id ) )->name( 'area' );
	}
	
	
	public static function header( string $id = '' ) : generic\Container
	{
		return ( new generic\Container( $id ) )->name( 'header' );
	}
	
	
	public static function body( string $id = '' ) : generic\Container
	{
		return ( new generic\Container( $id ) )->name( 'body' );
	}
	
	
	/**
	 * Special Case
	 */
	public static function always_empty() : primitive\Always_Empty
	{
		return ( new primitive\Always_Empty() );
	}
	
	
	public static function always_render() : primitive\Always_Render
	{
		return ( new primitive\Always_Render() );
	}
	
	
	/**
	 * Informative
	 */
	
	public static function heading( string $id = '', int $level = 2 ) : generic\Container
	{
		return ( new generic\Container( $id ) )
			->tag( 'h' . $level )
			->name( 'heading' );
	}
	
	
	public static function paragraph( string $id = '' ) : generic\Container
	{
		return ( new generic\Container( $id ) )
			->tag( 'p' )
			->name( 'paragraph' );
	}

    public static function paragraphs( array $strings = [], bool $has_html = false): primitive\Group
    {
        return self::group()->has(
            self::for_each(
                $strings,
                fn(string $s) => self::paragraph()->has( $has_html ? self::html( $s) : self::text($s))
            )
        );
    }
	
	
	public static function text( string $text ) : primitive\Text
	{
		return new primitive\Text( $text );
	}

    public static function list_items(
        string $id,
        array $items,
        callable $item_ui_cb,
        bool $ordered = false,
    ) {
        return ( new generic\Container( $id ) )
            ->tag( $ordered? 'ol' : 'ul' )
            ->name( 'list' )
            ->has(
                self::for_each(
                    $items,
                    fn(mixed $item) => self::list_item()->has( $item_ui_cb($item))
                )
            );
    }
	
	public static function list( string $id = '' ) : generic\Container
	{
		return ( new generic\Container( $id ) )
			->tag( 'ul' )
			->name( 'list' );
	}
	
	
	public static function list_item( string $id = '' ) : generic\Container
	{
		return ( new generic\Container( $id ) )
			->tag( 'li' )
			->name( 'list-item' );
	}
	
	
	/**
	 * Generic
	 */
	public static function container( string $id = '' ) : generic\Container
	{
		return ( new generic\Container( $id ) )
			->name( 'container' );
	}
    public static function icontainer( string $id = '' ) : generic\Container
    {
        return ( new generic\Container( $id ) )
            ->name( 'container' )
            ->tag('span');
    }
	
	
	public static function html( string $html ) : primitive\Html
	{
		return new primitive\Html( $html );
	}
	
	
	/**
	 * Graphical
	 */
	public static function image( string $id = '' ) : generic\Image
	{
		return new generic\Image( $id );
	}


	
	public static function asset( string $type, string $name, $extension ) : primitive\Asset
	{
		return new primitive\Asset( $type, $name, $extension );
	}
	
	
	/**
	 * Interactive
	 */
	
	public static function icon_button( string $id = '' ) : complex\Icon_Button
	{
		return ( new complex\Icon_Button( $id ) )->name( 'button' );
	}
	
	
	public static function button( string $id = '' ) : generic\Button
	{
		return ( new generic\Button( $id ) )->name( 'button' );
	}
	
	
	public static function link( string $id = '' ) : primitive\Link
	{
		return ( new primitive\Link( $id ) )->name( 'link' );
	}
	
	
	/**
	 * Iteration and control flow
	 */
	
	// This is named predicate to match with self::if()'s argument
	// and to disambiguate from primative\Cond
	public static function predicate( bool $true_or_false ) : callable
	{
		return function () use ( $true_or_false ) {
			return $true_or_false;
		};
	}
	
	public static function if( callable $predicate_cb ) : primitive\Cond
	{
		return new primitive\Cond( $predicate_cb );
	}

    public static function wrap() : primitive\Wrap
    {
        return new primitive\Wrap();
    }
	
	
	public static function for_each(
		array $data,
		callable $process
	) : primitive\Group {
		return ( new primitive\Group() )->has(
			...array_map( $process, $data )
		);
	}
	
	// Accepts a combination of booleans or callables to see if they're true
	// If the predicates pass a group container will be provided so that
	// children can be appended to it for the ui render graph
	// Failure yields a group that ignores the appending of children, effectively
	// cutting off the rest of the branch in the ui render graph.
	public static function guard( ...$predicates_or_bools ) : shared\Component
	{
		$cast_to_callables = function ( $maybe_callable ) {
			if ( is_bool( $maybe_callable ) ) {
				return function () use ( $maybe_callable ) {
					return $maybe_callable;
				};
			}
			
			if ( is_callable( $maybe_callable ) ) {
				return $maybe_callable;
			}
			
			return function () {
				return true;
			};
			
		};
		
		$predicates = array_map( $cast_to_callables, $predicates_or_bools );
		
		$reduce_to_first_failure = function ( bool $is_ok, callable $predicate ) : bool {
			return ! ( $is_ok === false || call_user_func( $predicate ) === false );
		};
		
		$ok = array_reduce(
			$predicates,
			$reduce_to_first_failure,
			true
		);
		
		return $ok
			? ( new primitive\Group() )
			: ( new primitive\Always_Empty() );
		
	}
	
}