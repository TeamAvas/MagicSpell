<?php


namespace skh6075\MagicSpell\calculation;

use skh6075\MagicSpell\calculation\calculations\AddCalculation;
use skh6075\MagicSpell\calculation\calculations\SubtractCalculation;
use skh6075\MagicSpell\calculation\calculations\MultiplyCalculation;
use skh6075\MagicSpell\calculation\calculations\DivideCalculation;
use skh6075\MagicSpell\calculation\calculations\SinCalculation;
use skh6075\MagicSpell\calculation\calculations\CosCalculation;
use skh6075\MagicSpell\calculation\calculations\TanCalculation;

class CalculationFactory{

    /** @var CalculationFactory */
    private static $instance;
    
    /** @var Calculation[] */
    private $calculations = [];
    
    
    public static function init (): void{
        $this->registerCalculation (new AddCalculation ());
        $this->registerCalculation (new SubtractCalculation ());
        $this->registerCalculation (new MultiplyCalculation ());
        $this->registerCalculation (new DivideCalculation ());
        $this->registerCalculation (new SinCalculation ());
        $this->registerCalculation (new CosCalculation ());
        $this->registerCalculation (new TanCalculation ());
    }
    
    private function registerCalculation (Calculation $calculation): void{
        $this->calculations [$calculation->getName ()] = $calculation;
    }
    
    private function unregisterCalculation (string $name): void{
        if (isset ($this->calculations [$name])) {
            unset ($this->calculations [$name]);
        }
    }
    
    public function getCalculation (string $name): ?Calculation{
        return $this->calculations [$name] ?? null;
    }
}
