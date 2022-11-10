<?php

namespace App\View\Components;

use App\Models\setting;
use Illuminate\View\Component;

class AdminNav extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $setting;
    public function __construct()
    {
        $this->setting = setting::first();

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin-nav');
    }
}
