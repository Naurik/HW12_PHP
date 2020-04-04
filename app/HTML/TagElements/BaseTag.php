<?php

namespace TagElement;


abstract class BaseTag
{
    private $name;
    private $attributes;
    private $isSelfClosing;
    private $body;

    private const SELF_CLOSED = ['area', 'base', 'br', 'col', 'embed', 'hr', 'img', 'input', 'link', 'meta', 'param', 'source', 'track', 'wbr', 'command', 'keygen', 'menuitem'];

    function __construct(string $name, array $attributes = [])
    {
        $this->body = new Body();
        $this->name = $name;
        $this->attributes = new Attributes($attributes);

        if(in_array($name, self::SELF_CLOSED)){
            $this->selfClosing();
        }
    }

    public function setAttribute($key, $default = null){
        return $this->attributes->setAttribute($key, $default);
    }

    public function appendAttributes($key, $value){
        return $this->attributes->setAttribute($key, $this->attributes->getAttribute($key) . $value);
    }

    protected function selfClosing()
    {
        $this->isSelfClosing = true;
    }

    public function prependBody($body)
    {
        $this->body->prependBody($body);

        return $this;
    }

    public function appendBody($body)
    {
        $this->body->appendBody($body);

        return $this;
    }

    public function __toString() : string
    {
        $result = "<$this->name ";

        $result .= $this->attributes;

        $result .=  $this->isSelfClosing ? " />" : ">$this->body</$this->name>";

        return $result;
    }

    public function appendTo(BaseTag $tag){
        $tag->appendBody($this);
        return $this;
    }

    public function prependTo(BaseTag $tag){
        $tag->prependBody($this);
        return $this;
    }
}