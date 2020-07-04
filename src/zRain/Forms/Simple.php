<?php

declare(strict_types=1);

namespace zRain\Forms;

use zRain\Forms\Base;

class Simple extends Base
{

    public function __construct(string $Title = "NULL", ?callable $CallBack)
    {
        parent::__construct("form", $Title, $CallBack);
    }
    public function setContent(string $content = "MULL"): void
    {
        $this->FormData["content"] = $content;
    }
    public function setButton(string $text = "NULL", string $data = null, string $type = "url"): void
    {
        $this->FormData["buttons"][] = ["text" => $text, "image" => ["type" => $type, "data" => $data]];
    }
}
