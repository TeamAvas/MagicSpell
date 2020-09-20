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
