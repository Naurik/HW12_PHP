<?php

namespace Step;
/**
 * Class Tag
 * @method static Tag a(array $attributes = [])
 * @method static Tag p(array $attributes = [])
 * @method static Tag body(array $attributes = [])
 * @method static Tag input(array $attributes = [])
 * @method static Tag div(array $attributes = [])
 * @method static Tag td(array $attributes = [])
 * @method static Tag ul(array $attributes = [])
 * @method static Tag li(array $attributes = [])
 * @method static Tag h1(array $attributes = [])
 * @method static Tag h2(array $attributes = [])
 * @method static Tag h3(array $attributes = [])
 * @method static Tag h4(array $attributes = [])
 * @method static Tag h5(array $attributes = [])
 * @method static Tag h6(array $attributes = [])
 * @method static Tag area(array $attributes = [])
 * @method static Tag meta(array $attributes = [])
 * @method static Tag head(array $attributes = [])
 * @method static Tag html(array $attributes = [])
 * @method static Tag button(array $attributes = [])
 * @method static Tag b(array $attributes = [])
 * @method static Tag footer(array $attributes = [])
 * @method static Tag form(array $attributes = [])
 * @method static Tag img(array $attributes = [])
 * @method static Tag iframe(array $attributes = [])
 * @method static Tag textarea(array $attributes = [])
 * @method static Tag video(array $attributes = [])
 * @method static Tag table(array $attributes = [])
 * @method static Tag tbody(array $attributes = [])
 * @method static Tag title(array $attributes = [])
 * @method static Tag time(array $attributes = [])
 * @method static Tag menu(array $attributes = [])
 * @method static Tag noscript(array $attributes = [])
 * @method static Tag svg(array $attributes = [])
 * @method static Tag map(array $attributes = [])
 * @method static Tag main(array $attributes = [])
 * @method static Tag link(array $attributes = [])
 * @method static Tag label(array $attributes = [])
 * @method static Tag canvas(array $attributes = [])
 * @method static Tag audio(array $attributes = [])
 * @method static Tag article(array $attributes = [])
 * @method static Tag br(array $attributes = [])
 */

use TagElement\BaseTag;

class Tag extends BaseTag
{
    public static function  make($name, array $attributes = [])
    {
        return new self($name, $attributes);
    }

    public static function __callStatic($name, $arguments)
    {
        array_unshift($arguments, $name);
        return call_user_func_array([Tag::class, 'make'], $arguments);
    }
}