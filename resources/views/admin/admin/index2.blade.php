@extends('layouts.admin')

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('dash-rtl/app-assets/vendors/css/forms/selects/select2.min.css') }}">
@endsection


@section('content')

    <section class="basic-select2">
        <div class="row">
            <div class="col-xl-6 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Single Select2</h4>
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
                        <div class="card-body">

                            <div class="form-group">
                                <div class="text-bold-600 font-medium-2">

                                    <select class="select2 form-control block" id="company_id" name="company_id">
                                        <option selected disabled >اختر دولة</option>
                                        @foreach ( $countries as $c )
                                            <option value="{{$c->id}}">{{$c->country_name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Single Select2</h4>
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
                        <div class="card-body">

                            <div class="form-group">
                                <div class="text-bold-600 font-medium-2">

                                    <select class="select2 form-control block" name="category_id" id="category_id" disabled>
                                    </select>
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
    <script src="{{ asset('dash-rtl/app-assets/vendors/js/forms/select/select2.full.min.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('dash-rtl/app-assets/js/scripts/forms/select/form-select2.js') }}" type="text/javascript">
    </script>

    <script>

        $(function () {
            $('.select2').select2();
        });

        $('#company_id').on('change',function (e) {
            var company_id = e.target.value;
            var url = '{{ url('/') }}';
            $.get(url + '/get-company-category?company_id=' + company_id,function (data) {
                if(data == ''){
                    document.getElementById("category_id").disabled = true;
                }else {
                    document.getElementById("category_id").disabled = false;
                }
                $('#category_id').empty();
                $('#category_id').append('<option class="bold" value="">لايوجد</option>');
                $.each(data,function (index,subcatObj) {
                    $('#category_id').append('<option class="bold" value="'+subcatObj.id+'">'+subcatObj.state_name+'</option>');
                })
            })
        });
    </script>
@endsection
