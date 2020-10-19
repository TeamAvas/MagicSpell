<?php


namespace skh6075\MagicSpell\entity;

use pocketmine\entity\Entity;

class SpellEntityFactory{

    /** @var SpellEntityFactory */
    private static $instance;
    
    
    public static function getInstance (): SpellEntityFactory{
        if (self::$instance === null) {
            self::$instance = new self ();
        }
        return self::$instance;
    }
    
    private function __construct () {
    }
    
    public function init (): void{
        Entity::registerEntity (ArrowSpellEntity::class, true, ["ArrowSpellEntity"]);
        Entity::registerEntity (SnowballSpellEntity::class, true, ["SnowballSpellEntity"]);
        Entity::registerEntity (TridentSpellEntity::class, true, ["TridentSpellEntity"]);
    }
}
