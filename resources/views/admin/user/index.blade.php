<x-admin.layouts.app :title="$title">
    
    <x-admin.layouts.widgets.table-list>

        <x-slot name="list_title">
            All User
        </x-slot>

        <x-slot name="toolbar">
            
        </x-slot>

        <x-slot name="content">

            <x-admin.user.items-list :users="$members">

                <x-slot name="noitems">
                    No users
                </x-slot>

            </x-admin.user.items-list>

        </x-slot>

        <x-slot name="pagination">

            {{ $members->links() }}

        </x-slot>

    </x-admin.layouts.widgets.table-list>

</x-admin.layouts.app>