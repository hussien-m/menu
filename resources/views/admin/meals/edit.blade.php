@extends('layouts.admin')

@section('styles')
@endsection


@section('content')

<div class="card">
    <div class="card-body">
        <form action="{{ route('meals.update',$meal->id) }}" method="post" enctype="multipart/form-data">
            <!-- CSRF Token -->
            @csrf
            @method('PUT')

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
                <label for="name">@lang('dashboard.sec-name_ar')</label>
                <input type="text" class="form-control @error('name_ar') is-invalid @enderror" name="name_ar"
                    id="name" value="{{ old('name_ar') ?? $meal->name_ar }}">
                @error('name_ar')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="name">@lang('dashboard.sec-name_he')</label>
                <input type="text" class="form-control @error('name_he') is-invalid @enderror" name="name_he"
                    id="name" value="{{ old('name_he')  ?? $meal->name_he }}">
                @error('name_he')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="name">@lang('dashboard.sec-price')</label>
                <input type="number" max="100" min="1" class="form-control @error('price') is-invalid @enderror" name="price"
                    id="name" value="{{ old('price') ?? $meal->price }}">
                @error('name_he')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="name">@lang('dashboard.meal-description_ar')</label>
                <textarea type="text" class="form-control @error('description_ar') is-invalid @enderror" name="description_ar"
                    >{{ old('description_ar') ?? $meal->description_ar }}</textarea>
                @error('description_ar')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="name">@lang('dashboard.meal-description_he')</label>
                <textarea type="text" class="form-control @error('name_he') is-invalid @enderror" name="description_he"
                    >{{ old('description_he') ?? $meal->description_he }}</textarea>
                @error('description_he')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="name">@lang('dashboard.meal-slug')</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="slug"
                    id="name" value="{{ old('slug') ?? $meal->slug }}">
                @error('slug')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="name">@lang('dashboard.image')</label>
                <input type="file" class="form-control @error('iamge') is-invalid @enderror"  name="image" accept="image/*"
                    id="image" value="{{ old('image') }}" onchange="readURL(this);">
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror

            </div>

            <div class="form-group">
                <label for="properties">Properties</label>
                <div class="row">
                    <div class="col-md-2">
                        Key:
                    </div>
                    <div class="col-md-4">
                        Value:
                    </div>
                </div>
                @for ($i=0; $i <= 2; $i++)
                    <div class="row">
                        <div class="col-md-2">
                            <input type="text" name="extra[{{ $i }}][add]" class="form-control"
                              value="{{ $meal->extra[$i]['add'] ?? '' }}">
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="extra[{{ $i }}][price]" class="form-control"
                              value="{{ $meal->extra[$i]['price'] ?? '' }}">
                        </div>
                    </div>
                @endfor
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
