<?php

namespace rfc\ws\ui\component\shared;

use rfc\ws\ui\component\behaviour\Render;

class Tag implements Render
{
	private string $tag = 'div';
	
	const ALLOWED_TAGS
		= [
			"a",
			"abbr",
			"acronym",
			"abbr",
			"address",
			"applet",
			"embed",
			"object",
			"area",
			"article",
			"aside",
			"audio",
			"b",
			"base",
			"basefont",
			"bdi",
			"bdo",
			"big",
			"blockquote",
			"body",
			"br",
			"button",
			"canvas",
			"caption",
			"center",
			"cite",
			"code",
			"col",
			"colgroup",
			"data",
			"datalist",
			"dd",
			"del",
			"details",
			"dfn",
			"dialog",
			"dir",
			"ul",
			"div",
			"dl",
			"dt",
			"em",
			"embed",
			"fieldset",
			"figcaption",
			"figure",
			"font",
			"footer",
			"form",
			"frame",
			"frameset",
			"h1",
			"h2",
			"h3",
			"h4",
			"h5",
			"h6",
			"head",
			"header",
			"hr",
			"html",
			"i",
			"iframe",
			"img",
			"input",
			"ins",
			"kbd",
			"label",
			"legend",
			"li",
			"link",
			"main",
			"map",
			"mark",
			"meta",
			"meter",
			"nav",
			"noframes",
			"noscript",
			"object",
			"ol",
			"optgroup",
			"option",
			"output",
			"p",
			"param",
			"picture",
			"pre",
			"progress",
			"q",
			"rp",
			"rt",
			"ruby",
			"s",
			"samp",
			"script",
			"section",
			"select",
			"small",
			"source",
			"span",
			"strike",
			"del",
			"s",
			"strong",
			"style",
			"sub",
			"summary",
			"sup",
			"svg",
			"table",
			"tbody",
			"td",
			"template",
			"textarea",
			"tfoot",
			"th",
			"thead",
			"time",
			"title",
			"tr",
			"track",
			"tt",
			"u",
			"ul",
			"var",
			"video",
			"wbr",
            // web components
            "model-viewer"
		];
	
	
	public function __construct( string $tag )
	{
		$this->tag = in_array( $tag, self::ALLOWED_TAGS ) ? $tag : 'div';
	}
	
	
	public function should_render() : bool
	{
		return true;
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
		return $this->html_tag();
	}
	
	
	public function html_tag() : string
	{
		return $this->tag;
	}
	
}