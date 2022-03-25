<?php

namespace App\Http\Livewire\Investment;

use Livewire\Component;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\Investment;
use Auth;
use DB;
use Carbon\CarbonImmutable;

class Create extends Component
{
    /**
     * Error Data
     * @var array|mixed
     */
    public $errors = [];


    public $name;

    public $phone;

    public $email;

    public $amount;

    public $duration = '1';

    public $percent;

    public $start;

    public $roi;


    public function render()
    {
        return view('livewire.investment.create')
            ->layout('components.layouts.app',[
                'title' => 'Create an ICA',
            ]);
    }

    /**
     * Validate Profile inputs
     */
    public function validated()
    {

        $data = $this->data();

        $validator = Validator::make( $this->data(), [
            'name' => 'required|string|min:3|max:75',
            'phone' => 'required|string|min:11|max:15',
            'email' => 'required|email',
            'amount' => 'required|numeric|min:100',
            'duration' => ['required', 'numeric', Rule::in([ 1])],
            //'start' => ['required', 'date', 'date_format:Y-m-d' ],
        ]);

        $errors = $validator->errors()->all();

        if ( $errors ) $this->errors += $errors;

    }

    public function data()
    {
        return $this->only(
            [
                'name',
                'phone',
                'email',
                'amount',
                'duration',
                //'start'
            ]
        );

    }




    public function emitErrors()
    {
        $this->emit('errors', $this->errors);
        $this->errors = [];
    }



    public function hasErrors()
    {
        return ( $this->errors )? true : false;
    }


    public function submit()
    {

        $this->validated();
    
    
        if ( $this->hasErrors() ){
            $this->emitErrors();
            return ;
        }

        $credit = Auth::user()->credit;

        if ((int)$credit->credit->getAmount() < ($this->amount * 100)){
            $this->emit('error', [
                'title' => 'Error',
                'message' => 'Insuficient Credit',
            ]);
            return;
        }

        if ($credit->expires_at->addDays(1) < now() ){
            $this->emit('error', [
                'title' => 'Error',
                'message' => 'Credit has expired',
            ]);
            return;
        }

        if ($this->duration === '1') {
            $this->roi = ($this->amount * 100) * 0.2;
            $this->percent = 25;
        }else if ($this->duration === '6'){
            $this->roi = ( ($this->amount * 100) * (1 + 0.2) **  6) - ($this->amount * 100);
            $this->percent = 30;
        }else{
            $this->roi = ($this->amount * 100) * 0.2;
            $this->percent = 25;
        }
        $start = $credit->expires_at->toImmutable();
        $end = $start->addMonths($this->duration);
        

        DB::transaction(function () use ($credit, $start, $end) {
            

            $credit->update(
                [
                    'credit' => (int)$credit->credit->getAmount() - $this->amount * 100
                ]
            );

            $investment = Investment::create(
                $this->only(
                    [
                        'name',
                        'phone',
                        'email',
                        'duration',
                        'percent',
                    ]
                )+
                [
                    'amount' => (int)$this->amount * 100,
                    'roi' => $this->roi,
                    'start_at' => $start,
                    'end_at' => $end,
                    'user_id' => Auth::id(),
                ]
            );

        });
        
        session()->flash('success_title', 'Done!');

        session()->flash('success', 'ICA record generated');

        return redirect()->route('home');

    }
}

