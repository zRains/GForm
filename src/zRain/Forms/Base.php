<?php

declare(strict_types=1);

namespace zRain\Forms;

use pocketmine\form\Form;
use pocketmine\Player;

abstract class Base implements Form
{
    protected $FormData;
    protected $CallBack;
    public function __construct(string $Formtype, string $Title = "NULL", ?callable $Callback)
    {
        $this->FormData["type"] = $Formtype;
        $this->FormData["title"] = $Title;
        $this->CallBack = $Callback;
    }
    public function sendForm(Player $player)
    {
        $player->sendForm($this);
    }
    public function setTitle(string $title = "NULL"): void
    {
        $this->FormData["title"] = $title;
    }

    public function jsonSerialize()
    {
        return $this->FormData;
    }
    public function handleResponse(Player $player, $data): void
    {
        $Action = $this->CallBack;
        if ($Action) {
            $Action($player, $data);
        }
    }
}
