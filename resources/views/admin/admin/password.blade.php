@extends('layouts.admin')

@section('styles')
<link rel="stylesheet" type="text/css" href="{{asset('dash-rtl/app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
<style>
    .content-header-right{
        display:none;
    }
</style>
@endsection


@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title" id="horz-layout-basic">تغير كلمة المرور </h4>
                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                    </ul>
                </div>
            </div><br>
            <div class="card-content collpase show">
                <div class="card-body">
                    <form class="form form-horizontal" action="{{ route('admin.changePasswordPost') }}" method="post" >
                        @csrf
                        <div class="form-body">

                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="projectinput1">كلمة المرور الحالية: </label>
                                <div class="col-md-8">
                                    <input type="password" id="projectinput1" class="form-control" value="" placeholder="Old Password" name="current_password" required="">
                                </div>
                            </div><br>
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="projectinput2">كلمة المرور الجديدة : </label>
                                <div class="col-md-8">
                                    <input type="password" id="projectinput2" class="form-control" value="" placeholder="New Password" name="password" required="">
                                </div>
                            </div><br>
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="projectinput2">تاكيد كلمة المرور  : </label>
                                <div class="col-md-8">
                                    <input type="password" id="projectinput2" class="form-control" value="" placeholder="Confirm Password" name="password_confirmation" required="">
                                </div>
                            </div><br>
                            <div class="form-group row">
                                <div class="col-md-8 offset-3">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block"><i class="ft-navigation"></i>تحديث </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@stop

@section('scripts')
<script src="{{asset('dash-rtl/app-assets/vendors/js/tables/datatable/datatables.min.js')}}" type="text/javascript"></script>
<script src="{{asset('dash-rtl/app-assets/js/scripts/tables/datatables/datatable-basic.js')}}" type="text/javascript"></script>
@endsection
