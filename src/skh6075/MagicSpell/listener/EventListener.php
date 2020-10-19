<?php


namespace skh6075\MagicSpell\listener;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\Player;

use skh6075\MagicSpell\object\objects\TouchVectorObject;
use skh6075\MagicSpell\object\objects\AttackEntityObject;
use skh6075\MagicSpell\event\MagicSpellUseEvent;
use skh6075\MagicSpell\MagicSpellFactory;
use skh6075\MagicSpell\magicspell\MagicSpell;

class EventListener implements Listener{


    public function handlePlayerInteract (PlayerInteractEvent $event): void{
        $player = $event->getPlayer();
        $block = $event->getBlock();
        $item = $event->getItem();
        
        TouchVectorObject::getInstance ()->setPlayerToVector ($player, $block->asVector3 ());
        
        if (!is_null ($item->getNamedTagEntry ("magicspell"))) {
            $value = $item->getNamedTagEntry ("magicspell")->getValue();
            if (($spell = MagicSpellFactory::getInstance ()->getMagicSpell ($value)) instanceof MagicSpell)
                (new MagicSpellUseEvent ($player, $spell))->call ();
        }
    }
    
    public function handleEntityDamage (EntityDamageEvent $event): void{
        if ($event instanceof EntityDamageByEntityEvent) {
            $entity = $event->getEntity();
            if (($player = $event->getDamager()) instanceof Player) {
                AttackEntityObject::getInstance ()->setPlayerToEntity ($player, $entity);
                $item = $player->getInventory()->getItemInHand();
                
                if (!is_null ($item->getNamedTagEntry ("magicspell"))) {
                    $value = $item->getNamedTagEntry ("magicspell")->getValue();
                    if (($spell = MagicSpellFactory::getInstance ()->getMagicSpell ($value)) instanceof MagicSpell)
                        (new MagicSpellUseEvent ($player, $spell))->call ();
                }
            }
        }
    }
    
    public function handleMagicSpellUse (MagicSpellUseEvent $event): void{
        $player = $event->getPlayer();
        $spell = $event->getMagicSpell();
        
        if (!$event->isCancelled ()) {
            $spell->execute ($player);
        }
    }
}
