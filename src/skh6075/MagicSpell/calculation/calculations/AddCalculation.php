<?php


namespace skh6075\MagicSpell\calculation\calculations;

use pocketmine\math\Vector3;

use skh6075\MagicSpell\calculation\Calculation;

class AddCalculation extends Calculation{


    public function __construct () {
        parent::__construct ("add");
    }
    
    public function calculation (Vector3 &$vec, int $slot, float $number1): void{
        $keys = array_keys (self::CALCULATION_SLOT) [$slot];
        if ($keys === 'x') {
            $vec->add ($number1);
        } else if ($keys === 'y') {
            $vec->add (0, $number1);
        } else if ($keys === 'z') {
            $vec->add (0, 0, $number1);
        }
    }
}