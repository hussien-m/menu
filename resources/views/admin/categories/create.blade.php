@extends('layouts.admin')

@section('styles')
@endsection


@section('content')

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.categories.store') }}" method="post">
            <!-- CSRF Token -->
            @csrf
            <div class="form-group">
                <label for="name">اسم التصنيف</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                    id="name" value="{{ old('name') }}">
            </div>


            <div class="form-group">
                <label for="name">التصنيف الاساسي</label>
                <select name="parent_id" class="form-control">
                    <option selected disabled>اختر تصنيف او اتركه فارغا</option>
                    <option value="">لايوجد</option>
                    @foreach ($categories as $category )

                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach

                </select>
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
