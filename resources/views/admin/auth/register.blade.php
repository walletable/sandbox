<x-admin.layouts.auth>
	<x-slot name="pageTitle">
        Login | {{ config('app.name') }}
    </x-slot>
	<x-slot name="title">
        {{ config('app.name') }}
    </x-slot>
					<div class="d-flex flex-column-fluid flex-center">
						<!--begin::Signup-->
						<div class="login-form login-signin">
							<!--begin::Form-->
							<form class="form" novalidate="novalidate" method="post" action="{{ route('admin.register') }}" >
                                @csrf
								<!--begin::Title-->
								<div class="pb-13 pt-lg-0 pt-5">
									<h3 class="font-weight-bolder text-dark font-size-h4 font-size-h1-lg">Sign Up</h3>
									{{-- <p class="text-muted font-weight-bold font-size-h4">Enter your details to create your account</p> --}}
								</div>
								<!--end::Title-->
								<!--begin::Form group-->
								<div class="form-group">
									<input class="form-control form-control-solid h-auto py-6 px-6 rounded-lg font-size-h6 @error('lastname') is-invalid @enderror" value="{{ old('lastname') }}" type="text" placeholder="Surname" name="lastname" autocomplete="lastname" />

									@error('lastname')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
								<!--end::Form group-->
								<!--begin::Form group-->
								<div class="form-group">
									<input class="form-control form-control-solid h-auto py-6 px-6 rounded-lg font-size-h6 @error('firstname') is-invalid @enderror" value="{{ old('firstname') }}" type="text" placeholder="Firstname" name="firstname" autocomplete="firstname" />

									@error('firstname')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
								<!--end::Form group-->
								<!--begin::Form group-->
								<div class="form-group">
									<input class="form-control form-control-solid h-auto py-6 px-6 rounded-lg font-size-h6 @error('middlename') is-invalid @enderror" value="{{ old('middlename') }}" type="text" placeholder="Middlename" name="middlename" autocomplete="middlename" />

									@error('middlename')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
								<!--end::Form group-->
								<!--begin::Form group-->
								<div class="form-group">
									<input class="form-control form-control-solid h-auto py-6 px-6 rounded-lg font-size-h6 @error('email') is-invalid @enderror" value="{{ old('email') }}" type="email" placeholder="Email" name="email" autocomplete="email" />

									@error('email')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
								<!--end::Form group-->
								<!--begin::Form group-->
								<div class="form-group">
									<input class="form-control form-control-solid h-auto py-6 px-6 rounded-lg font-size-h6 @error('mobile') is-invalid @enderror" value="{{ old('mobile') }}" type="tel" placeholder="Mobile" name="mobile" autocomplete="mobile" />

									@error('mobile')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
								<!--end::Form group-->
								<!--begin::Form group-->
								<div class="form-group">
									<input class="form-control form-control-solid h-auto py-6 px-6 rounded-lg font-size-h6 @error('password') is-invalid @enderror" type="password" placeholder="Password" name="password" autocomplete="off" />

									@error('password')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
								<!--end::Form group-->
								<!--begin::Form group-->
								<div class="form-group">
									<input class="form-control form-control-solid h-auto py-6 px-6 rounded-lg font-size-h6 @error('password_confirmation') is-invalid @enderror" type="password" placeholder="Confirm password" name="password_confirmation" autocomplete="off" />

									@error('password_confirmation')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
								<!--end::Form group-->
								<!--begin::Form group-->
								<div class="form-group">
                                    <span></span>
                                    <div class="ml-2">By clicking <strong>Sign Up</strong> You Agree to the
                                    <a href="#">terms and conditions</a>.</div>
								</div>
								<!--end::Form group-->
								<!--begin::Form group-->
								<div class="form-group d-flex flex-wrap pb-lg-0 pb-3">
									<button type="submit" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-4">Sign Up</button>
								</div>
								<!--end::Form group-->
							</form>
							<!--end::Form-->
						</div>
						<!--end::Signup-->
					</div>
</x-admin.layout.auth>