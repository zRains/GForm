<?php

declare(strict_types=1);

namespace zRain;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat as TF;
use pocketmine\utils\Config;
use zRain\Forms\Custom;
use zRain\Forms\Modal;
use zRain\Forms\Simple;


class GForm extends PluginBase
{
    public $DefaultConfig;
    public function onEnable()
    {
        $this->saveResource("Default.yml");
        $this->DefaultConfig = new Config($this->getDataFolder() . "Default.yml", Config::YAML);
        $this->getLogger()->info(TF::AQUA . TF::BOLD . "GForm Enable");
    }
    public function CreateCustomForm(?string $Title = null, ?callable $Callback = null): Custom
    {
        return new Custom($Title, $Callback, $this);
    }
    public function CreateModalForm(?string $Title = null, ?callable $Callback = null): Modal
    {
        return new Modal($Title, $Callback, $this);
    }
    public function CreateSimpleForm(?string $Title = null, ?callable $Callback = null): Simple
    {
        return new Simple($Title, $Callback, $this);
    }
    public function onDisable()
    {
        $this->getLogger()->info(TF::RED . TF::BOLD . "GForm Disable");
    }
}
