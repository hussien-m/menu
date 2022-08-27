@extends('layouts.admin')

@section('styles')
<link rel="stylesheet" type="text/css" href="{{asset('dash-rtl/app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
<style>
    .content-header{
        display:none;
    }
</style>
@endsection


@section('content')

<div class="row">
    <div class="col-xl-4 col-lg-6 col-12">
      <div class="card pull-up">
        <div class="card-content">
          <div class="card-body">
            <div class="media d-flex">
              <div class="media-body text-left">
                <h3 class="info">{{ $sections->count() }}</h3>
                <h6><a href="{{ route('sections.index') }}">الاقسام</a></h6>
              </div>
              <div>
                <i class="icon-basket-loaded info font-large-2 float-right"></i>
              </div>
            </div>
            <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
              <div class="progress-bar bg-gradient-x-info" role="progressbar" style="width: {{ $sections->count() }}%" aria-valuenow="{{ $sections->count() }}" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-4 col-lg-6 col-12">
      <div class="card pull-up">
        <div class="card-content">
          <div class="card-body">
            <div class="media d-flex">
              <div class="media-body text-left">
                <h3 class="warning">{{ $meals->count() }}</h3>
                <h6><a href="{{ route('meals.index') }}">الوجبات</a></h6>
              </div>
              <div>
                <i class="icon-pie-chart warning font-large-2 float-right"></i>
              </div>
            </div>
            <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
              <div class="progress-bar bg-gradient-x-warning" role="progressbar" style="width: {{ $meals->count() }}%" aria-valuenow="{{ $meals->count() }}" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-4 col-lg-6 col-12">
      <div class="card pull-up">
        <div class="card-content">
          <div class="card-body">
            <div class="media d-flex">
              <div class="media-body text-left">
                <h3 class="success">{{ $users->count() }}</h3>
                <h6>المستخدمين</h6>
              </div>
              <div>
                <i class="icon-user-follow success font-large-2 float-right"></i>
              </div>
            </div>
            <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
              <div class="progress-bar bg-gradient-x-success" role="progressbar" style="width: {{ $users->count() }}%" aria-valuenow="{{ $users->count() }}" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div id="recent-transactions" class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">أخر الوجبات المضافة</h4>
          <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
          <div class="heading-elements">
            <ul class="list-inline mb-0">
              <li><a class="btn btn-sm btn-danger box-shadow-2 round btn-min-width pull-right" href="{{ route('meals.index') }}" target="_blank">ملخص الوجبات</a></li>
            </ul>
          </div>
        </div>
        <div class="card-content">
          <div class="table-responsive">
            <table id="recent-orders" class="table table-hover table-xl mb-0">
              <thead>
                <tr>
                  <th class="border-top-0">اسم الوجبة</th>
                  <th class="border-top-0">القسم</th>
                  <th class="border-top-0">الصورة</th>
                  <th class="border-top-0">السعر</th>
                  <th class="border-top-0">التاريخ</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($meals as $key=>$meal)
                <tr id="{{$meal->id}}">
                    <td>{{  app()->getLocale() =='ar' ? $meal->name_ar : $meal->name_he  }} </td>
                    <td><button type="button" class="btn btn-sm btn-outline-info round">{{app()->getLocale() =='ar' ? $meal->section->name_ar : $meal->section->name_he }}</button></td>
                    <td> <img  src="{{ asset('images/meals/'.$meal->image) }}" class="rounded" width="50" height="50" onclick="myFunction(this);" data-toggle="modal" data-target=".bd-example-modal-lg" />
                    </td>
                    <td>{{$meal->price}}</td>
                    <td>{{ $meal->created_at->diffForHumans() }}</td>
                </tr>
                @endforeach

            </tbody>
            </table>
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
