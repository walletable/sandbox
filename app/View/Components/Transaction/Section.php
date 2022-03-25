<?php

namespace App\View\Components\Transaction;

use Illuminate\View\Component;

class Section extends Component
{
    public $section;
    public $transaction;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($section, $transaction)
    {
        $this->section = $section;
        $this->transaction = $transaction;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.transaction.section');
    }
}
