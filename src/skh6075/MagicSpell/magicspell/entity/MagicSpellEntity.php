<?php


namespace skh6075\MagicSpell\magicspell\entity;

use pocketmine\Player;
use pocketmine\entity\Entity;

class MagicSpellEntity{

    /** @var string */
    protected $entity;
    
    
    public function __construct (string $entity) {
        $this->entity = $entity;
    }
    
    public function execute (Player $player): void{
        [$type, $repeat] = explode (':', $this->entity);
        $nbt = Entity::createBaseNBT($player->add(0, $player->getEyeHeight(), 0), $player->getDirectionVector(), $player->yaw, $player->pitch);
        for ($i = 0; $i <= intval ($repeat); $i ++) {
            $entity = Entity::createEntity($type, $player->level, $nbt, $player);
            if ($entity !== null) {
                $entity->spawnToAll ();
                $entity->setMotion ($entity->getMotion ()->multiply (3));
            }
        }
    }
}