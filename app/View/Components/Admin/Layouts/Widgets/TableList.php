<?php

namespace App\View\Components\Admin\Layouts\Widgets;

use Illuminate\View\Component;

class TableList extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.admin.layouts.widgets.table-list');
    }
}
