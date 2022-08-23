@extends('layouts.admin')

@section('styles')
@endsection


@section('content')

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.deal-types.update',[$type->id]) }}" method="post" enctype="multipart/form-data">
            <!-- CSRF Token -->
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">اسم النوع</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                    id="name" value="{{ $type->deal_type ?? old('name') }}">
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="name">الصورة</label>
                <input type="file" class="form-control @error('iamge') is-invalid @enderror" name="image"
                    id="image" value="{{ old('name') }}" onchange="readURL(this);">
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror

            </div>
            <div class="text-left mt-1 mp-2">
                <img id="blah" src="{{asset("select.jpg")}}" alt="your image" class="rounded"/>
            </div>

            <div class="form-group mt-1">
                <button type="submit" class="btn btn-primary">أضف نوع</button>
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
