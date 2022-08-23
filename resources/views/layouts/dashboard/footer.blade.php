    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <footer class="footer footer-static footer-light navbar-border navbar-shadow">
        <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
            <span class="float-md-left d-block d-md-inline-block">&copy; {{date("Y")}} <a
                    class="text-bold-800 grey darken-2"
                    href="https://fb.com/alfeqawy.h" target="_blank">{{ $setting->site_name }}
                </a>, جميع الحقوق محفوظة. </span>
            <span class="float-md-right d-block d-md-inline-blockd-none d-lg-block">Hussien Mohamed <i
                    class="ft-heart pink"></i></span>
        </p>
    </footer>

    <script src="{{ asset('/dash-rtl/app-assets/vendors/js/vendors.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('dash-rtl/app-assets/vendors/js/extensions/toastr.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/dash-rtl/app-assets/js/core/app-menu.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/dash-rtl/app-assets/js/core/app.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/dash-rtl/app-assets/js/scripts/customizer.js') }}" type="text/javascript"></script>
    <script src="{{ asset('dash-rtl/app-assets/js/scripts/extensions/toastr.js') }}" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        @if (Session::has('message'))

        toastr.options = {
            "debug": true,
            "positionClass": "toast-top-center",
            "onclick": null,
            "fadeIn": 300,
            "fadeOut": 1000,
            "timeOut": 5000,
            "extendedTimeOut": 1000
            }
            var type = "{{ Session::get('type', 'info') }}";
            switch (type) {
                case 'info':
                    toastr.info("{{ Session::get('message') }}");
                    break;
                case 'warning':
                    toastr.warning("{{ Session::get('message') }}");
                    break;
                case 'success':
                    toastr.success("{{ Session::get('message') }}");
                    break;
                case 'error':
                    toastr.error("{{ Session::get('message') }}");
                    break;
            }
        @endif
    </script>

<script>
    $(".clearCache").on('click', function() {

        Swal.fire({
            type:'info',
            icon:'info',
            title: "هل انتا متأكد؟",
            text: "سوف تقوم بحذف كاش الموقع بشكل كامل : ",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: '#DD6B55',
            confirmButtonText: 'نعم, متأكد!',
            cancelButtonText: "لا, الغي العملية!"
        }).then((result) => {
                if (result['isConfirmed']){

                    $.ajax({

                        url:"clear-cache/",
                        method: "get",
                        data: {
                            _token: $('input[name="_token"]').val(),
                        },
                        success: response => {

                            Swal.fire({
                                    position: 'center',
                                    icon: 'success',
                                    title: ' تم حذف الكاش',
                                    showConfirmButton: false,
                                    timer: 1500
                            });
                        }

                    });

                } else {

                  return false;
                }

            });

    });
    </script>

    @yield('scripts')

</body>

</html>
