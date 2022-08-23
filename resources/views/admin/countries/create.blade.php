@extends('layouts.admin')

@section('styles')
@endsection


@section('content')

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.countries.store') }}" method="post">
            <!-- CSRF Token -->
            @csrf
            <div class="form-group">
                <label for="name">اسم الدولة</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                    id="name" value="{{ old('name') }}">
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
