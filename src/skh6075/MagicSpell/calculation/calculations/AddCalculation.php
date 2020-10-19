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
        switch ($keys) {
            case 'x':
                $vec->add ($number1);
                break;
            case 'y':
                $vec->add (0, $number1);
                break;
            case 'z':
                $vec->add (0, 0, $number1);
                break;
            default:
                break;
        }
    }
}
