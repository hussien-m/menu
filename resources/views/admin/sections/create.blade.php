@extends('layouts.admin')

@section('styles')
@endsection


@section('content')

<div class="card">
    <div class="card-body">
        <form action="{{ route('sections.store') }}" method="post" enctype="multipart/form-data">
            <!-- CSRF Token -->
            @csrf
            <div class="form-group">
                <label for="name">@lang('dashboard.sec-name_ar')</label>
                <input type="text" class="form-control @error('name_ar') is-invalid @enderror" name="name_ar"
                    id="name" value="{{ old('name_ar') }}">
                @error('name_ar')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="name">@lang('dashboard.sec-name_he')</label>
                <input type="text" class="form-control @error('name_he') is-invalid @enderror" name="name_he"
                    id="name" value="{{ old('name_he') }}">
                @error('name_he')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="name">@lang('dashboard.sec-slug')</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="slug"
                    id="name" value="{{ old('name') }}">
                @error('slug')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="name">@lang('dashboard.image')</label>
                <input type="file" class="form-control @error('iamge') is-invalid @enderror" name="image"
                    id="image" value="{{ old('image') }}" onchange="readURL(this);">
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror

            </div>
            <div class="text-left mt-1 mp-2">
                <img id="blah" src="{{asset('images/sections/select.jpg')}}" alt="your image" class="rounded"/>
            </div>

            <div class="form-group mt-1">
                <button type="submit" class="btn btn-primary">{{ $page_name }}</button>
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
