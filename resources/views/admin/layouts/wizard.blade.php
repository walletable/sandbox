<x-admin.layouts.wizard :steps="$steps" > 
	<x-slot name="title">
		@yield('title', $title ?? config('app.name'))
	</x-slot>
	@yield('content')
</x-admin.layouts.wizard>