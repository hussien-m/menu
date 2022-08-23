@extends('layouts.admin')

@section('styles')
@endsection


@section('content')

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.regions.store') }}" method="post">
            <!-- CSRF Token -->
            @csrf
            <div class="form-group">
                <label for="name">اسم المنطقة</label>
                <input type="text" name="name" class="form-control" placeholder="اسم المدينة" />
            </div>

            <div class="form-group">
                <label for="name">اختر الدولة</label>
                <select class="form-control" name="country_id" id="country_id">
                    <option selected disabled>---</option>
                    @foreach ( $countries as $country )
                    <option value="{{$country->id}}">{{$country->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="name">اختر المدينة</label>
                <select class="form-control" name="city_id" id="city_id">
                </select>
            </div>


            <div class="form-group mt-1">
                <button type="submit" class="btn btn-primary">أضف دولة جديدة</button>
            </div>
        </form>

    </div>
</div>

@stop

@section('scripts')
<script>
    function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
            $('#blah').attr('src', e.target.result).width(400).height(300);
            };

            reader.readAsDataURL(input.files[0]);
        }
}
</script>



<script>



    $('#country_id').on('change',function (e) {
        var country_id = e.target.value;
        var url = '{{ url('/') }}';
        $.get(url + '/get-country-city?country_id=' + country_id,function (data) {
            if(data == ''){
                document.getElementById("city_id").disabled = true;
            }else {
                document.getElementById("city_id").disabled = false;
            }
            $('#city_id').empty();
            $('#city_id').append('<option class="bold" value="">---</option>');
            $.each(data,function (index,subcatObj) {
                $('#city_id').append('<option class="bold" value="'+subcatObj.id+'">'+subcatObj.name+'</option>');
            })
        })
    });
</script>

@endsection
