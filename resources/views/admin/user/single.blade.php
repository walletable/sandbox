<x-admin.layouts.app :title="$title">
    
<div class="row">

    <div class="col-xl-4">

        <livewire:admin.user.head :user="$user" />

        <livewire:admin.user.add-transaction :user="$user" />

    </div>

    <div class="col-xl-8">

			<x-admin.layouts.widgets.table-list>

				<x-slot name="list_title">
					
				</x-slot>
		
				<x-slot name="toolbar">
				</x-slot>
		
				<x-slot name="content">

					<livewire:admin.user.buttons :user="$user"/>
		
					<x-admin.transaction.listing :transactions="$transactions">
		
						<x-slot name="noitems">
							No Transactions Yet
						</x-slot>
		
					</x-admin.transaction.listing>

					<x-slot name="pagination">
			
						{{ $transactions->links() }}
			
					</x-slot>
		
				</x-slot>
		
            </x-admin.layouts.widgets.table-list>
            


    </div>

</div>

</x-admin.layouts.app>