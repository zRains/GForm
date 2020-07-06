<?php

declare(strict_types=1);

namespace zRain\Forms;

use zRain\Forms\Base;
use zRain\GForm;

class Simple extends Base
{

    public function __construct(?string $Title, ?callable $CallBack, GForm $Node)
    {
        parent::__construct("form", $Title, $CallBack, $Node);
    }
    public function setContent(?string $content = null): void
    {
        $this->FormData["content"] = $this->nullSet($content);
    }
    public function setButton(?string $text = null, ?string $data = null, string $type = "url"): void
    {
        $this->FormData["buttons"][] = ["text" => $this->nullSet($text), "image" => [
            "type" => $data ? $type : "path",
            "data" => $this->nullSet($data, $this->GPlugin->DefaultConfig->get("Default_Img"))
        ]];
    }
}
