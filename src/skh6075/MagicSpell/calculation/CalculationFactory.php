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

    /** @var Calculation[] */
    private static $calculations = [];
    
    
    public static function init (): void{
        self::registerCalculation (new AddCalculation ());
        self::registerCalculation (new SubtractCalculation ());
        self::registerCalculation (new MultiplyCalculation ());
        self::registerCalculation (new DivideCalculation ());
        self::registerCalculation (new SinCalculation ());
        self::registerCalculation (new CosCalculation ());
        self::registerCalculation (new TanCalculation ());
    }
    
    public static function registerCalculation (Calculation $calculation): void{
        self::$calculations [$calculation->getName ()] = $calculation;
    }
    
    public static function unregisterCalculation (string $name): void{
        if (isset (self::$calculations [$name])) {
            unset (self::$calculations [$name]);
        }
    }
    
    public static function getCalculation (string $name): ?Calculation{
        return self::$calculations [$name] ?? null;
    }
}