<?php


namespace skh6075\MagicSpell\entity;


class ArrowSpellEntity extends SpellEntity{

    public const NETWORK_ID = self::ARROW;

    public $width = 0.25;

    public $height = 0.25;
    
    
    public function getName (): string{
        return "ArrowSpellEntity";
    }
}