<?php


namespace skh6075\MagicSpell\object;

use pocketmine\Player;

use skh6075\MagicSpell\object\objects\TouchVectorObject;
use skh6075\MagicSpell\object\objects\AttackEntityObject;
use skh6075\MagicSpell\object\objects\NearEntityObject;

class ObjectFactory{

    /** @var Objecter[] */
    private static $objects = [];
    
    
    public static function init (): void{
        self::registerObject (new TouchVectorObject ());
        self::registerObject (new AttackEntityObject ());
        self::registerObject (new NearEntityObject ());
    }
    
    /**
     * @param string $object
     */
    public static function registerObject (Objecter $object): void{
        self::$objects [$object->getName ()] = $object;
    }
    
    /**
     * @param string $name
     */
    public static function unregisterObject (string $name): void{
        if (isset (self::$objects [$name])) {
            unset (self::$objects [$name]);
        }
    }
    
    /**
     * @param string $name
     * @return Objecter|null
     */
    public static function getObject (string $name): ?Objecter{
        return self::$objects [$name] ?? null;
    }
    
    public static function convertName ($player): string{
        return strtolower ($player instanceof Player ? $player->getName () : $player);
    }
}