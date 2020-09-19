<?php


namespace skh6075\MagicSpell\event;

use pocketmine\event\Event;
use pocketmine\event\Cancellable;
use pocketmine\Player;

use skh6075\MagicSpell\magicspell\MagicSpell;

class MagicSpellUseEvent extends Event implements Cancellable{

    /** @var Player */
    private $player;
    
    /** @var MagicSpell */
    private $spell;
    
    
    public function __construct (Player $player, MagicSpell $spell) {
        $this->player = $player;
        $this->spell = $spell;
    }
    
    public function getPlayer (): Player{
        return $this->player;
    }
    
    public function getMagicSpell (): MagicSpell{
        return $this->spell;
    }
}