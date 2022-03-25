<div class="p-5">
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
		<button type="button" class="btn btn-primary font-weight-bolder font-size-sm" data-toggle="modal" data-target="#JumpToUser">Jump To</button>
		<!-- Modal-->
		<div class="modal fade" id="JumpToUser" wire:ignore.self data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" wire:ignore.self role="document">
				<div class="modal-content" wire:ignore.self >
					<div class="modal-header">
						<h5 class="modal-title" id="JumpToUser">Jump To Account</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<i aria-hidden="true" class="ki ki-close"></i>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group text-left mt-5">
	
							<label class="font-size-h6 font-weight-bolder text-dark">Account Email</label>
							<input type="text" wire:model.debounce.200ms="email" class="form-control h-auto py-7 bg-dark-75 px-6 border-0 rounded-lg font-size-h6 bg-light-primary"  placeholder="Email" />
						</div>
						<!--end::Form Group-->
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
						<button type="button" wire:click="jumpTo" class="btn btn-primary font-weight-bold">
							<span class="spinner spinner-right spinner-warning ml-7 mb-1" wire:loading wire:target="jumpTo"></span>
							Jump To Account
						</button> 
					</div>
				</div>
			</div>
		</div>
</div>
