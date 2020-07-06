<?php

declare(strict_types=1);

namespace zRain\Forms;

use pocketmine\form\Form;
use pocketmine\Player;

use zRain\GForm;

abstract class Base implements Form
{
    protected $FormData;
    protected $CallBack;
    protected $GPlugin;
    protected $Color_Symbol;
    public function __construct(string $Formtype, ?string $Title, ?callable $Callback, GForm $Node)
    {
        $this->GPlugin = $Node;
        $this->FormData["type"] = $Formtype;
        $this->CallBack = $Callback;
        $this->FormData["title"] = $this->nullSet($Title);
        $this->Color_Symbol = str_split($this->GPlugin->DefaultConfig->get("Color_Symbol"));
        foreach ($this->Color_Symbol as &$char) {
            $char = "\\" . $char;
        }
        $this->Color_Symbol = implode($this->Color_Symbol);
    }
    public function sendForm(Player $player)
    {
        $player->sendForm($this);
    }
    public function setTitle(?string $title = null): void
    {
        $this->FormData["title"] = $this->nullSet($title);
    }

    private function Color_Symbol($data)
    {
        if (is_array($data)) {
            foreach ($data as &$item) {
                $item = is_array($item) ? $this->Color_Symbol($item) : (is_string($item) ? preg_replace("/({$this->Color_Symbol})/", "§", $item) : $item);
            }
        } else {
            $data = is_string($data) ? preg_replace("/({$this->Color_Symbol})/", "§", $data) : $data;
        }
        return $data;
    }

    public function nullSet($Data, $Else = null)
    {
        return $Data ?: ($Else ?: $this->GPlugin->DefaultConfig->get("Default_Require_Text"));
    }
    public function getDataArray(): array
    {
        return $this->FormData;
    }
    public function jsonSerialize()
    {
        return $this->Color_Symbol($this->FormData);
    }
    public function handleResponse(Player $player, $data): void
    {
        $Action = $this->CallBack;
        if ($Action) {
            $Action($player, $data);
        }
    }
}
