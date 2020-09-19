<?php


namespace skh6075\MagicSpell\magicspell;

use pocketmine\Player;

use skh6075\MagicSpell\magicspell\event\MagicSpellEvent;
use skh6075\MagicSpell\magicspell\entity\MagicSpellEntity;
use skh6075\MagicSpell\magicspell\particle\MagicSpellParticle;

class MagicSpell{

    private $name;
    
    /** @var MagicSpellEvent[] */
    private $events = [];
    
    /** @var MagicSpellEntity[] */
    private $entities = [];
    
    /** @var MagicSpellParticle[] */
    private $particles = [];
    
    
    public function __construct (string $name, array $data) {
        $this->name = $name;
        
        $this->loadParameters ($data);
    }
    
    public function getName (): string{
        return $this->name;
    }
    
    private function loadParameters (array $data): void{
        foreach ($data ["events"] as $event) {
            $this->events [] = new MagicSpellEvent ($event);
        }
        foreach ($data ["entities"] as $entity) {
            $this->entities [] = new MagicSpellEntity ($entity);
        }
        foreach ($data ["particles"] as $key => $value) {
            $this->particles [] = new MagicSpellParticle ($value, $data ["particles"] [$key] [$value]);
        }
    }
    
    public function execute (Player $player): void{
        foreach ($this->events as $event) {
            if ($event instanceof MagicSpellEvent)
                $event->execute ($player);
        }
        foreach ($this->particles as $particle) {
            if ($particle instanceof MagicSpellParticle)
                $particle->execute ($player);
        }
        foreach ($this->entities as $entity) {
            if ($entity instanceof MagicSpellEntity)
                $entity->execute ($player);
        }
    }
}