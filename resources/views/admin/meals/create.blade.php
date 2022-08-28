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
                            <option value="{{ $section->id }}">
                                {{ app()->getLocale() == 'ar' ? $section->name_ar : $section->name_he }}</option>
                        @endforeach
                    </select>
                    @error('section_id')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
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
                    <input type="number" max="100" min="1"
                        class="form-control @error('price') is-invalid @enderror" name="price" id="name"
                        value="{{ old('price') }}">
                    @error('name_he')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="name">@lang('dashboard.meal-description_ar')</label>
                    <textarea type="text" class="form-control @error('description_ar') is-invalid @enderror" name="description_ar">{{ old('description_ar') }}</textarea>
                    @error('description_ar')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="name">@lang('dashboard.meal-description_he')</label>
                    <textarea type="text" class="form-control @error('description_he') is-invalid @enderror" name="description_he">{{ old('description_he') }}</textarea>
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
                    <input type="file" class="form-control @error('iamge') is-invalid @enderror" name="image"
                        accept="image/*" id="image" value="{{ old('image') }}" onchange="readURL(this);">
                    @error('image')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror

                </div>


                <div class="form-group">
                    <label for="properties">الاضافات</label>
                    <div class="row">
                        <div class="col-md-3">
                            الاضافة:
                        </div>
                        <div class="col-md-3">
                            السعر:
                        </div>
                    </div>

                    @for ($i = 0; $i <= 11; $i++)
                        <div class="row">
                            <div class="col-md-3 mt-2">
                                <input type="text" name="extra[{{ $i }}][add]" class="form-control"
                                    value="{{ old('extra[' . $i . '][add]') }}" placeholder=" الاصافة بالعربية">
                            </div>
                            <div class="col-md-3 mt-2">
                                <input type="number" name="extra[{{ $i }}][price]" class="form-control"
                                    value="{{ old('extra[' . $i . '][price]') }}" >
                            </div>
                        </div>
                    @endfor
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            الاضافة:
                        </div>
                        <div class="col-md-3">
                            السعر:
                        </div>
                    </div>
                    <hr>
                    @for ($i=0; $i <= 11; $i++)
                    <div class="row">
                        <div class="col-md-3 mt-2">
                            <input type="text" name="extra_he[{{ $i }}][add]" class="form-control" value="{{ old('extra_he['.$i.'][add]') }}" placeholder="الاضافة بالعبرية">
                        </div>
                        <div class="col-md-3 mt-2">
                            <input type="number" name="extra_he[{{ $i }}][price]" class="form-control" value="{{ old('extra_he['.$i.'][price]') }}" placeholder="السعر">
                        </div>
                    </div>
                    @endfor
                </div>
        </div>
        <div>


            <div class="form-group mt-1">
                <button type="submit" class="btn btn-primary">{{ $page_name }}</button>
            </div>
            </form>

        </div>
    </div>

@stop

@section('scripts')

@endsection
