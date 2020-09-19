<?php


namespace skh6075\MagicSpell\calculation\calculations;

use pocketmine\math\Vector3;

use skh6075\MagicSpell\calculation\Calculation;

class SubtractCalculation extends Calculation{


    public function __construct () {
        parent::__construct ("subtract");
    }
    
    public function calculation (Vector3 &$vec, int $slot, float $number1): void{
        $keys = array_keys (self::CALCULATION_SLOT) [$slot];
        if ($keys === 'x') {
            $vec->x -= $number1;
        } else if ($keys === 'y') {
            $vec->y -= $number1;
        } else if ($keys === 'z') {
            $vec->z -= $number1;
        }
    }
}