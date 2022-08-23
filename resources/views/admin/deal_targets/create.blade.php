@extends('layouts.admin')

@section('styles')
@endsection


@section('content')

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.deal-targets.store') }}" method="post" enctype="multipart/form-data">
            <!-- CSRF Token -->
            @csrf
            <div class="form-group">
                <label for="name">اسم الهدف</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                    id="name" value="{{ old('name') }}">
            </div>


            <div class="form-group">
                <label for="name">النوع</label>
                <select name="deal_type_id" class="form-control">
                    @foreach ($types as $type )
                        <option value="{{$type->id}}">{{$type->deal_type}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="name">طريقة الدفع</label>
                <select name="user_pay" class="form-control">
                    <option value="user">صاحب العرض</option>
                    <option value="dealer">صاحب الصفقة</option>
                </select>
            </div>

            <div class="form-group mt-1">
                <button type="submit" class="btn btn-primary">أضف هدف جديد</button>
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
