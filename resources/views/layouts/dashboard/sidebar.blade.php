<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">



            <li class="{{ Request::is('admin/dashboard') ? 'open' : '' }} nav-item"><a href="#"><i class="la la-home"></i><span class="menu-title" data-i18n="nav.dash.main">الرئيسية</span></a>
            </li>
            <li class="navigation-header">
                <span style="color:#0D7091" data-i18n="nav.category.layouts"> قوائم اخرى</span><i class="la la-ellipsis-h ft-minus" data-toggle="tooltip" data-placement="right" data-original-title="Layouts"></i>
            </li>


            <li class="{{ Request::is('admin/settings') ? 'active':''}} nav-item"><a href="{{route('admin.settings')}}"><i class="la la-gear"></i><span class="menu-title" data-i18n="nav.dash.main">الاعدادات</span></a>
            </li>

            <li class="nav-item"><a href="#" class="clearCache"><i class="la la-remove"></i><span class="menu-title" data-i18n="nav.dash.main">مسح الكاش</span></a>
            </li>

        </ul>
    </div>
</div>

