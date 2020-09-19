<?php


namespace skh6075\MagicSpell\entity;


class TridentSpellEntity extends SpellEntity{

    public const NETWORK_ID = self::TRIDENT;

    public $width = 0.25;

    public $height = 0.25;
    
    
    public function getName (): string{
        return "TridentSpellEntity";
    }
}