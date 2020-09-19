<?php


namespace skh6075\MagicSpell\magicspell\particle;

use pocketmine\level\Position;
use pocketmine\level\particle\Particle;
use pocketmine\math\Vector3;
use pocketmine\Player;

use skh6075\MagicSpell\calculation\CalculationFactory;
use skh6075\MagicSpell\calculation\Calculation;
use skh6075\MagicSpell\object\ObjectFactory;
use skh6075\MagicSpell\object\objects\TouchVectorObject;
use skh6075\MagicSpell\object\objects\AttackEntityObject;

class MagicSpellParticle{

    /** @var string */
    protected $particle;
    
    /** @var array */
    protected $calculations = [];
    
    
    public function __construct (string $particle, array $calculations) {
        $this->particle = $particle;
        $this->calculations = $calculations;
    }
    
    /**
     * @param Vector3 $vec
     * @return Vector3[]
     */
    private function getVectors (Vector3 $vec): array{
        $vectors = [];
        foreach ($this->calculations as $calculation) {
            [$type, $slot, $number] = explode (':', $calculation);
            if (($class = CalculationFactory::getCalculation ($type)) instanceof Calculation) {
                $class->calculation ($vec, $slot, (float) $number);
            }
            $vectors [] = $vec;
        }
        return $vectors;
    }
    
    public function execute (Player $player): void{
        [$id, $type] = explode (':', $this->particle);
        $pos = null;
        
        if ($type === ParticleLib::POS_TYPE_PLAYER) {
            $pos = $player;
        } else if ($type === ParticleLib::POS_TYPE_TOUCHVECTOR) {
            if (($class = ObjectFactory::getObject ("TouchVector")) instanceof TouchVectorObject)
                if (($vec = $class->getVectorByPlayer ($player)) instanceof Vector3) {
                    $pos = new Position ($vec->x, $vec->y, $vec->z, $player->level);
                }
        } else if ($type === ParticleLib::POS_TYPE_TARGET) {
            if (($class = ObjectFactory::getObject ("AttackEntity")) instanceof AttackEntityObject)
                if (($entity = $class->getEntityByPlayer ($player)) instanceof Entity) {
                    $pos = $entity;
                }
        }
        if ($pos instanceof Position) {
            foreach ($this->getVectors ($pos->asVector3 ()) instanceof $vec) {
                if (($particle = ParticleLib::getParticle ($id, $vec, [ mt_rand (1, 255), mt_rand (1, 255), mt_rand (1, 255) ])) instanceof Particle) {
                    $pos->level->addParticle ($particle);
                }
            }
        }
    }
}