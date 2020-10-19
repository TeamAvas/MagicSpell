<?php


namespace skh6075\MagicSpell\object;

use pocketmine\Player;

use skh6075\MagicSpell\object\objects\TouchVectorObject;
use skh6075\MagicSpell\object\objects\AttackEntityObject;
use skh6075\MagicSpell\object\objects\NearEntityObject;

class ObjectFactory{

    /** @var ObjectFactory */
    private static $instance;
    
    /** @var Objecter[] */
    private $objects = [];
    
    
    public static function getInstance (): ObjectFactory{
        if (self::$instance === null) {
            self::$instance = new self ();
        }
        return self::$instance;
    }
    
    private function __construct () {
    }
    
    public function init (): void{
        $this->registerObject (new TouchVectorObject ());
        $this->registerObject (new AttackEntityObject ());
        $this->registerObject (new NearEntityObject ());
    }
    
    /**
     * @param string $object
     */
    private function registerObject (Objecter $object): void{
        $this->objects [$object->getName ()] = $object;
    }
    
    /**
     * @param string $name
     */
    private function unregisterObject (string $name): void{
        if (isset ($this->objects [$name])) {
            unset ($this->objects [$name]);
        }
    }
    
    /**
     * @param string $name
     * @return Objecter|null
     */
    private function getObject (string $name): ?Objecter{
        return $this->objects [$name] ?? null;
    }
}
