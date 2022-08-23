<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
        <h3 class="content-header-title mb-0 d-inline-block">{{$page_name}}</h3>
        <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    @if(!Request::is('admin'))
                    <li class="breadcrumb-item"><a href="#">@lang('dashboard.home')</a>
                    </li>
                    @endif
                    @if(@$old_page !=null)
                    <li class="breadcrumb-item"><a href="#" onclick="history.back()">{{$old_page}}</a>
                    </li>
                    @endif
                    <li class="breadcrumb-item active">
                        <span>{{$page_name }}</span>
                    </li>
                </ol>
            </div>
        </div>
    </div>


    @if($createRoute != url()->current())
        <div class="content-header-right col-md-6 col-12">
            <div class="dropdown float-md-right">
                <a href="{{$createRoute}}" class="btn btn-primary  round btn-glow px-2" type="button">@lang('dashboard.new_add')</a>
            </div>
        </div>
    @endif



</div>
