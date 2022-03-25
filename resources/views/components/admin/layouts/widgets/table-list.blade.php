<div>
    <!-- Let all your things have their places; let each part of your business have its time. - Benjamin Franklin -->
    <!--begin::Advance Table Widget 4-->
    <div class="card card-custom gutter-b">
        <!--begin::Header-->
        <div class="card-header border-0 py-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label font-weight-bolder text-dark">{{ $list_title }}</span>
                @isset($message) <span class="text-muted mt-3 font-weight-bold font-size-sm">{{ $message }}</span> @endif
            </h3>
            <div class="card-toolbar">
                {{ $toolbar ?? '' }}
            </div>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body pt-0 pb-3">
            <div class="tab-content">
                {{ $content }}
            </div>
        </div>
        <!--end::Body-->

        <!--begin::Header-->
        <div class="card-header border-0 py-5">
            <h3 class="card-title align-items-start flex-column">
            </h3>
            <div class="card-toolbar">
                {{ $pagination ?? '' }}
            </div>
        </div>
        <!--end::Header-->

    </div>
    <!--end::Advance Table Widget 4-->


</div>