<?php

namespace App\View\Components;

use App\Models\category;
use App\Models\clients;
use App\Models\message;
use App\Models\order;
use App\Models\Report;
use App\Models\services;
use Illuminate\View\Component;

class AdminContent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $allnumber;

    public function __construct()
    {
        $this->allnumber=[
            'order'=>count(order::get()),
            'services'=>count(services::get()),
            'cat'=>count(category::get()),
            'msg'=>count(message::get()),
            'report'=>count(Report::get()),
            'clent'=>count(clients::get()),
        ];
    }
    

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin-content');
    }
}
