<?php


namespace skh6075\MagicSpell;

use pocketmine\plugin\PluginBase;

use skh6075\MagicSpell\listener\EventListener;
use skh6075\MagicSpell\object\ObjectFactory;
use skh6075\MagicSpell\calculation\CalculationFactory;
use skh6075\MagicSpell\entity\SpellEntityFactory;

class MagicSpellLoader extends PluginBase{

    /** @var MagicSpellLoader */
    private static $instance;
    
    
    public static function getInstance (): ?MagicSpellLoader{
        return self::$instance;
    }
    
    public function onLoad (): void{
        self::$instance = $this;
        
        MagicSpellFactory::getInstance ()->init ();
        ObjectFactory::getInstance ()->init ();
        CalculationFactory::getInstance ()->init ();
        SpellEntityFactory::getInstance ()->init ();
    }
    
    public function onEnable (): void{
        $this->getServer()->getPluginManager()->registerEvents(new EventListener(), $this);
    }
}
