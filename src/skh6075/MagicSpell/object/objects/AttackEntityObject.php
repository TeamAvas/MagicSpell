<?php


namespace skh6075\MagicSpell\object\objects;

use pocketmine\Player;
use pocketmine\entity\Entity;

use skh6075\MagicSpell\object\ObjectFactory;
use skh6075\MagicSpell\object\Objecter;

class AttackEntityObject extends Objecter{

    /** @var Entity[] */
    private static $entities = [];
    
    
    public function __construct () {
        parent::__construct ("AttackEntity");
    }
    
    /**
     * @param Player $player
     * @param Entity|null $entity
     */
    public static function setPlayerToEntity (Player $player, ?Entity $entity = null): void{
        self::$entities [$player->getName ()] = $entity;
    }
    
    /**
     * @param mixed $player
     * @return Entity|null
     */
    public static function getEntityByPlayer ($player): ?Entity{
        return self::$entities [ObjectFactory::convertName ($player)] ?? null;
    }
}