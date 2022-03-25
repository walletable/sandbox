<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    <!--begin::Form-->
    <form class="form" novalidate="novalidate"  wire:submit.prevent="generate">
        <div class="form-group row">
            <div class="col-lg-2 col-xl-2"></div>
            <div class="col-lg-8 col-xl-8 text-center">
                <div class="image-input image-input-outline image-input-circle" id="kt_user_avatar" style="background-image: url(assets/media/users/blank.png)">
                    <div class="image-input-wrapper" style="background-image: url({{ $user->avatar->child('small')->url() }})"></div>
                </div>
            </div>
            <div class="col-lg-2 col-xl-2"></div>
        </div>

        <!--begin: Wizard Step 1-->
        <div class="pb-5" wire:ignore.self data-wizard-type="step-content" data-wizard-state="current">
            <!--begin::Form Group-->
            <div class="form-group">
                <label class="font-size-h6 font-weight-bolder text-dark">Past Due Amount</label>
                <input type="number" wire:model="pastDue" class="form-control h-auto py-7 px-6 border-0 rounded-lg font-size-h6"  placeholder="Past Due Amount" />
            </div>
            <!--end::Form Group-->
            <!--begin::Form Group-->
            <div class="form-group">
                <label class="font-size-h6 font-weight-bolder text-dark">Branch Address</label>
                <input type="text" wire:model="branchAddress" class="form-control h-auto py-7 px-6 border-0 rounded-lg font-size-h6"  placeholder="Branch Address" />
            </div>
            <!--end::Form Group-->
            {{-- <!--begin::Form Group-->
            <div class="form-group">
                <label class="font-size-h6 font-weight-bolder text-dark">From</label>
                <input type="date" wire:model="from" class="form-control h-auto py-7 px-6 border-0 rounded-lg font-size-h6"/>
            </div>
            <!--end::Form Group-->
            <!--begin::Form Group-->
            <div class="form-group">
                <label class="font-size-h6 font-weight-bolder text-dark">To</label>
                <input type="date" wire:model="to" class="form-control h-auto py-7 px-6 border-0 rounded-lg font-size-h6"/>
            </div> --}}
        </div>

        <div class="d-flex justify-content-between pt-3">
            <div class="mr-2">
            </div>
            <div>
                <button class="btn btn-primary font-weight-bolder font-size-h6 pl-5 pr-8 py-4 my-3" type="submit">
                    <span class="spinner spinner-right spinner-warning ml-7 mb-1"  wire:loading wire:target="generate"></span>
                    Generate
                <span class="svg-icon svg-icon-md ml-2">
                    <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Right-2.svg-->
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <polygon points="0 0 24 0 24 24 0 24" />
                            <rect fill="#000000" opacity="0.3" transform="translate(8.500000, 12.000000) rotate(-90.000000) translate(-8.500000, -12.000000)" x="7.5" y="7.5" width="2" height="9" rx="1" />
                            <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
                        </g>
                    </svg>
                    <!--end::Svg Icon-->
                </span></button>
            </div>
        </div>
        <!--end: Wizard Actions-->

    </form>
    <!--end::Form-->
</div>
