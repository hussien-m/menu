@extends('layouts.admin')

@section('styles')
@endsection


@section('content')

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.deal-targets.update',[$target->id]) }}" method="post">
            <!-- CSRF Token -->
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">اسم الهدف</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                    id="name" value="{{ $target->target_deal ?? old('name') }}">
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
                    <option {{$target->user_pay=="user"   ? 'selected':'' }}  value="user">صاحب العرض يدفع</option>
                    <option {{$target->user_pay=="dealer" ? 'selected':'' }}  value="dealer">صاحب الصفقة يدفع</option>
                </select>
            </div>



            <div class="form-group mt-1">
                <button type="submit" class="btn btn-primary"> {{$page_name}} <i class="la la-edit"></i></button>
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
