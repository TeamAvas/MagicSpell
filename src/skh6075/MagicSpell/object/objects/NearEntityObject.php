<?php


namespace skh6075\MagicSpell\object\objects;

use pocketmine\level\Position;

use skh6075\MagicSpell\object\ObjectFactory;
use skh6075\MagicSpell\object\Objecter;

class NearEntityObject extends Objecter{

    /** @var float */
    private $radius = 0.0;
    
    /** @var array|string */
    private $types = [];
    
    public const NEAR_TYPE_PLAYER = "player";
    public const NEAR_TYPE_ENTITY = "entity";
    
    
    public function __construct () {
        parent::__construct ("NearEntity");
    }
    
    public function setRadius (float $radius = 0.0): void{
        $this->radius = $radius;
    }
    
    public function setTypes ($types): void{
        $this->types = $types;
    }
    
    public function getRadius (): float{
        return $this->radius;
    }
    
    public function getTypes () {
        return $this->types;
    }
    
    public function getNears (Position $pos): array{
        $res = [];
        
        if (is_string ($this->getTypes ())) {
            if ($this->getTypes () === self::NEAR_TYPE_PLAYER) {
                $this->pushNearPlayers ($pos, $res);
            } else {
                $this->pushNearEntities ($pos, $res);
            }
        } else if (is_array ($this->getTypes ())) {
            foreach ($this->getTypes () as $type) {
                if ($type === self::NEAR_TYPE_PLAYER) {
                    $this->pushNearPlayers ($pos, $res);
                }
                if ($type === self::NEAR_TYPE_ENTITY) {
                    $this->pushNearEntities ($pos, $res);
                }
            }
        }
        return $res;
    }
    
    private function pushNearPlayers (Position $pos, array &$res): void{
        foreach ($pos->level->getPlayers () as $player) {
            if ($pos->distance ($player) <= $this->getRadius ())
                $res [] = $player;
        }
    }
    
    private function pushNearEntities (Position $pos, array &$res): void{
        foreach ($pos->level->getEntities () as $entity) {
            if ($pos->distance ($entity) <= $this->getRadius ())
                $res [] = $entity;
        }
    }
}