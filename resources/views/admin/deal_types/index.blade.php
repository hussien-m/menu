@extends('layouts.admin')

@section('styles')
<link rel="stylesheet" type="text/css" href="{{asset('dash-rtl/app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
   <style>
        div.dataTables_wrapper div.dataTables_filter {
            text-align: right;
            float: left;
        }
    </style>
    <style>

        /* Style the images inside the grid */
       img {
          opacity: 0.8;
          cursor: pointer;
          border:1px solid #333
        }
         img:hover {
          opacity: 1;
        }

        /* Clear floats after the columns */
        .row:after {
          content: "";
          display: table;
          clear: both;
        }

        /* The expanding image container */
        .container {
          position: relative;
          display: none;
        }

        /* Expanding image text */
        #imgtext {
          position: absolute;
          bottom: 15px;
          left: 15px;
          color: white;
          font-size: 20px;
        }

        /* Closable button inside the expanded image */
        .closebtn {
          position: absolute;
          top: 10px;
          right: 15px;
          color: white;
          font-size: 35px;
          cursor: pointer;
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
                    <th>النوع</th>
                    <th>الصورة</th>
                    <th>تاريخ الانشاء</th>
                    <th>حدث</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse ( $deal_types as $key=>$type )
                        <tr id="{{$type->id}}">
                            <td>{{$type->deal_type}}</td>
                            <td>
                                <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>
                                <img  src="{{ asset('images/deals_type/'.$type->image) }}" class="rounded" with="50" height="50" onclick="myFunction(this);" data-toggle="modal" data-target=".bd-example-modal-lg"/>

                            </td>
                            <td>{{$type->created_at}}</td>
                            <td>
                                <form action="javascript:void(0)" method="post">
                                    @csrf
                                    <button data-id="{{ $type->id }}" data-name="{{$type->deal_type}}" data-toggle="tooltip" data-placement="top" title="" data-original-title="حذف النوع"  class="btn  btn-danger del">
                                        <i class="la la-trash-o"></i>
                                    </button>
                                    <a href="{{route('admin.deal-types.edit',[$type->id])}}" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="" data-original-title="تعديل النوع" ><i class="la la-edit"></i></a>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" align="center">لاتوجد اي انواع</td>
                        </tr>
                    @endforelse
                </tbody>
                <tfoot>
                  <tr>
                    <th>النوع</th>
                    <th>الصورة</th>
                    <th>تاريخ الانشاء</th>
                    <th>حدث</th>
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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $('.table').DataTable({

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
        text: "سوف تقوم بحذف النوع : " +name,
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: '#DD6B55',
        confirmButtonText: 'نعم, متأكد!',
        cancelButtonText: "لا, الغي العملية!"
    }).then((result) => {
            if (result['isConfirmed']){


                $.ajax({

                    url:"deal-types/"+id,
                    method: "delete",
                    data: {
                        _token: $('input[name="_token"]').val(),
                    },
                    success: response => {

                        Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: ' تم حذف النوع'+name,
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
