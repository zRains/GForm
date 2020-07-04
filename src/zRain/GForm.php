<?php

declare(strict_types=1);

namespace zRain;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\utils\TextFormat as TF;
use zRain\Forms\Custom;
use zRain\Forms\Modal;
use zRain\Forms\Simple;


class GForm extends PluginBase implements Listener
{
    public function onEnable()
    {
        $this->getLogger()->info(TF::AQUA . "GForm已加载");
    }
    public function CreateCustomForm(string $Title, ?callable $Callback): Custom
    {
        return new Custom($Title, $Callback);
    }
    public function CreateModalForm(string $Title, ?callable $Callback): Modal
    {
        return new Modal($Title, $Callback);
    }
    public function CreateSimpleForm(string $Title, ?callable $Callback): Simple
    {
        return new Simple($Title, $Callback);
    }
}
