<?php

declare(strict_types=1);

namespace zRain\Forms;

use zRain\Forms\Base;
use zRain\GForm;

class Custom  extends Base
{
    public function __construct(?string $Title, ?callable $CallBack, GForm $Node)
    {
        parent::__construct("custom_form", $Title, $CallBack, $Node);
    }

    // Input
    public function setInput(?string $text = null, ?string $default = null): void
    {
        $this->FormData["content"][] = ["type" => "input", "text" => $this->nullSet($text), "default" => $this->nullSet($default)];
    }

    // Slider
    public function setSlider(?string $text = null, int $min = 0, int $max = 100, int $default = 0): void
    {
        $this->FormData["content"][] = ["type" => "slider", "text" => $this->nullSet($text), "max" => $max, "min" => $min, "default" => $default];
    }
    // Label 
    public function setLabel(?string $text = null): void
    {
        $this->FormData["content"][] = ["type" => "label", "text" => $this->nullSet($text)];
    }
    // Step_slider
    public function setSteps(?string $text = null, ?array $steps = null): void
    {
        $this->FormData["content"][] = [
            "type" => "step_slider", "text" => $this->nullSet($text),
            "steps" => $this->nullSet($steps, $this->GPlugin->DefaultConfig->get("Step_Bar_Empty"))
        ];
    }
    // Toggle
    public function setToggle(?string $text = null, bool $default = false): void
    {
        $this->FormData["content"][] = ["type" => "toggle", "text" => $this->nullSet($text), "default" => $default];
    }
    // Dropdown
    public function setDropdown(?string $text = null, ?array $options = null): void
    {
        $this->FormData["content"][] = [
            "type" => "dropdown", "text" => $this->nullSet($text),
            "options" => $this->nullSet($options, $this->GPlugin->DefaultConfig->get("Dropdown_Empty"))
        ];
    }
}
