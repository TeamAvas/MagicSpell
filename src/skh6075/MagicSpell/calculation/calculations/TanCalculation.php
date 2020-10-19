<?php


namespace skh6075\MagicSpell\calculation\calculations;

use pocketmine\math\Vector3;

use skh6075\MagicSpell\calculation\Calculation;

class TanCalculation extends Calculation{


    public function __construct () {
        parent::__construct ("tan");
    }
    
    public function calculation (Vector3 &$vec, int $slot, float $number1): void{
        $keys = array_keys (self::CALCULATION_SLOT) [$slot];
        switch ($keys) {
            case 'x':
                $vec->x = $vec->x + tan ($number1);
                break;
            case 'y':
                $vec->y = $vec->y + tan ($number1);
                break;
            case 'z':
                $vec->z = $vec->z + tan ($number1);
                break;
            defualt:
                break;
        }
    }
}
