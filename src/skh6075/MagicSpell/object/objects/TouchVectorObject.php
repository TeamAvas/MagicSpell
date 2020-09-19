<?php


namespace skh6075\MagicSpell\object\objects;

use pocketmine\Player;
use pocketmine\math\Vector3;

use skh6075\MagicSpell\object\ObjectFactory;
use skh6075\MagicSpell\object\Objecter;

class TouchVectorObject extends Objecter{

    /** @var Vector3[] */
    private static $vector = [];
    
    
    public function __construct () {
        parent::__construct ("TouchVector");
    }
    
    /**
     * @param Player $player
     * @param Vector3|null $vec
     */
    public static function setPlayerToVector (Player $player, ?Vector3 $vec = null): void{
        self::$vector [$player->getName ()] = $vec;
    }
    
    /**
     * @param mixed $player
     * @return Vector3|null
     */
    public static function getVectorByPlayer ($player): ?Vector3{
        return self::$vector [ObjectFactory::convertName ($player)] ?? null;
    }
}