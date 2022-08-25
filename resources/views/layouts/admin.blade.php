@include('layouts.dashboard.head')

<body class="vertical-layout vertical-menu-modern 2-columns  menu-expanded fixed-navbar" data-open="click"
    data-menu="vertical-menu-modern" data-col="2-columns">
    <!-- fixed-top-->
    @include('layouts.dashboard.nav')
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    @include('layouts.dashboard.sidebar')

    <div class="app-content content">
        <div class="content-wrapper">

            @if( Route::current()->getName() != "admin.dashbaord")
                @include('layouts.dashboard.camp')
            @endif

            <div class="content-body">
                @yield('content')
            </div>
        </div>
    </div>
@include('layouts.dashboard.footer')

