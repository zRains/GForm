<?php

declare(strict_types=1);

namespace zRain\Forms;

use pocketmine\form\Form;
use pocketmine\Player;

use zRain\Forms\Base;

class Custom  extends Base
{
    public function __construct(string $Title = "NULL", ?callable $CallBack)
    {
        parent::__construct("custom_form", $Title, $CallBack);
    }

    // Slider
    public function setSlider(string $text = "NULL", int $min = 0, int $max = 100, int $default = 0): void
    {
        $this->FormData["content"][] = ["type" => "slider", "text" => $text, "max" => $max, "min" => $min, "default" => $default];
    }
    // Label 
    public function setLabel(string $text = "NULL"): void
    {
        $this->FormData["content"][] = ["type" => "label", "text" => $text];
    }
    // Step_slider
    public function setSteps(string $text = "NULL", array $steps = []): void
    {
        $this->FormData["content"][] = ["type" => "step_slider", "text" => $text, "steps" => $steps];
    }
    // Toggle
    public function setToggle(string $text = "NULL", bool $default = false): void
    {
        $this->FormData["content"][] = ["type" => "toggle", "text" => $text, "default" => $default];
    }
    // Dropdown
    public function setDropdown(string $text = "NULL", array $options = []): void
    {
        $this->FormData["content"][] = ["type" => "dropdown", "text" => $text, "options" => $options];
    }
}
