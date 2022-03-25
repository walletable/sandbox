
		
		<script>

			Livewire.on('close_modals', modals => {


				modals.forEach( modal => {

					$('#'+modal).modal('hide');

				});

			});


			Livewire.on('remove_backdrops', () => {


					$('.modal-backdrop').hide();

			});

			Livewire.on('errors', errors => {


				toastr.options = {
					"closeButton": false,
					"debug": false,
					"newestOnTop": false,
					"progressBar": false,
					"positionClass": "toast-top-right",
					"preventDuplicates": false,
					"onclick": null,
					"showDuration": "1000",
					"hideDuration": "1000",
					"timeOut": "10000",
					"extendedTimeOut": "1000",
					"showEasing": "swing",
					"hideEasing": "linear",
					"showMethod": "fadeIn",
					"hideMethod": "fadeOut"
				};

				errors.forEach( message => {

					toastr.error( message );

				});

			});

			Livewire.on('successes', successes => {


				toastr.options = {
					"closeButton": false,
					"debug": false,
					"newestOnTop": false,
					"progressBar": false,
					"positionClass": "toast-top-right",
					"preventDuplicates": false,
					"onclick": null,
					"showDuration": "1000",
					"hideDuration": "1000",
					"timeOut": "5000",
					"extendedTimeOut": "1000",
					"showEasing": "swing",
					"hideEasing": "linear",
					"showMethod": "fadeIn",
					"hideMethod": "fadeOut"
				};

				successes.forEach( message => {

					toastr.success( message );

				});

			});

			Livewire.on('warnings', warnings => {


				toastr.options = {
					"closeButton": false,
					"debug": false,
					"newestOnTop": false,
					"progressBar": false,
					"positionClass": "toast-top-right",
					"preventDuplicates": false,
					"onclick": null,
					"showDuration": "1000",
					"hideDuration": "1000",
					"timeOut": "10000",
					"extendedTimeOut": "1000",
					"showEasing": "swing",
					"hideEasing": "linear",
					"showMethod": "fadeIn",
					"hideMethod": "fadeOut"
				};

				warnings.forEach( message => {

					toastr.warning( message );

				});

			});



			Livewire.on('success', success => {

                console.log(success);
				Swal.fire({
					title: success.title,
					text: success.message,
					icon: "success",
					showClass: {
						popup: 'animate__animated animate__fadeInUp'
					},
					hideClass: {
						popup: 'animate__animated animate__fadeOutDown'
					}
				});

			});



			Livewire.on('error', error => {


				Swal.fire({
					title: error.title,
					text: error.message,
					icon: "error",
					showClass: {
						popup: 'animate__animated animate__fadeInUp'
					},
					hideClass: {
						popup: 'animate__animated animate__fadeOutDown'
					}
				});

			});



			Livewire.on('warning', warning => {


				Swal.fire({
					title: warning.title,
					text: warning.message,
					icon: "warning",
					showClass: {
						popup: 'animate__animated animate__fadeInUp'
					},
					hideClass: {
						popup: 'animate__animated animate__fadeOutDown'
					}
				});

			});



			@if(session('success'))
				
				Swal.fire({
					title: '{!! session('success_title') ?? 'Yayy!' !!}',
					text: '{!! session('success') !!}',
					icon: "success",
					showClass: {
						popup: 'animate__animated animate__fadeInUp'
					},
					hideClass: {
						popup: 'animate__animated animate__fadeOutDown'
					}
				});

			@endif

			@if(session('error'))
				
				Swal.fire({
					title: '{!! session('error_title') ?? 'Oops!' !!}',
					text: '{!! session('error') !!}',
					icon: "error",
					showClass: {
						popup: 'animate__animated animate__fadeInUp'
					},
					hideClass: {
						popup: 'animate__animated animate__fadeOutDown'
					}
				});

			@endif

			@if(session('warning'))
				
				Swal.fire({
					title: '{!! session('warning_title') ?? 'Oops!' !!}',
					text: '{!! session('warning') !!}',
					icon: "warning",
					showClass: {
						popup: 'animate__animated animate__fadeInUp'
					},
					hideClass: {
						popup: 'animate__animated animate__fadeOutDown'
					}
				});

			@endif


		</script>