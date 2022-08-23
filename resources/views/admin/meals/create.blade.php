@extends('layouts.admin')

@section('styles')
@endsection


@section('content')

<div class="card">
    <div class="card-body">
        <form action="{{ route('meals.store') }}" method="post" enctype="multipart/form-data">
            <!-- CSRF Token -->
            @csrf

            <div class="form-group">
                <label for="name">@lang('dashboard.meal-name')</label>
                <select class="form-control" name="section_id" required>
                    <option selected disabled>---</option>
                    @foreach ($sections as $section)
                        <option value="{{ $section->id }}">{{  app()->getLocale() =='ar' ? $section->name_ar : $section->name_he  }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="name">@lang('dashboard.meal-name_ar')</label>
                <input type="text" class="form-control @error('name_ar') is-invalid @enderror" name="name_ar"
                    id="name" value="{{ old('name_ar') }}">
                @error('name_ar')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="name">@lang('dashboard.meal-name_he')</label>
                <input type="text" class="form-control @error('name_he') is-invalid @enderror" name="name_he"
                    id="name" value="{{ old('name_he') }}">
                @error('name_he')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="name">@lang('dashboard.meal-price')</label>
                <input type="number" max="100" min="1" class="form-control @error('price') is-invalid @enderror" name="price"
                    id="name" value="{{ old('price') }}">
                @error('name_he')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="name">@lang('dashboard.meal-description_ar')</label>
                <textarea type="text" class="form-control @error('description_ar') is-invalid @enderror" name="description_ar"
                    ></textarea>
                @error('description_ar')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="name">@lang('dashboard.meal-description_he')</label>
                <textarea type="text" class="form-control @error('name_he') is-invalid @enderror" name="description_he"
                    ></textarea>
                @error('description_he')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="name">@lang('dashboard.sec-slug')</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="slug"
                    id="name" value="{{ old('slug') }}">
                @error('slug')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="name">@lang('dashboard.image')</label>
                <input type="file" class="form-control @error('iamge') is-invalid @enderror"  name="files[]" accept="image/*" multiple
                    id="image" value="{{ old('image') }}" onchange="readURL(this);">
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror

            </div>


            <div class="form-group mt-1">
                <button type="submit" class="btn btn-primary">{{ $page_name }}</button>
            </div>
        </form>

    </div>
</div>

@stop

@section('scripts')

@endsection
