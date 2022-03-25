<x-layouts.app>

    <!--begin::Nav Panel Widget 2-->
    <div class="card card-custom gutter-b ml-2">
        <!--begin::Body-->
        <div class="card-body">
            <!--begin::Wrapper-->
            <div class="d-flex justify-content-between flex-column pt-4 h-100">
                <!--begin::Container-->
                <div class="pb-5">
                    <!--begin::Header-->
                    <div class="d-flex flex-column flex-center">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-75 symbol-circle symbol-success overflow-hidden">
                            <span class="symbol-label">
                                <img src="{{ $transaction->image ?? '/assets/media/svg/icons/Navigation/Exchange.svg' }}" class="h-100 align-self-center"/>
                            </span>
                        </div>
                        <!--end::Symbol-->
                        <!--begin::Username-->
                        <span class="card-title font-weight-bolder text-dark-75 text-hover-primary font-size-h4 m-0 pt-7">{{ $transaction->title }}</span>
                        <span class="badge badge-{{ $transaction->type === 'debit' ? 'danger' : 'success' }} px-4 py-2 font-size-lg text-white">
                            {{ $transaction->amount }}
                        </span>
                        <!--end::Username-->
                        {{-- <!--begin::Info-->
                        <div class="font-weight-bold text-dark-50 font-size-sm pb-6">Grade 8, AE3 Student</div>
                        <!--end::Info--> --}}
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="pt-1">
                        <!--begin::Text-->
                        <p class="text-dark-75 text-center font-weight-nirmal font-size-lg m-0">{{ $transaction->remarks }}</p>
                        <!--end::Text-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--eng::Container-->
                {{-- <!--begin::Footer-->
                <div class="d-flex flex-center" id="kt_sticky_toolbar_chat_toggler_1" data-toggle="tooltip" title="" data-placement="right" data-original-title="Chat Example">
                    <button class="btn btn-primary font-weight-bolder font-size-sm py-3 px-14" data-toggle="modal" data-target="#kt_chat_modal">Write a Message</button>
                </div>
                <!--end::Footer--> --}}
            </div>
            <!--end::Wrapper-->

            @foreach ($transaction->details as $section)
                <x-transaction.section :section="$section" :transaction="$transaction" >
                </x-transaction.section>
            @endforeach

            <p class="text-dark-75 text-center font-weight-nirmal font-size-lg mt-4">Session: {{ $transaction->session }}</p>
            <p class="text-dark-75 text-center font-weight-bolder font-size-lg mt-2">Data & Time: {{ $transaction->created_at->format('M d Y, h:i A') }}</p>
        </div>
        <!--end::Body-->
    </div>
    <!--end::Nav Panel Widget 2-->
</x-layouts.app>