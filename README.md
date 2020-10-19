# MagicSpell
PocketMine-MP Let's make Skill easily

# Usage
- create the skillName.json file in the plugin_data/MagicSpell folder.
- TODO... json Example.

```php
file_put_contents ($this->getDataFolder () . "test.json", json_encode ([
    "events" => [
        "attack:2",
        "regenhealth:2",
        "player_effect:1.2.1"
    ],
    "entities" => [],
    "particles" => [
        "29:player" => [
            "add:0:1",
            "add:2:1",
            "sin:0:2",
            "cos:2:2"
        ],
        "29:player" => [
            "subtract:0:1",
            "subtract:2:1"
        ]
    ]
]));
```

# image
![](https://raw.githubusercontent.com/GodVas/MagicSpell/master/image.jpg)

# Histories

* Object
  - https://github.com/SKHPMMPPlugins/MagicSpell/commit/11d3fbccf35f3689942bca08088e6b6aebf9d5c4
  - https://github.com/SKHPMMPPlugins/MagicSpell/commit/c9f89cb8e9d06c99b1cf8181f7e9de940a1299e6
  - https://github.com/SKHPMMPPlugins/MagicSpell/commit/15d806f3a48059cd85eea0c9efe60d1cfb1b107c
  - https://github.com/SKHPMMPPlugins/MagicSpell/commit/38244cb6afef86804db45685ded2f64be3dbd98d

* Calculation
  - https://github.com/SKHPMMPPlugins/MagicSpell/commit/9f768f26e644e4a1db32f0a6a1c8d9a62ddb3b58
  - https://github.com/SKHPMMPPlugins/MagicSpell/commit/683b89511c1b0bab3eb10f9f27d675610a54f5de
  - https://github.com/SKHPMMPPlugins/MagicSpell/commit/cbd18774589d3b22720e450e7acb03019b6754dd
  - https://github.com/SKHPMMPPlugins/MagicSpell/commit/a272c42e4d289ef8377d91f801ca5d0c2efea94a
  - https://github.com/SKHPMMPPlugins/MagicSpell/commit/c1b1d27dc62ba736e3160a3cdfcfae201091ed4c
  - https://github.com/SKHPMMPPlugins/MagicSpell/commit/0f1904cafca2d7663ae0cb99f20c095482ca4d9f
  - https://github.com/SKHPMMPPlugins/MagicSpell/commit/3110aa03b3b56935abf5541a7d2f527b822a1d67
  - https://github.com/SKHPMMPPlugins/MagicSpell/commit/f89d888a1ef09319fc53da9b75cc6e2038cc903f

* SpellEntityFactory
  - https://github.com/SKHPMMPPlugins/MagicSpell/commit/286099bf4f8eb7ade89d756bb70d2a3059d2aaeb

* MagicSpellLoader
  - https://github.com/SKHPMMPPlugins/MagicSpell/commit/feaa47c7b7a78a3715b3a40faeec73def49e0020

* MagicSpellFactory
  - https://github.com/SKHPMMPPlugins/MagicSpell/commit/109f1ff2bb35d216e904e9777006ad7fcb1707d7
