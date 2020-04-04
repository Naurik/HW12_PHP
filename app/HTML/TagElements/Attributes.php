<?php

namespace TagElement;


class Attributes
{
    private $attributes = [];

    public function __construct(array $attributes)
    {
        $this
            ->clear()
            ->setAttribute($attributes);
    }

    public function setAttribute($key, $value = null)
    {
        if (is_array($key)) {
            foreach ($key as $k => $v)
                $this->setAttribute($k, $v);
        } else
            $this->attributes[$key] = $value;

        return $this;
    }

    public function getAttribute($key, $default = null)
    {
        return $this->attributes[$key] ?? $default;
    }

    public function appendAttribute($key, $value)
    {
        return $this->setAttribute($key, $this->getAttribute($key) . $value);
    }

    public function prependAttribute($key, $value)
    {
        return $this->setAttribute($key, $value . $this->getAttribute($key));
    }

    public function clear()
    {
        $this->attributes = [];
        return $this;
    }

    public function __toString(): string{
        $keys = array_keys($this->attributes);

        $str = "";

        foreach($keys as $key){
            $value = $this->getAttribute($key);
            $str .= " $key";

            if($value === null){
                $str .= "=\"$value\"";
            }
        }

        return $str;
    }
}