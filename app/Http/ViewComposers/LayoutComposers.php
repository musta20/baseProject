<?php

namespace App\Http\ViewComposers;

use App\Models\setting;
use Illuminate\View\View;

class LayoutComposers
{
    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */
    protected $props = [];

    /**
     * Create a new profile composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct()
    {
        $uri = url()->current();

        if (! strpos($uri, 'admin')) {
            $setting = setting::first();

            $this->props = [

                'setting' => $setting,

            ];
        }
    }

    /**
     * Bind data to the view.
     *
     * @return void
     */
    public function compose(View $view)
    {
        $view->with($this->props);
    }
}
