<?php

namespace App\Http\Livewire\Investment;

use Livewire\Component;
use App\Models\Investment;
use App\Lib\Investment\ICAGenerator;

class Download extends Component
{
    public Investment $investment;

    public function render()
    {
        return view('livewire.investment.download');
    }

    public function download()
    {
    }
}
