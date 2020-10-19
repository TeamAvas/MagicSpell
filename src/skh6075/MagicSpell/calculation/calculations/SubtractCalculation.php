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
        switch ($keys) {
            case 'x':
                $vec->x -= $number1;
                break;
            case 'y':
                $vec->y -= $number1;
                break;
            case 'z':
                $vec->z -= $number1;
                break;
            default:
                break;
        }
    }
}
