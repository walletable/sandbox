<x-layouts.auth>
	<x-slot name="pageTitle">
        Login | {{ config('app.name') }}
    </x-slot>
	<x-slot name="title">
        {{ config('app.name') }}
    </x-slot>
					<div class="d-flex flex-column-fluid flex-center">
						<!--begin::Signin-->
						<div class="login-form login-signin">
							<!--begin::Form-->
							<form class="form" novalidate="novalidate" method="post" action="{{ route('login') }}" >
								@csrf
								<!--begin::Title-->
								<div class="pb-13 pt-lg-0 pt-5">
									<span class="font-weight-bolder text-dark font-size-h3 font-size-h1-lg">Welcome back</span><br>
									<span class="text-muted font-weight-bold font-size-h4">Not a user?
									<a href="{{ route('register') }}" class="text-primary font-weight-bolder">Create an Account</a></span>
								</div>
								<!--begin::Title-->
								<!--begin::Form group-->
								<div class="form-group">
									<label class="font-size-h6 font-weight-bolder text-dark">Email</label>
									<input class="form-control form-control-solid h-auto py-6 px-6 rounded-lg @error('email') is-invalid @enderror" value="{{ old('email') }}" type="email" placeholder="Enter Email" name="email" autocomplete="off" />

									@error('email')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
								<!--end::Form group-->
								<!--begin::Form group-->
								<div class="form-group">
									<div class="d-flex justify-content-between mt-n5">
										<label class="font-size-h6 font-weight-bolder text-dark pt-5">Password</label>

										@if (Route::has('password.request'))
										<a href="{{ route('password.request') }}" class="text-primary font-size-h6 font-weight-bolder text-hover-primary pt-5">Forgot Password ?</a>
										@endif
									</div>
									<input class="form-control form-control-solid h-auto py-6 px-6 rounded-lg @error('password') is-invalid @enderror" value="{{ old('password') }}" type="password" placeholder="Enter Password" name="password" autocomplete="off" />

									@error('password')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
								<!--end::Form group-->
								<!--begin::Form group-->
								<div class="form-group">
									<label class="checkbox mb-0">
										<input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}/>
										<span></span>
										<div class="ml-2">Remember Me</div>
									</label>
								</div>
								<!--end::Form group-->
								<!--begin::Action-->
								<div class="pb-lg-0 pb-5">
									<button type="submit" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">Sign In</button>
								</div>
								<!--end::Action-->
							</form>
							<!--end::Form-->
						</div>
						<!--end::Signin-->
					</div>
</x-layout.auth>