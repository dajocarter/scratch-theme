# Tweek Theme for WordPress + ACF

## SCSS Mixins

### [Bourbon](https://bourbon.io) Mixins
******************

#### Font Face
Generates an `@font-face` declaration. Accepts arguments for weight, style, and file formats

##### Usage
`@include font-face($font-family, $file-path, $font-weight: normal, $font-style: normal, $file-formats: eot woff2 woff ttf svg);`

##### Examples
`@include font-face("source-sans-pro", "/fonts/source-sans-pro/source-sans-pro-regular");`
`@include font-face("source-sans-pro", "/fonts/source-sans-pro/source-sans-pro-bold", bold);`
`@include font-face("source-sans-pro", "/fonts/source-sans-pro/source-sans-pro-italic", normal, italic);`
`@include font-face("source-sans-pro", "/fonts/source-sans-pro/source-sans-pro-regular", $file-formats: eot woff2 woff);`

#### Size
Set `width` and `height` in a single statement. Accepts all units, including `auto` and `inherit`, unitless numbers, and [intrinsic keywords](https://drafts.csswg.org/css-sizing/#width-height-keywords) like `fill`, `max-content`, and `fit-content`. You can also use this mixin with the `calc()` CSS function.

##### Usage
`@include size($width, $height);`
Note: If there is only a single value in `@include size()` it is used for both width and height.

##### Examples
`@include size(2em); // width: 2em; height: 2em;`
`@include size(10em auto); // width: 10em; height: auto;`
`@include size(min-content 9rem); // width: min-content; height: 9rem;`
`@include size(20px calc(100% - 80px)); // width: 20px; height: calc(100% - 80px);`

#### Clearfix
Provides an easy way to include a clearfix for containing floats. We use this [modern clearfix](http://cssmojo.com/latest_new_clearfix_so_far/) from cssmojo.

##### Usage
`@include clearfix;`

##### Examples

```
.wrapper {
  @include clearfix;
}
```

#### Triangle
Creates a visual triangle. Mixin takes arguments of `($size, $color, $direction)`. The `$size` argument can take one or two values —- `width height`. The `$color` argument can take one or two values -— `foreground-color background-color`. The `$direction` argument can take one value -- `up, down, left, right, up-right, up-left, down-right, down-left`.

##### Usage
`@include triangle($size, $color, $direction);`

##### Examples
`@include triangle(12px, gray, down);`
`@include triangle(12px 6px, gray lavender, up-left);`

#### Button Variables
Generates variables to assign styles for all HTML button elements.

##### Usage
The variable `#{$all-buttons}` corresponds to

```
button,
input[type="button"],
input[type="reset"],
input[type="submit"]
```

Override this list by setting the `$buttons-list` variable. For example, `$buttons-list: "buttons", 'input[type="button"]';`.

Optionally add a pseudo-class to the list like so `#{$all-buttons-hover}` to get

```
button:hover,
input[type="button"]:hover,
input[type="reset"]:hover,
input[type="submit"]:hover
```

Accepted pseudo-classes are `focus`, `active`, and `hover`.

##### Examples

```
#{$all-buttons} {
  background-color: #f00;
}

#{$all-buttons-focus},
#{$all-buttons-hover} {
  background-color: #0f0;
}

#{$all-buttons-active} {
  background-color: #00f;
}
```

#### Input Variables
Generates variables to assign styles for all HTML text-based input elements.

##### Usage
The variable `#{$all-inputs}` corresponds to

```
input[type="color"],
input[type="date"],
input[type="datetime"],
input[type="datetime-local"],
input[type="email"],
input[type="month"],
input[type="number"],
input[type="password"],
input[type="search"],
input[type="tel"],
input[type="text"],
input[type="time"],
input[type="url"],
input[type="week"],
input:not([type]),
textarea
```

Override this list by setting the `$text-inputs-list` variable. For example, `$text-inputs-list: 'input[type="text"]', 'input[type="email"]';`.

Similar to the buttons variables, optionally add a pseudo-class to the list like so `#{$all-inputs-hover}`. Accepted pseudo-classes are `focus`, `active`, and `hover`.

##### Examples

```
#{$all-text-inputs} {
  border: 1px solid #f00;
}

#{$all-text-inputs-focus},
#{$all-text-inputs-hover} {
  border: 1px solid #0f0;
}

#{$all-text-inputs-active} {
  border: 1px solid #00f;
}
```