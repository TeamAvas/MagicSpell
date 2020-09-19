<?php


namespace skh6075\MagicSpell\entity;

use pocketmine\entity\Entity;

class SpellEntityFactory{

    
    public static function init (): void{
        Entity::registerEntity (ArrowSpellEntity::class, true, ["ArrowSpellEntity"]);
        Entity::registerEntity (SnowballSpellEntity::class, true, ["SnowballSpellEntity"]);
        Entity::registerEntity (TridentSpellEntity::class, true, ["TridentSpellEntity"]);
    }
}