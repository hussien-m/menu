<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
    <meta name="keywords" content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
    <meta name="author" content="PIXINVENT">
    @php
        $siteName= \App\Models\Setting::get();
    @endphp
    <title>
        {{ $siteName[0]->site_name }} | تسجيل الدخول الادارة
    </title>
    <link rel="apple-touch-icon" href="{{asset('dash-rtl/')}}/app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('dash-rtl/')}}/app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
          rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
          rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('dash-rtl/')}}/app-assets/css-rtl/vendors.css">
    <link rel="stylesheet" type="text/css" href="{{asset('dash-rtl/')}}/app-assets/vendors/css/forms/icheck/icheck.css">
    <link rel="stylesheet" type="text/css" href="{{asset('dash-rtl/')}}/app-assets/vendors/css/forms/icheck/custom.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN MODERN CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('dash-rtl/')}}/app-assets/css-rtl/app.css">
    <link rel="stylesheet" type="text/css" href="{{asset('dash-rtl/')}}/app-assets/css-rtl/custom-rtl.css">
    <!-- END MODERN CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('dash-rtl/')}}/app-assets/css-rtl/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="{{asset('dash-rtl/')}}/app-assets/css-rtl/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="{{asset('dash-rtl/')}}/app-assets/css-rtl/pages/login-register.css">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('dash-rtl/')}}/assets/css/style-rtl.css">
    <!-- END Custom CSS-->
</head>
<body class="vertical-layout vertical-menu 1-column  bg-cyan bg-lighten-2 menu-expanded fixed-navbar"
      data-open="click" data-menu="vertical-menu" data-col="1-column">
<!-- fixed-top-->

<!-- ////////////////////////////////////////////////////////////////////////////-->
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <section class="flexbox-container">
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <div class="col-md-4 col-10 box-shadow-2 p-0">
                        <div class="card border-grey border-lighten-3 m-0">
                            <div class="card-header border-0">
                                <div class="card-title text-center">
                                    <img src="{{asset('dash-rtl/app-assets/images/logo/logo.png')}}" height="200" alt="branding logo">
                                </div>
                                <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                                    <span>تسجيل الدخول </span>
                                </h6>
                            </div>
                            <div class="card-content">

                                   {{-- @include("dashboard.erros") --}}

                                    {{-- Flash Message --}}
                                    @error('email')
                                        <div class="alert alert-warning alert-dismissable">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                            {{ $message }}
                                        </div>
                                    @enderror

                                <div class="card-body">
                                    <form class="form-horizontal" action="{{route('login')}}" novalidate method="post">
                                        @csrf
                                        <fieldset class="form-group position-relative has-icon-left">
                                            <input type="text" name="email" class="form-control input-lg" id="user-name" placeholder="البريد الالكتروني"
                                                   tabindex="1" required data-validation-required-message="الرجاء ادخال البريد الالكتروني" value="{{old('email')}}">
                                            <div class="form-control-position">
                                                <i class="ft-user"></i>
                                            </div>
                                            <div class="help-block font-small-3"></div>
                                        </fieldset>
                                        <fieldset class="form-group position-relative has-icon-left">
                                            <input type="password" name="password" class="form-control input-lg" id="password" placeholder="كلمة المرور"
                                                   tabindex="2" required data-validation-required-message="الرجاء ادخال كلمة المرور">
                                            <div class="form-control-position">
                                                <i class="la la-key"></i>
                                            </div>
                                            <div class="help-block font-small-3"></div>
                                        </fieldset>
                                        <div class="form-group row">
                                            <div class="col-md-6 col-12 text-center text-md-left">
                                                <fieldset>
                                                    <input type="checkbox" name="remember-me" id="remember_me" class="chk-remember">
                                                    <label for="remember_me"> تذكرني</label>
                                                </fieldset>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-danger btn-block btn-lg"><i class="ft-unlock"></i> دخــــول</button>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->

<!-- BEGIN VENDOR JS-->
<script src="{{asset('dash-rtl/')}}/app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<script src="{{asset('dash-rtl/')}}/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js"
        type="text/javascript"></script>
<script src="{{asset('dash_rtl/')}}/app-assets/vendors/js/forms/icheck/icheck.min.js" type="text/javascript"></script>
<!-- END PAGE VENDOR JS-->
<!-- BEGIN MODERN JS-->
<script src="{{asset('dash-rtl/')}}/app-assets/js/core/app-menu.js" type="text/javascript"></script>
<script src="{{asset('dash-rtl/')}}/app-assets/js/core/app.js" type="text/javascript"></script>
<script src="{{asset('dash-rtl/')}}/app-assets/js/scripts/customizer.js" type="text/javascript"></script>
<!-- END MODERN JS-->
<!-- BEGIN PAGE LEVEL JS-->
<script src="{{asset('dash-rtl/')}}/app-assets/js/scripts/forms/form-login-register.js" type="text/javascript"></script>
<!-- END PAGE LEVEL JS-->
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
</body>
</html>
