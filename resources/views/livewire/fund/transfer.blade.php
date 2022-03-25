<div>
    {{-- Do your work, then step back. --}}
    <div class="p-3">
        @if (!$otp_data)
        <!--begin::Form-->
        <form class="form" novalidate="novalidate"  wire:submit.prevent="start">

            <!--begin: Wizard Step 1-->
            <div class="pb-5" wire:ignore.self data-wizard-type="step-content" data-wizard-state="current">
                <div class="form-group row">
                    <div class="col-lg-2 col-xl-2"></div>
                    <div class="col-lg-8 col-xl-8 text-center">
                        <div class="image-input image-input-outline image-input-circle" id="kt_user_avatar" style="background-image: url(assets/media/users/blank.png)">
                            <div class="image-input-wrapper" style="background-image: url({{ $this->url($this->avatar) }})"></div>
                        </div>
                        <br>
                    </div>
                    <div class="col-lg-2 col-xl-2"></div>
                </div>
                <div class="text-center">
                    @if ($this->receiver)
                        {{ $this->receiver->name }}
                    @endif
                </div>
                <!--begin::Form Group-->
                <div class="form-group">
                    <label class="font-size-h6 font-weight-bolder text-dark">Email</label>
                    <input type="email" wire:model="email" class="form-control h-auto py-7 px-6 border-0 rounded-lg font-size-h6"  placeholder="Email" />
                </div>
                <!--end::Form Group-->
                <!--begin::Form Group-->
                <div class="form-group">
                    <label class="font-size-h6 font-weight-bolder text-dark">Amount <sup>({{ $wallet->currency->getSymbol() }})</sup></label>
                    <input type="number" wire:model="amount" class="form-control h-auto py-7 px-6 border-0 rounded-lg font-size-h6"  placeholder="Amount" />
                </div>
                <!--end::Form Group-->
                <!--begin::Form Group-->
                <div class="form-group">
                    <label class="font-size-h6 font-weight-bolder text-dark">Naration</label>
                    <input type="text" wire:model="remarks" class="form-control h-auto py-7 px-6 border-0 rounded-lg font-size-h6"  placeholder="Remarks" />
                </div>
                <!--end::Form Group-->
                <!--begin::Form Group-->
                <div class="form-group">
                    <label class="font-size-h6 font-weight-bolder text-dark">Transaction Pin</label>
                    <input type="number" wire:model="pin" class="form-control h-auto py-7 px-6 border-0 rounded-lg font-size-h6"  placeholder="Pin" />
                </div>
                <!--end::Form Group-->

            </div>

            <div class="d-flex justify-content-between pt-3">
                <div class="mr-2">
                </div>
                <div>
                    <button class="btn btn-primary font-weight-bolder font-size-h6 pl-5 pr-8 py-4 my-3" type="submit">
                        <span class="spinner spinner-right spinner-warning ml-7 mb-1"  wire:loading wire:target="start"></span>
                        Transfer
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
        @else
        <!--begin::Form-->
        <form class="form" novalidate="novalidate"  wire:submit.prevent="transfer">

            <!--begin: Wizard Step 1-->
            <div wire:ignore.self data-wizard-type="step-content" data-wizard-state="current">
                <div class="card-body text-center">
                    <p class="p-3">
                        <span class="svg-icon svg-icon-success svg-icon-10x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Code\Done-circle.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"/>
                                <path d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z" fill="#000000" opacity="0.3"/>
                                <path d="M14.5,11 C15.0522847,11 15.5,11.4477153 15.5,12 L15.5,15 C15.5,15.5522847 15.0522847,16 14.5,16 L9.5,16 C8.94771525,16 8.5,15.5522847 8.5,15 L8.5,12 C8.5,11.4477153 8.94771525,11 9.5,11 L9.5,10.5 C9.5,9.11928813 10.6192881,8 12,8 C13.3807119,8 14.5,9.11928813 14.5,10.5 L14.5,11 Z M12,9 C11.1715729,9 10.5,9.67157288 10.5,10.5 L10.5,11 L13.5,11 L13.5,10.5 C13.5,9.67157288 12.8284271,9 12,9 Z" fill="#000000"/>
                            </g>
                        </svg><!--end::Svg Icon--></span>
                    </p>
                    <h3 class="font-weight-bolder text-dark display5">Almost done</h3>
                    <p class="p-2">
                        We have sent OTP to your mail, provide it below.
                    </p>
                </div>
                <!--begin::Form Group-->
                <div class="form-group">
                    <input type="number" wire:model="otp" class="form-control h-auto py-7 px-6 border-0 rounded-lg font-size-h6"  placeholder="OTP" />
                </div>
                <!--end::Form Group-->

            </div>

            <div class="text-center">
                <button class="btn btn-primary font-weight-bolder font-size-h6 pl-5 pr-8 py-4 my-3" type="submit">
                        <span class="spinner spinner-right spinner-warning ml-7 mb-1"  wire:loading wire:target="transfer"></span>
                        Transfer
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
                    </span>
                </button>
            </div>
            <!--end: Wizard Actions-->

        </form>
        <!--end::Form-->
        @endif
    </div>
</div>
