<nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-dark navbar-shadow">
    <div class="navbar-wrapper">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
          <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
          <li class="nav-item mr-auto">
            <a class="navbar-brand" href="index.html">
              <img class="brand-logo" alt="modern admin logo" src="{{asset('dash-rtl/app-assets/images/logo/logo.png')}}">
              <h3 class="brand-text">{{ $setting->site_name }}</h3>
            </a>
          </li>
          <li class="nav-item d-none d-md-block float-right"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="toggle-icon ft-toggle-right font-medium-3 white" data-ticon="ft-toggle-right"></i></a></li>
          <li class="nav-item d-md-none">
            <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="la la-ellipsis-v"></i></a>
          </li>
        </ul>
      </div>
      <div class="navbar-container content">
        <div class="collapse navbar-collapse" id="navbar-mobile">
          <ul class="nav navbar-nav mr-auto float-left">

          </ul>
          <ul class="nav navbar-nav float-right">
            <li class="dropdown dropdown-user nav-item">
              <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                <span class="mr-1">Hello,
                  <span class="user-name text-bold-700">{{Auth::user()->name}}</span>
                </span>
                <span class="avatar avatar-online">
                  <img src="{{asset('dash-rtl/app-assets/images/portrait/small/avatar-s-19.png')}}" alt="avatar"><i></i></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#"><i class="ft-user"></i> Edit Profile</a>
                <a class="dropdown-item" href="#"><i class="ft-mail"></i> My Inbox</a>
                <a class="dropdown-item" href="#"><i class="ft-check-square"></i> Task</a>
                <a class="dropdown-item" href="#"><i class="ft-message-square"></i> Chats</a>
                <div class="dropdown-divider"></div>
                <div class="text-center">
                    <form action="{{route('logout')}}" method="post">
                        @csrf
                        <button type="submit" class="ft-power btn btn-danger"> تسجيل خروج  </button>
                    </form>
                </div>

              </div>
            </li>
            <li class="dropdown dropdown-language nav-item"><a class="dropdown-toggle nav-link" id="dropdown-flag" href="#" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false"><i class="flag-icon flag-icon-gb"></i><span class="selected-language"></span></a>
              <div class="dropdown-menu" aria-labelledby="dropdown-flag"><a class="dropdown-item" href="#"><i class="flag-icon flag-icon-gb"></i> English</a>
                <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-fr"></i> French</a>
                <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-cn"></i> Chinese</a>
                <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-de"></i> German</a>
              </div>
            </li>
            <li class="dropdown dropdown-notification nav-item">
              <a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon ft-bell"></i>
                <span class="badge badge-pill badge-default badge-danger badge-default badge-up badge-glow">5</span>
              </a>
              <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                <li class="dropdown-menu-header">
                  <h6 class="dropdown-header m-0">
                    <span class="grey darken-2">الاشعارات</span>
                  </h6>
                  <span class="notification-tag badge badge-default badge-danger float-right m-0">5 جديد</span>
                </li>
                <li class="scrollable-container media-list w-100">
                  <a href="javascript:void(0)">
                    <div class="media">
                      <div class="media-left align-self-center"><i class="ft-plus-square icon-bg-circle bg-cyan"></i></div>
                      <div class="media-body">
                        <h6 class="media-heading">You have new order!</h6>
                        <p class="notification-text font-small-3 text-muted">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                        <small>
                          <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">30 minutes ago</time>
                        </small>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="dropdown-menu-footer"><a class="dropdown-item text-muted text-center" href="javascript:void(0)">عرض جميع الاشعارات</a></li>
              </ul>
            </li>
            <li class="dropdown dropdown-notification nav-item">
              <a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon ft-mail"> </i></a>
              <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                <li class="dropdown-menu-header">
                  <h6 class="dropdown-header m-0">
                    <span class="grey darken-2">الرسائل</span>
                  </h6>
                  <span class="notification-tag badge badge-default badge-warning float-right m-0">4 جديد</span>
                </li>
                <li class="scrollable-container media-list w-100">

                  <a href="javascript:void(0)">
                    <div class="media">
                      <div class="media-left">
                        <span class="avatar avatar-sm avatar-away rounded-circle">
                          <img src="{{asset('dash-rtl/app-assets/images/portrait/small/avatar-s-6.png')}}" alt="avatar"><i></i></span>
                      </div>
                      <div class="media-body">
                        <h6 class="media-heading">Eric Alsobrook</h6>
                        <p class="notification-text font-small-3 text-muted">We have project party this saturday.</p>
                        <small>
                          <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">last month</time>
                        </small>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="dropdown-menu-footer"><a class="dropdown-item text-muted text-center" href="javascript:void(0)">عرض جميع الرسائل</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
