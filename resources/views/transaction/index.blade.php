<x-layouts.app>
	<x-transaction.listing :transactions="$transactions">
    </x-transaction.listing>
    {{ $transactions->links() }}
</x-layouts.app>