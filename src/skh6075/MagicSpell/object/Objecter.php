<?php


namespace skh6075\MagicSpell\object;


abstract class Objecter{

    /** @var string */
    protected $name;
    
    
    public function __construct (string $name) {
        $this->name = $name;
    }
    
    public function getName (): string{
        return $this->name;
    }
    
}