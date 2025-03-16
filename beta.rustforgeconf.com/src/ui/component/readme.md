UI Components
-------------

> The `ui component API` should be used to expose the creation of components from this library 
> through static methods. That way the ui library can be brought into scope and used as follows: 
> ```php
> use \twwg\frontend\ui\component\Api as ui;
> 
> ui::heading()
>   ->classes( 'my-heading' )
>   ->has(
>       ui::text( "Free Courses/Membership" )
>   );
> ```

## General Approach

### Base Class
Components use the builder pattern to scaffold out HTML. Components are build on the foundation 
a shared component `twwg\frontend\ui\component\shared\Component` which has some core components:

- **Tag:** The web component tag type to use (div, a, p, etc)
- **Name:** A data-attribute name you can assign to give components types (in a loose sense)
- **Id:** Corresponds to the id attribute of an html element
- **Css_Classes:** A typed collection of string class names for a component
- **Components:** Children of a given component

### Creating Components
New components are created  

Components are created by authoring a new class which implements `interface\Render`. This forces 
you to write implementations for if a ui component should render and what its rendered output 
looks like. 



## Component Types 

### Primitive
A set of base ui components that generic, complex, and domain components 
build on.


### Generic
Generic components are of specific types

### Complex


### Domain
Components that rely on domain models or complex typed data.