<?php


namespace skh6075\MagicSpell\magicspell\event;

use pocketmine\Player;
use pocketmine\entity\Entity;
use pocketmine\entity\Effect;
use pocketmine\entity\EffectInstance;
use pocketmine\event\entity\EntityDamageByEntity;
use pocketmine\event\entity\EntityRegainHealthEvent;

use skh6075\MagicSpell\object\objects\AttackEntityObject;

class MagicSpellEvent{

    /** @var string */
    protected $event;
    
    
    public function __construct (string $event) {
        $this->event = $event;
    }
    
    public function execute (Player $player): void{
        [$data, $value] = explode (':', $this->event);
        
        if ($data === MagicSpellEventData::EVENT_TYPE_DAMAGE_ATTACK) {
            if (($entity = AttackEntityObject::getInstance ()->getEntityByPlayer ($player)) instanceof Entity) {
                $event = new EntityDamageByEntityEvent ($player, $entity, EntityDamageByEntityEvent::CAUSE_ENTITY_ATTACK, (float) $value);
                $player->attack ($event);
            }
        } else if ($data === MagicSpellEventData::EVENT_TYPE_DAMAGE_BLOW) {
            if (($entity = AttackEntityObject::getInstance ()->getEntityByPlayer ($player)) instanceof Entity) {
                $event = new EntityDamageByEntityEvent ($entity, $player, EntityDamageByEntityEvent::CAUSE_ENTITY_ATTACK, (float) $value);
                $entity->attack ($event);
            }
        } else if ($data === MagicSpellEventData::EVENT_TYPE_REGEN_HEALTH) {
            (new EntityRegainHealthEvent ($player, (float) $value, EntityRegainHealthEvent::CAUSE_REGEN))->call ();
        } else if ($data === MagicSpellEventData::EVENT_TYPE_PLAYER_EFFECT) {
            [$id, $sec, $amf] = explode ('.', $value);
            $effect = new EffectInstance (Effect::getEffect ($id), 20 * $sec, $amf);
            $player->addEffect ($effect);
        } else if ($data === MagicSpellEventData::EVENT_TYPE_TARGET_EFFECT) {
            if (($entity = AttackEntityObject::getInstance ()->getEntityByPlayer ($player)) instanceof Entity) {
                [$id, $sec, $amf] = explode ('.', $value);
                $effect = new EffectInstance (Effect::getEffect ($id), 20 * $sec, $amf);
                $entity->addEffect ($effect);
            }
        }
    }
}
