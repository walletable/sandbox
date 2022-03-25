<div>
    <!-- Because you are alive, everything is possible. - Thich Nhat Hanh -->


    <!--begin::List Widget 11-->
    <div class="">
            @if ($section->name())
                
            @endif<h4 class="font-weight-bolder text-dark">{{ $section->name() }}</h4>
            <!--begin::Item-->
            @foreach ($section as $info)
                <!--begin::Item-->
                <div class="d-flex align-items-center bg-light-info rounded p-5 mb-2">
                    <!--begin::Icon-->
                    <span class="svg-icon svg-icon-info mr-5">
                        <span class="svg-icon svg-icon-lg">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/General/Attachment2.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <path d="M12,21 C7.02943725,21 3,16.9705627 3,12 C3,7.02943725 7.02943725,3 12,3 C16.9705627,3 21,7.02943725 21,12 C21,16.9705627 16.9705627,21 12,21 Z M12,16 C14.209139,16 16,14.209139 16,12 C16,9.790861 14.209139,8 12,8 C9.790861,8 8,9.790861 8,12 C8,14.209139 9.790861,16 12,16 Z" fill="#000000"/>
                                    <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="1"/>
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>
                    </span>
                    <!--end::Icon-->
                    <!--begin::Title-->
                    <div class="d-flex flex-column flex-grow-1 mr-2">
                        <span class="font-weight-bold text-dark-75 text-hover-primary font-size-lg mb-1">{{ $info->name() }}</span>
                    </div>
                    <!--end::Title-->
                    <!--begin::Lable-->
                    <span class="font-weight-bolder text-info py-1 font-size-lg">{{ $info }}</span>
                    <!--end::Lable-->
                </div>
                <!--end::Item-->
            @endforeach
    </div>
    <!--end::List Widget 11-->
</div>