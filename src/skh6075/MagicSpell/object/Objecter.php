<?php


namespace skh6075\MagicSpell\object;

use pocketmine\Player;

abstract class Objecter{

    /** @var string */
    protected $name;
    
    
    public function __construct (string $name) {
        $this->name = $name;
    }
    
    public function getName (): string{
        return $this->name;
    }
    
    public function convertName ($player): string{
        return strtolower ($player instanceof Player ? $player->getName () : $player);
    }
}
