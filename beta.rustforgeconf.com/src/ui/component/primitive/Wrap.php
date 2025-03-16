<?php

namespace rfc\ws\ui\component\primitive;

use rfc\ws\ui\component\behaviour\Hierarchical;
use rfc\ws\ui\component\behaviour\Render;
use rfc\ws\ui\component\shared\Component as Base;
use rfc\ws\ui\component\impl;

class Wrap extends Base
{
    private Hierarchical&Render $wrapper;


    public function __construct()
    {
        parent::__construct();
        $this->wrapper = new Always_Empty();
    }

    public function with(Hierarchical&Render $wrapper): self
    {
        $this->wrapper = $wrapper;
        return $this;
    }

    protected function generate_output(): string
    {
        if ( $this->wrapper->should_render()) {
            $this->wrapper->has( $this->components );
            return $this->wrapper->render(false);
        }

        return $this->components->render(false);
    }

}