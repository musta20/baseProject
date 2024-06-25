<?php

namespace App\View\Components;

use App\Models\Setting;
use App\Models\Social;
use Closure;
use Illuminate\View\Component;

class Footer extends Component
{
    public $setting;
    public $social;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->setting = setting::first();
        $this->social = social::get();

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|Closure|string
     */
    public function render()
    {
        return view('components.footer');
    }
}
