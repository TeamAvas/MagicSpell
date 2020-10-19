<?php


namespace skh6075\MagicSpell\object\objects;

use pocketmine\Player;
use pocketmine\math\Vector3;

use skh6075\MagicSpell\object\ObjectFactory;
use skh6075\MagicSpell\object\Objecter;

class TouchVectorObject extends Objecter{

    /** @var Vector3[] */
    private $vector = [];
    
    
    public function __construct () {
        parent::__construct ("TouchVector");
    }
    
    /**
     * @param Player $player
     * @param Vector3|null $vec
     */
    public function setPlayerToVector (Player $player, ?Vector3 $vec = null): void{
        $this->vector [$player->getLowerCaseName ()] = $vec;
    }
    
    /**
     * @param mixed $player
     * @return Vector3|null
     */
    public function getVectorByPlayer ($player): ?Vector3{
        return $this->vector [$this->convertName ($player)] ?? null;
    }
}
