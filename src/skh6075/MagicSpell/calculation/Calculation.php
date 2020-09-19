<?php


namespace skh6075\MagicSpell\calculation;

use pocketmine\math\Vector3;

abstract class Calculation{

    /** @var string */
    protected $name;
    
    /** @var array */
    public const CALCULATION_SLOT = [
        "x" => 0,
        "y" => 1,
        "z" => 2
    ];
    
    
    public function __construct (string $name) {
        $this->name = $name;
    }
    
    public function getName (): string{
        return $this->name;
    }
    
    abstract public function calculation (Vector3 &$vec, int $slot, float $number1): void;
}