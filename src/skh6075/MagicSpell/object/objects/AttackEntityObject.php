<?php


namespace skh6075\MagicSpell\object\objects;

use pocketmine\Player;
use pocketmine\entity\Entity;

use skh6075\MagicSpell\object\ObjectFactory;
use skh6075\MagicSpell\object\Objecter;

class AttackEntityObject extends Objecter{

    /** @var Entity[] */
    private $entities = [];
    
    
    public function __construct () {
        parent::__construct ("AttackEntity");
    }
    
    /**
     * @param Player $player
     * @param Entity|null $entity
     */
    public function setPlayerToEntity (Player $player, ?Entity $entity = null): void{
        $this->entities [$player->getLowerCaseName ()] = $entity;
    }
    
    /**
     * @param mixed $player
     * @return Entity|null
     */
    public function getEntityByPlayer ($player): ?Entity{
        return $this->entities [$this->convertName ($player)] ?? null;
    }
}
