<?php

namespace App\View\Components\Admin\Transaction;

use Illuminate\View\Component;

class Listing extends Component
{
    
    public $transactions;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($transactions)
    {
        $this->transactions = $transactions;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.transaction.listing');
    }
}
