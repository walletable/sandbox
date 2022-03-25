<x-layouts.auth>
	<x-slot name="pageTitle">
        Verify Email | {{ config('app.name') }}
    </x-slot>
	<x-slot name="title">
        {{ config('app.name') }}
    </x-slot>
	<x-slot name="padding"></x-slot>

    <div class="d-flex flex-column-fluid flex-center">


        <!--begin::Tiles Widget 22-->
        <div class="card card-custom bgi-no-repeat gutter-b" style="height: 250px; background-color: #1B283F; background-position: calc(100% + 0.5rem) calc(100% + 0.5rem); background-size: 100% auto; background-image: url(assets/media/svg/patterns/rhone-2.svg)">
            <!--begin::Body-->
            <div class="card-body">
                @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('A fresh verification link has been sent to your email address.') }}
                    </div>
                @endif
                <form class="d-none" id="resend-form" method="POST" action="{{ route('verification.resend') }}">
                    @csrf
                </form>
                <h3 class="text-white font-weight-bolder">{{ __('Verify Your Email Address') }}</h3>
                <p class="text-muted font-size-lg mt-5 mb-10">
                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                </p>
                <a  href="{{ route('verification.resend') }}" onclick="event.preventDefault(); document.getElementById('resend-form').submit();" class="btn btn-link btn-link-warning font-weight-bold">{{ __('Click here to request another') }}
                <span class="svg-icon svg-icon-lg svg-icon-warning">
                    <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg-->
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <polygon points="0 0 24 0 24 24 0 24" />
                            <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1" />
                            <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
                        </g>
                    </svg>
                    <!--end::Svg Icon-->
                </span></a>
            </div>
            <!--end::Body-->
        </div>
        <!--end::Tiles Widget 22-->
    </div>
</x-layout.auth>