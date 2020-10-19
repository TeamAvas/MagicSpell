<?php


namespace skh6075\MagicSpell\calculation\calculations;

use pocketmine\math\Vector3;

use skh6075\MagicSpell\calculation\Calculation;

class SinCalculation extends Calculation{


    public function __construct () {
        parent::__construct ("sin");
    }
    
    public function calculation (Vector3 &$vec, int $slot, float $number1): void{
        $keys = array_keys (self::CALCULATION_SLOT) [$slot];
        switch ($keys) {
            case 'x':
                $vec->x = $vec->x + sin ($number1);
                break;
            case 'y':
                $vec->y = $vec->y + sin ($number1);
                break;
            case 'z':
                $vec->z = $vec->z + sin ($number1);
                break;
            default:
                break;
        }
    }
}
