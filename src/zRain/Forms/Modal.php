<?php

declare(strict_types=1);

namespace zRain\Forms;

use pocketmine\form\Form;
use pocketmine\Player;

use zRain\Forms\Base;

class Modal extends Base
{

    public function __construct(string $Title = "NULL", ?callable $CallBack)
    {
        parent::__construct("modal", $Title, $CallBack);
    }

    public function setContent(string $content = "NULL"): void
    {
        $this->FormData["content"] = $content;
    }
    public function setButton(array $button_data = []): void
    {
        $this->FormData["button1"] = $button_data[0] ?: "NULL";
        $this->FormData["button2"] = $button_data[1] ?: "NULL";
    }
}
