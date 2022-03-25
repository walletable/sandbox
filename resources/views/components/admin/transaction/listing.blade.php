<div>
    <!-- It is not the man who has too little, but the man who craves more, that is poor. - Seneca -->
        {{-- <!--begin::List Widget 11-->
        <div class="card card-custom card-stretch gutter-b">
            <!--begin::Header-->
            <div class="card-header border-0">
                <h3 class="card-title font-weight-bolder text-dark">{{ $title ?? 'Transactions' }}</h3>
                <div class="card-toolbar">
                    {{ $toolbar ?? '' }}
                </div>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body pt-0">
            </div>
            <!--end::Body-->
        </div>
        <!--end::List Widget 11--> --}}

        <!--begin::Title-->
        <div class="mb-5 mt-10">
            <div class="row">
                <h3 class="col-8 font-weight-bolder text-dark display5">{{ $title ?? 'Transactions' }}</h3>
                <div class="col-4 text-right">
                    {{ $toolbar ?? '' }}
                </div>
            </div>
            <div class="text-muted font-weight-bold font-size-sm">Latest transactions</div>
        </div>
        <!--begin::Title-->
        @foreach ($transactions as $transaction)
            <!--begin::Item-->
            <div class="d-flex align-items-center mb-9 {{ $transaction->action === 'debit' ? 'bg-light-danger' : 'bg-light-success' }} rounded p-5">
                <!--begin::Icon-->
                <span class="svg-icon {{ $transaction->action === 'debit' ? 'svg-icon-danger' : 'svg-icon-success' }} mr-5">
                    <span class="svg-icon svg-icon-lg">
                        <!--begin::Svg Icon | path:assets/media/svg/icons/Home/Library.svg-->
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            @if ($transaction->action === 'debit')
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24"/>
                                    <rect fill="#000000" opacity="0.3" x="11" y="4" width="2" height="10" rx="1"/>
                                    <path d="M6.70710678,19.7071068 C6.31658249,20.0976311 5.68341751,20.0976311 5.29289322,19.7071068 C4.90236893,19.3165825 4.90236893,18.6834175 5.29289322,18.2928932 L11.2928932,12.2928932 C11.6714722,11.9143143 12.2810586,11.9010687 12.6757246,12.2628459 L18.6757246,17.7628459 C19.0828436,18.1360383 19.1103465,18.7686056 18.7371541,19.1757246 C18.3639617,19.5828436 17.7313944,19.6103465 17.3242754,19.2371541 L12.0300757,14.3841378 L6.70710678,19.7071068 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000003, 15.999999) scale(1, -1) translate(-12.000003, -15.999999) "/>
                                </g>
                            @else
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24"/>
                                    <rect fill="#000000" opacity="0.3" x="11" y="10" width="2" height="10" rx="1"/>
                                    <path d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z" fill="#000000" fill-rule="nonzero"/>
                                </g>
                            @endif
                        </svg>
                        <!--end::Svg Icon-->
                    </span>
                </span>
                <!--end::Icon-->
                <!--begin::Title-->
                <div class="d-flex flex-column flex-grow-1 mr-2">
                    <a href="#" class="font-weight-bold text-dark-75 text-hover-primary font-size-lg mb-1">{{ $transaction->title }}</a>
                    <span class="text-muted font-weight-bold">{{ $transaction->bank_name }}</span>
                </div>
                <!--end::Title-->
                <!--begin::Lable-->
                <span class="font-weight-bolder {{ $transaction->action === 'debit' ? 'text-danger' : 'text-success' }} py-1 font-size-lg">{{ $transaction->action === 'debit' ? '-' : '+' }}{{ display_money($transaction->amount) }}</span>
                <!--end::Lable-->
            </div>
            <!--end::Item-->
        @endforeach
</div>