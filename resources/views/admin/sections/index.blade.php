@extends('layouts.admin')

@section('styles')
<link rel="stylesheet" type="text/css" href="{{asset('dash-rtl/app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('dash-rtl/app-assets/vendors/css/forms/toggle/bootstrap-switch.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('dash-rtl/app-assets/vendors/css/forms/toggle/switchery.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('dash-rtl/app-assets/css-rtl/plugins/forms/switch.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('dash-rtl/app-assets/css-rtl/core/colors/palette-switch.css')}}">
   <style>
        div.dataTables_wrapper div.dataTables_filter {
            text-align: right;
            float: left;
        }
        </style>
@endsection

@section('content')

<section id="configuration">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">{{$page_name}}</h4>
            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
            <div class="heading-elements">
              <ul class="list-inline mb-0">
                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                <li><a data-action="close"><i class="ft-x"></i></a></li>
              </ul>
            </div>
          </div>
          <div class="card-content collapse show">
            <div class="card-body card-dashboard">
              <table class="table table-striped table-bordered zero-configuration">
                <thead>
                  <tr>

                    <th>#</th>
                    <th>@lang('dashboard.sec-name')</th>
                    <th>@lang('dashboard.sec-image')</th>
                    <th>@lang('dashboard.sec-slug')</th>
                    <th>@lang('dashboard.sec-created_at')</th>
                    <th>@lang('dashboard.actions')</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse ( $sections as $key=>$section )
                        <tr id="{{$section->id}}">
                            <td>{{ $key+=1 }}</td>
                            <td>{{  app()->getLocale() =='ar' ? $section->name_ar : $section->name_he  }} </td>
                            <td>
                                <span onclick="this.parentElement.style.display='none'" class="closebtn"></span>
                                <img  src="{{ asset('images/sections/'.$section->image) }}" class="rounded" width="50" height="50" onclick="myFunction(this);" data-toggle="modal" data-target=".bd-example-modal-lg"/>
                            </td>
                            <td>{{$section->slug}}</td>
                            <td>{{ $section->created_at }}</td>

                            <td>
                                <form action="javascript:void(0)" method="post">
                                    @csrf
                                    <button data-id="{{ $section->id }}" data-name="{{$section->title}}" data-toggle="tooltip" data-placement="top" title="" data-original-title="حذف القسم"  class="btn  btn-danger del">
                                        <i class="la la-trash-o"></i>
                                    </button>
                                    <a href="{{route('sections.edit',[$section->id])}}" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="تعديل القسم" ><i class="la la-edit"></i></a>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" align="center">@lang('dashboard.notfound')</td>
                        </tr>
                    @endforelse
                </tbody>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>@lang('dashboard.sec-name')</th>
                        <th>@lang('dashboard.sec-image')</th>
                        <th>@lang('dashboard.sec-slug')</th>
                        <th>@lang('dashboard.sec-created_at')</th>
                        <th>@lang('dashboard.actions')</th>
                      </tr>
                </tfoot>
              </table>
              <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg ">
                  <div class="modal-content">
                    <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>
                    <img id="expandedImg" style="width:100%">
                    <div id="imgtext"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@stop

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="{{asset('dash-rtl/app-assets/vendors/js/tables/datatable/datatables.min.js')}}" type="text/javascript"></script>
<script src="{{asset('dash-rtl/app-assets/js/scripts/tables/datatables/datatable-basic.js')}}" type="text/javascript"></script>
<script src="{{asset('dash-rtl/app-assets/vendors/js/forms/toggle/bootstrap-switch.min.js')}}" type="text/javascript"></script>
<script src="{{asset('dash-rtl/app-assets/vendors/js/forms/toggle/bootstrap-checkbox.min.js')}}" type="text/javascript"></script>
<script src="{{asset('dash-rtl/app-assets/vendors/js/forms/toggle/switchery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('dash-rtl/app-assets/js/scripts/forms/switch.js')}}" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
   var t = $('.table').DataTable({

        "oLanguage": {

        "sSearch": " ابحث :",
        "sPrevious": " التالي :",
        "sInfo": "حصلت على إجمالي _TOTAL_ صفوف للعرض (_START_ من _END_)",

        "sLengthMenu": 'عرض  <select>'+
            '<option value="10">10</option>'+
            '<option value="20">20</option>'+
            '<option value="30">30</option>'+
            '<option value="40">40</option>'+
            '<option value="50">50</option>'+
            '<option value="-1">All</option>'+
            '</select>  سجلات ' ,

            "oPaginate":{
                "sNext" : "التالي",
                "sPrevious" : "السابق",
            }

        }



    });
</script>
<script>
$(".del").on('click', function() {


    var id  = $(this).data("id");
    var name= $(this).data("name");

    Swal.fire({
        type:'info',
        icon:'info',
        title: "هل انتا متأكد؟",
        text: "سوف تقوم بحذف الدولة : " +name,
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: '#DD6B55',
        confirmButtonText: 'نعم, متأكد!',
        cancelButtonText: "لا, الغي العملية!"
    }).then((result) => {
            if (result['isConfirmed']){


                $.ajax({

                    url:"sections/"+id,
                    method: "delete",
                    data: {
                        _token: $('input[name="_token"]').val(),
                    },
                    success: response => {

                        Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: ' تم حذف الصفقة'+name,
                                showConfirmButton: false,
                                timer: 1500
                        });

                        $(`#${id}`).remove();
                    }

                });

            } else {

              return false;
            }

        });

});
</script>
<script>
    function myFunction(imgs) {
      var expandImg = document.getElementById("expandedImg");
      var imgText = document.getElementById("imgtext");
      expandImg.src = imgs.src;
      imgText.innerHTML = imgs.alt;
      expandImg.parentElement.style.display = "block";
    }
</script>
@endsection
