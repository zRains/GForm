<?php

declare(strict_types=1);

namespace zRain\Forms;

use zRain\Forms\Base;
use zRain\GForm;

class Modal extends Base
{

    public function __construct(?string $Title, ?callable $CallBack, GForm $Node)
    {
        parent::__construct("modal", $Title, $CallBack, $Node);
    }

    public function setContent(?string $content = null): void
    {
        $this->FormData["content"] = $this->nullSet($content);
    }
    public function setButton(?array $button_data = null): void
    {
        $this->FormData["button1"] = $this->nullSet($button_data[0]);
        $this->FormData["button2"] = $this->nullSet($button_data[1] ?? null);
    }
}
