<?php


namespace skh6075\MagicSpell\magicspell\particle;

use pocketmine\math\Vector3;
use pocketmine\level\particle\Particle;
use pocketmine\level\particle\GenericParticle;
use pocketmine\level\particle\DustParticle;

class ParticleLib{

    public const POS_TYPE_PLAYER = "player";
    
    public const POS_TYPE_TOUCHVECTOR = "touchvector";
    
    public const POS_TYPE_TARGET = "target";
    

    public static function getParticle (int $particle, Vector3 $vec, array $mixed = []): Particle{
        if ($particle === Particle::TYPE_DUST) {
            return new DustParticle ($vec, $mixed [0], $mixed [1], $mixed [2]);
        } else if ($particle === Particle::TYPE_FIREWORKS_SPARK) {
            $r = $mixed [0];
            $g = $mixed [1];
            $b = $mixed [2];
            return new class ($vec, $r, $g, $b) extends GenericParticle{
                public function __construct (Vector3 $vec, int $r, int $g, int $b, int $a = 255) {
                    parent::__construct($vec, Particle::TYPE_FIREWORKS_SPARK, (($a & 0xff) << 24) | (($r & 0xff) << 16) | (($g & 0xff) << 8) | ($b & 0xff));
                }
            };
        } else {
            return new class ($particle, $vec) extends GenericParticle{
                public function __construct (int $particle, Vector3 $vec) {
                    parent::__construct($vec, $particle);
                }
            };
        }
    }
}