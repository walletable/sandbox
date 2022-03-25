<?php

namespace App\View\Components\Admin\Investment;

use Illuminate\View\Component;

class ItemsList extends Component
{
    public $coupons;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($coupons)
    {
        $this->coupons = $coupons;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.admin.coupon.items-list');
    }
}
