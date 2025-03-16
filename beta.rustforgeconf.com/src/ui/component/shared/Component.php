<?php

namespace rfc\ws\ui\component\shared;

use rfc\ws\ui\component\behaviour;
use rfc\ws\ui\component\impl;
use rfc\ws\ui\component\Config;
use rfc\ws\ui\component\shared;
use rfc\ws\ui\component\utility\Sanitize;

class Component
    implements behaviour\Hierarchical, behaviour\Render
{
    use impl\Parse_Collection_Input;
    use impl\Render;

    protected Tag $tag;
    protected array $attributes;
    protected Data_Attr $name;
    protected Id $id;
    protected Css_Classes $classes;
    protected Collection $components;


    public function __construct(string $id = "")
    {

        $this->id($id);
        $this->attributes = [];
        $this->tag('div');
        $this->name('');
        $this->classes([]);
        $this->components([]);
    }


    public function tag(string $tag = 'div'): self
    {
        $this->tag = new shared\Tag($tag);

        return $this;
    }

    public function attr(string $name, string $val): self
    {
        $this->attributes[Sanitize::attr($name)] = new shared\Data_Attr($name, $val);
        return $this;
    }

    public function name(string $name = ""): self
    {
        $name = !empty($name)
            ? Config::namespace() . $name
            : '';
        $this->name = new shared\Data_Attr('name', $name);

        return $this;
    }


    public function id(string $id = ""): self
    {
        $this->id = new shared\Id($id);

        return $this;
    }


    public function classes(...$classes): self
    {
        $classes[] = $this->id->val();
        $this->classes = new shared\Css_Classes($classes);
        return $this;
    }


    public function components(...$components): self
    {
        $this->components = $this->Parse_Collection_Input($components);

        return $this;
    }

    // Components alias
    public function has(...$components): self
    {
        return $this->components(...$components);
    }


    public function should_render(): bool
    {
        return $this->components->should_render();
    }


    protected function generate_output(): string
    {
        return sprintf('
			<%s %s %s %s >
				%s
			</%s>',
            $this->tag->render(false),
            $this->id->render(false),
            $this->classes->render(false),
            $this->render_attributes(),
//			$this->name->render( false ),
            $this->components->render(false),
            $this->tag->render(false)
        );
    }

    protected function render_attributes(): string
    {
        return implode(
            ' ',
            array_map(
                function (Data_Attr $attr) {
                    return $attr->render(false);
                },
                $this->attributes
            )
        );
    }
}
