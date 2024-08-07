<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;

class Header extends Component
{
    public $setting;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct() {}

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|Closure|string
     */
    public function render()
    {
        return view('components.header');
    }
}
