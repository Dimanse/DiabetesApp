<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Button_informations extends Component
{
    public $informaciones;
    public function __construct($informaciones)
    {
        $this->informaciones = $informaciones;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.button_informations');
    }
}
