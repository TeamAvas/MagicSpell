<?php


namespace skh6075\MagicSpell\entity;


class SnowballSpellEntity extends SpellEntity{

    public const NETWORK_ID = self::ARROW;

    public $width = 0.25;

    public $height = 0.25;
    
    
    public function getName (): string{
        return "SnowballSpellEntity";
    }
}