<div>
    {{-- The whole world belongs to you --}}


    @if ($admin->status->is('blocked'))
        <button type="button" class="btn btn-success font-weight-bolder font-size-sm mr-3" data-toggle="modal" data-target="#viewAdmin_{{ $admin->id }}">Unbloack</button>
    @else
        <button type="button" class="btn btn-danger font-weight-bolder font-size-sm mr-3" data-toggle="modal" data-target="#viewAdmin_{{ $admin->id }}">Block</button>
    @endif
          

        <!-- Modal-->
        <div class="modal fade" id="viewAdmin_{{ $admin->id }}" wire:ignore.self data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" wire:ignore.self role="document">
                <div class="modal-content" wire:ignore.self >
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{ fullname($admin) }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!--begin::Header-->
                        <div class="d-flex flex-column flex-center">
                            <!--begin::Image-->
                            <div class="bgi-no-repeat bgi-size-cover rounded min-h-250px w-100" style="background-image: url({{ $admin->avatar->url() }})"></div>
                            <!--end::Image-->
                            <!--begin::Title-->
                            <a href="#" class="card-title font-weight-bolder text-dark-75 text-hover-primary font-size-h4 m-0 pt-7 pb-1">{{ fullname($admin) }}</a>
                            <!--end::Title-->
                            <!--begin::Text-->
                            <div class="font-weight-bold text-dark-50 font-size-sm pb-7">{!! $admin->status->render('<span class="label label-xl font-weight-boldest label-inline label-%theme%">%name%</span>') !!}</div>
                            <!--end::Text-->
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                        @if ($admin->status->is('blocked'))
                            <button type="button" wire:click="unblock" class="btn btn-success font-weight-bold">
                                <span class="spinner spinner-right spinner-danger ml-7 mb-1" wire:loading wire:target="unblock"></span>
                                Unblock
                            </button> 
                        @else
                            <button type="button" wire:click="block" class="btn btn-danger font-weight-bold">
                                <span class="spinner spinner-right spinner-warning ml-7 mb-1" wire:loading wire:target="block"></span>
                                Block
                            </button> 
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
