<x-layouts.app>

	<div class="row">
		<div class="col-xl-6">
			<div class="card card-custom bg-wallet card-stretch gutter-b">
				{{-- Success is as dangerous as failure. --}}
				<!--begin::Header-->
				<div class="card-header border-0 py-5">
					<span class="svg-icon svg-icon-2x svg-icon-white">
						<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
							<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
								<rect x="0" y="0" width="24" height="24"/>
								<circle fill="#000000" opacity="0.3" cx="20.5" cy="12.5" r="1.5"/>
								<rect fill="#000000" opacity="0.3" transform="translate(12.000000, 6.500000) rotate(-15.000000) translate(-12.000000, -6.500000) " x="3" y="3" width="18" height="7" rx="1"/>
								<path d="M22,9.33681558 C21.5453723,9.12084552 21.0367986,9 20.5,9 C18.5670034,9 17,10.5670034 17,12.5 C17,14.4329966 18.5670034,16 20.5,16 C21.0367986,16 21.5453723,15.8791545 22,15.6631844 L22,18 C22,19.1045695 21.1045695,20 20,20 L4,20 C2.8954305,20 2,19.1045695 2,18 L2,6 C2,4.8954305 2.8954305,4 4,4 L20,4 C21.1045695,4 22,4.8954305 22,6 L22,9.33681558 Z" fill="#000000"/>
							</g>
						</svg>
						<!--end::Svg Icon-->
					</span>
					<div class="card-toolbar">
						{!! Auth::user()->status->render('<span class="label label-lg label-light-%theme% label-inline font-weight-bold">%name%</span>') !!}
					</div>
				</div>
				<!--end::Header-->
				<!--begin::ody-->
				<div class="card-body">
					<div class="h-15"></div>
					<span class="card-title font-weight-bolder text-white align-bottom display-3 mb-0 mt-6 d-block">{{ $wallet->amount }}</span>
				</div>
				<!--end::Body-->
				<div class="card-header py-5 align-bottom text-white">
					<div style="height: 100%;"><br>
						<small><em>Powered By</em> <strong>{{ config('app.name') }}</strong></small>
					</div>
					<div class="card-toolbar">
						<a  href="{{ route('fund.transfer') }}" class="btn btn-primary font-weight-bolder font-size-sm mr-3">Send Fund</a>
					</div>
				</div>
				{{-- <div class="font-weight-bolder font-size-lg align-bottom text-white p-5">
					<small><em>Powered By</em> <strong>{{ $wallet->providerName() }}</strong></small>
					<div class="card-toolbar">
						<button class="btn btn-primary font-weight-bolder font-size-sm mr-3">Add Fund</button>
					</div>
				</div> --}}
			</div>
		</div>
		<div class="col-xl-6">

			<div class="row d-none d-md-flex">

				<div class="col-6 col-xl-6">
					<!--begin::Stats Widget 26-->
					<div class="card card-custom bg-light-primary card-stretch gutter-b">
						<!--begin::ody-->
						<div class="card-body">
							<span class="svg-icon svg-icon-2x svg-icon-primary">
								<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<rect x="0" y="0" width="24" height="24"/>
										<path d="M2,6 L21,6 C21.5522847,6 22,6.44771525 22,7 L22,17 C22,17.5522847 21.5522847,18 21,18 L2,18 C1.44771525,18 1,17.5522847 1,17 L1,7 C1,6.44771525 1.44771525,6 2,6 Z M11.5,16 C13.709139,16 15.5,14.209139 15.5,12 C15.5,9.790861 13.709139,8 11.5,8 C9.290861,8 7.5,9.790861 7.5,12 C7.5,14.209139 9.290861,16 11.5,16 Z" fill="#000000" opacity="0.3" transform="translate(11.500000, 12.000000) rotate(-345.000000) translate(-11.500000, -12.000000) "/>
										<path d="M2,6 L21,6 C21.5522847,6 22,6.44771525 22,7 L22,17 C22,17.5522847 21.5522847,18 21,18 L2,18 C1.44771525,18 1,17.5522847 1,17 L1,7 C1,6.44771525 1.44771525,6 2,6 Z M11.5,16 C13.709139,16 15.5,14.209139 15.5,12 C15.5,9.790861 13.709139,8 11.5,8 C9.290861,8 7.5,9.790861 7.5,12 C7.5,14.209139 9.290861,16 11.5,16 Z M11.5,14 C12.6045695,14 13.5,13.1045695 13.5,12 C13.5,10.8954305 12.6045695,10 11.5,10 C10.3954305,10 9.5,10.8954305 9.5,12 C9.5,13.1045695 10.3954305,14 11.5,14 Z" fill="#000000"/>
									</g>
								</svg>
								<!--end::Svg Icon-->
							</span>
							<span class="card-title font-weight-bolder text-dark-50 font-size-h3 mb-0 mt-6 d-block">{{ $wallet->amount }}</span>
							<span class="font-weight-bolder font-size-lg text-dark-50">Available Balance</span>
						</div>
						<!--end::Body-->
					</div>
					<!--end::Stats Widget 26-->
				</div>
				
				<div class="col-6 col-xl-6">
					<!--begin::Stats Widget 26-->
					<div class="card card-custom bg-light-danger card-stretch gutter-b">
						<!--begin::ody-->
						<div class="card-body">
							<span class="svg-icon svg-icon-2x svg-icon-danger">
								<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<rect x="0" y="0" width="24" height="24"/>
										<path d="M2,6 L21,6 C21.5522847,6 22,6.44771525 22,7 L22,17 C22,17.5522847 21.5522847,18 21,18 L2,18 C1.44771525,18 1,17.5522847 1,17 L1,7 C1,6.44771525 1.44771525,6 2,6 Z M11.5,16 C13.709139,16 15.5,14.209139 15.5,12 C15.5,9.790861 13.709139,8 11.5,8 C9.290861,8 7.5,9.790861 7.5,12 C7.5,14.209139 9.290861,16 11.5,16 Z" fill="#000000" opacity="0.3" transform="translate(11.500000, 12.000000) rotate(-345.000000) translate(-11.500000, -12.000000) "/>
										<path d="M2,6 L21,6 C21.5522847,6 22,6.44771525 22,7 L22,17 C22,17.5522847 21.5522847,18 21,18 L2,18 C1.44771525,18 1,17.5522847 1,17 L1,7 C1,6.44771525 1.44771525,6 2,6 Z M11.5,16 C13.709139,16 15.5,14.209139 15.5,12 C15.5,9.790861 13.709139,8 11.5,8 C9.290861,8 7.5,9.790861 7.5,12 C7.5,14.209139 9.290861,16 11.5,16 Z M11.5,14 C12.6045695,14 13.5,13.1045695 13.5,12 C13.5,10.8954305 12.6045695,10 11.5,10 C10.3954305,10 9.5,10.8954305 9.5,12 C9.5,13.1045695 10.3954305,14 11.5,14 Z" fill="#000000"/>
									</g>
								</svg>
								<!--end::Svg Icon-->
							</span>
							<span class="card-title font-weight-bolder text-dark-50 font-size-h3 mb-0 mt-6 d-block">{{ $debit_today }}</span>
							<span class="font-weight-bolder font-size-lg text-dark-50">Debits Today</span>
						</div>
						<!--end::Body-->
					</div>
					<!--end::Stats Widget 26-->
				</div>

			</div>
			<div class="row d-none d-md-flex">
				
				<div class="col-xl-6">
					<!--begin::Stats Widget 26-->
					<div class="card card-custom bg-light-success card-stretch gutter-b">
						<!--begin::ody-->
						<div class="card-body">
							<span class="svg-icon svg-icon-2x svg-icon-warning">
								<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<rect x="0" y="0" width="24" height="24"/>
										<path d="M2,6 L21,6 C21.5522847,6 22,6.44771525 22,7 L22,17 C22,17.5522847 21.5522847,18 21,18 L2,18 C1.44771525,18 1,17.5522847 1,17 L1,7 C1,6.44771525 1.44771525,6 2,6 Z M11.5,16 C13.709139,16 15.5,14.209139 15.5,12 C15.5,9.790861 13.709139,8 11.5,8 C9.290861,8 7.5,9.790861 7.5,12 C7.5,14.209139 9.290861,16 11.5,16 Z" fill="#000000" opacity="0.3" transform="translate(11.500000, 12.000000) rotate(-345.000000) translate(-11.500000, -12.000000) "/>
										<path d="M2,6 L21,6 C21.5522847,6 22,6.44771525 22,7 L22,17 C22,17.5522847 21.5522847,18 21,18 L2,18 C1.44771525,18 1,17.5522847 1,17 L1,7 C1,6.44771525 1.44771525,6 2,6 Z M11.5,16 C13.709139,16 15.5,14.209139 15.5,12 C15.5,9.790861 13.709139,8 11.5,8 C9.290861,8 7.5,9.790861 7.5,12 C7.5,14.209139 9.290861,16 11.5,16 Z M11.5,14 C12.6045695,14 13.5,13.1045695 13.5,12 C13.5,10.8954305 12.6045695,10 11.5,10 C10.3954305,10 9.5,10.8954305 9.5,12 C9.5,13.1045695 10.3954305,14 11.5,14 Z" fill="#000000"/>
									</g>
								</svg>
								<!--end::Svg Icon-->
							</span>
							<span class="card-title font-weight-bolder text-dark-50 font-size-h3 mb-0 mt-6 d-block">{{ $credit_today }}</span>
							<span class="font-weight-bolder font-size-lg text-dark-50">Credits Today</span>
						</div>
						<!--end::Body-->
					</div>
					<!--end::Stats Widget 26-->
				</div>
				
				<div class="col-xl-6">
					<!--begin::Stats Widget 26-->
					<div class="card card-custom bg-light-info card-stretch gutter-b">
						<!--begin::ody-->
						<div class="card-body">
							<span class="svg-icon svg-icon-2x svg-icon-info">
								<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<polygon points="0 0 24 0 24 24 0 24"/>
										<rect fill="#000000" opacity="0.3" transform="translate(6.000000, 11.000000) rotate(-180.000000) translate(-6.000000, -11.000000) " x="5" y="5" width="2" height="12" rx="1"/>
										<path d="M8.29289322,14.2928932 C8.68341751,13.9023689 9.31658249,13.9023689 9.70710678,14.2928932 C10.0976311,14.6834175 10.0976311,15.3165825 9.70710678,15.7071068 L6.70710678,18.7071068 C6.31658249,19.0976311 5.68341751,19.0976311 5.29289322,18.7071068 L2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 C2.68341751,13.9023689 3.31658249,13.9023689 3.70710678,14.2928932 L6,16.5857864 L8.29289322,14.2928932 Z" fill="#000000" fill-rule="nonzero"/>
										<rect fill="#000000" opacity="0.3" transform="translate(18.000000, 13.000000) scale(1, -1) rotate(-180.000000) translate(-18.000000, -13.000000) " x="17" y="7" width="2" height="12" rx="1"/>
										<path d="M20.2928932,5.29289322 C20.6834175,4.90236893 21.3165825,4.90236893 21.7071068,5.29289322 C22.0976311,5.68341751 22.0976311,6.31658249 21.7071068,6.70710678 L18.7071068,9.70710678 C18.3165825,10.0976311 17.6834175,10.0976311 17.2928932,9.70710678 L14.2928932,6.70710678 C13.9023689,6.31658249 13.9023689,5.68341751 14.2928932,5.29289322 C14.6834175,4.90236893 15.3165825,4.90236893 15.7071068,5.29289322 L18,7.58578644 L20.2928932,5.29289322 Z" fill="#000000" fill-rule="nonzero" transform="translate(18.000000, 7.500000) scale(1, -1) translate(-18.000000, -7.500000) "/>
									</g>
								</svg>
								<!--end::Svg Icon-->
							</span>
							<span class="card-title font-weight-bolder text-dark-50 font-size-h3 mb-0 mt-6 d-block">{{ $transactions_today }}</span>
							<span class="font-weight-bolder font-size-lg text-dark-50">Today`s Transactions</span>
						</div>
						<!--end::Body-->
					</div>
					<!--end::Stats Widget 26-->
				</div>
			</div>
		
		</div>
	</div>

	<x-transaction.listing :transactions="$transactions">
		<x-slot name="toolbar">
			<a href="{{ route('transactions') }}" class="btn btn-primary font-weight-bolder mt-3 font-size-sm mr-3">View All</a>
		</x-slot>
	</x-transaction.listing>

</x-layout.app>