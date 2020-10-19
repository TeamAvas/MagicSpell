<?php


namespace skh6075\MagicSpell;

use skh6075\MagicSpell\exceptions\MagicSpellRegisterException;
use skh6075\MagicSpell\magicspell\MagicSpell;

class MagicSpellFactory{

    /** @var MagicSpellFactory */
    private static $instance;
    
    /** @var MagicSpell[] */
    private static $spells = [];
    
    
    public static function getInstance (): MagicSpellFactory{
        if (self::$instance === null) {
            self::$instance = new self ();
        }
        returns self::$instance;
    }
    
    private function __construct () {
    }
    
    /**
     * @param string $name
     * @return MagicSpell|null
     */
    public function getMagicSpell (string $name): ?MagicSpell{
        return self::$spells [$name] ?? null;
    }
    
    /**
     * @param string $name
     * @param array $data
     */
    public function registerMagicSpell (string $name, array $data): void{
        if (!isset ($data ["events"]) || !isset ($data ["entities"]) || !isset ($data ["particle"])) {
            throw new MagicSpellRegisterException ("Could not find data value.");
        }
        self::$spells [$name] = new MagicSpell ($name, $data);
    }
    
    /**
     * @param string $name
     */
    public function unregisterMagicSpell (string $name): void{
        if (isset (self::$spells [$name])) {
            unset (self::$spells [$name]);
        }
    }
    
    public function init (): void{
        foreach (array_diff (scandir (MagicSpellLoader::getInstance ()->getDataFolder ()), [ '.', '..' ]) as $value) {
            if (is_dir (MagicSpellLoader::getInstance ()->getDataFolder () . $value)) {
                continue;
            }
            if (isset (explode ('.', $value) [1]) and explode ('.', $value) [1] === "json") {
                try {
                    $this->registerMagicSpell ($value, json_decode (file_get_contents (MagicSpellLoader::getInstance ()->getDataFolder () . $value), true));
                } catch (MagicSpellRegisterException $exception) {
                    MagicSpellLoader::getInstance ()->getLogger ()->critical ($exception->getMessage ());
                }
            }
        }
        MagicSpellLoader::getInstance ()->getLogger ()->notice ("Loaded MagicSpells " . count (self::$spells) . " count.");
    }
}
