<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <div class="text-center">
        <a href="{{ route('admin.users.statement', ['user' => $user->id]) }}" class="btn btn-success font-weight-bolder font-size-h6 pl-3 pr-3 pb-3 py-2">
            Statement
        </a>
        <button wire:click="clearTransactions" class="btn btn-danger font-weight-bolder font-size-h6 pl-3 pr-3 pb-3 py-2" type="button">
                <span class="spinner spinner-right spinner-warning ml-7 mb-1"  wire:loading wire:target="clearTransactions"></span>
                Clear Transactions
        </button>

        @if ($user->status->is_not('active'))
            <button wire:click="status('active')" class="btn btn-primary font-weight-bolder font-size-h6 pl-3 pr-3 pb-3 py-2" type="button">
                    <span class="spinner spinner-right spinner-warning ml-7 mb-1"  wire:loading wire:target="status('active')"></span>
                    Activate
            </button>
        @else
            <button wire:click="status('hold')" class="btn btn-warning font-weight-bolder font-size-h6 pl-3 pr-3 pb-3 py-2" type="button">
                <span class="spinner spinner-right spinner-warning ml-7 mb-1"  wire:loading wire:target="status('hold')"></span>
                Hold
            </button>
            <button wire:click="status('block')" class="btn btn-danger font-weight-bolder font-size-h6 pl-3 pr-3 pb-3 py-2" type="button">
                <span class="spinner spinner-right spinner-warning ml-7 mb-1"  wire:loading wire:target="status('block')"></span>
                Block
            </button>
        @endif
    </div>
</div>
