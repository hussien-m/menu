@extends('layouts.admin')

@section('styles')
@endsection


@section('content')

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.cities.store') }}" method="post">
            <!-- CSRF Token -->
            @csrf
            <div class="form-group">
                <label for="name">اسم المدينة</label>
                <input type="text" name="name" class="form-control" placeholder="اسم المدينة" />
            </div>

            <div class="form-group">
                <label for="name">اختر الدولة</label>
                <select class="form-control" name="country_id">
                    <option selected disabled>---</option>
                    @foreach ( $countries as $country )
                    <option value="{{$country->id}}">{{$country->name}}</option>
                    @endforeach
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
@endsection
