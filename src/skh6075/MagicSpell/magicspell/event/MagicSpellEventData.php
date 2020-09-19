<?php


namespace skh6075\MagicSpell\magicspell\event;



class MagicSpellEventData{

    /** @var string */
    public const EVENT_TYPE_DAMAGE_ATTACK = "attack";
    
    /** @var string */
    public const EVENT_TYPE_DAMAGE_BLOW = "blow";
    
    /** @var string */
    public const EVENT_TYPE_REGEN_HEALTH = "regenhealth";
    
    /** @var string */
    public const EVENT_TYPE_PLAYER_EFFECT = "player_effec";
    
    /** @var string */
    public const EVENT_TYPE_TARGET_EFFECT = "target_effect";
    
    
    /** @var string[] */
    public const EVENT_TYPE_LIST = [
        self::EVENT_TYPE_DAMAGE_ATTACK,
        self::EVENT_TYPE_DAMAGE_BLOW,
        self::EVENT_TYPE_REGEN_HEALTH,
        self::EVENT_TYPE_PLAYER_EFFECT,
        self::EVENT_TYPE_TARGET_EFFECT
    ];
    
}