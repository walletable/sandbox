<?php

namespace App\View\Components\Admin\Layouts;

use Illuminate\View\Component;

class Wizard extends Component
{
    public $steps;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($steps)
    {
        $this->steps = $steps;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.admin.layouts.wizard');
    }
}
