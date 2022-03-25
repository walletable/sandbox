<x-admin.layouts.app :title="$title">

    <x-admin.layouts.widgets.table-list>

        <x-slot name="list_title">
            All Coupons
        </x-slot>

        <x-slot name="toolbar">
        </x-slot>

        <x-slot name="content">

            <x-admin.investment.items-list :investments="$investments">

                <x-slot name="noitems">
                    No Coupons
                </x-slot>

            </x-admin.investment.items-list>

        </x-slot>

        <x-slot name="pagination">

            {{ $investments->links() }}

        </x-slot>

    </x-admin.layouts.widgets.table-list>

</x-admin.layouts.app>