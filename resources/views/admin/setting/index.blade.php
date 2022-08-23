@extends('layouts.admin')

@section('styles')
@endsection


@section('content')

<form action="{{route('admin.settings.save')}}" method="post">
    @csrf
<div class="row">

    <div class="col-xl-12 col-lg-12 col-md-12">
        <div class="card" style="">
            <div class="card-header">
                <h4 class="card-title">الاعدادت الرئيسية</h4>
            </div>
            <div class="card-block">
                <div class="card-body">
                    <fieldset class="form-group">
                        <label class="text-muted">حالة الموقع ({{$settings->site_status == "on" ? 'مفتوح للزوار' : 'مغلق للزوار'}})</label>
                        <select class="form-control" name="site_status">
                            <option value="on" {{ $settings->site_status == "on" ? 'selected' : '' }}>مفتوح للزوار</option>
                            <option value="off" {{ $settings->site_status == "off" ? 'selected' : '' }}>مغلق للزوار</option>
                        </select>
                    </fieldset>

                    <fieldset class="form-group">
                        <label class="text-muted">رسالة الاغلاق</label>
                        <input type="text" name="message_site_status" class="form-control" value="{{$settings->message_site_status}}">
                    </fieldset>

                    <fieldset class="form-group">
                        <label class="text-muted">اسم الموقع</label>
                        <input type="text" name="site_name" class="form-control" value="{{$settings->site_name}}">
                    </fieldset>

                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-12 col-lg-12 col-md-12">
        <div class="card" style="">
            <div class="card-header">
                <h4 class="card-title">أعدادات SEO</h4>
            </div>
            <div class="card-block">
                <div class="card-body">
                    <fieldset class="form-group">
                        <label class="text-muted">الكلمات المفتاحية</label>
                        <input type="text" class="form-control" name="meta_tags" value="{{$settings->meta_tags}}" />
                    </fieldset>

                    <fieldset class="form-group">
                        <label class="text-muted">وصف الموقع</label>
                        <textarea cols="4" rows="7" style="resize: none" class="form-control border-primary" name='meta_description'>{{$settings->meta_description}}</textarea>
                    </fieldset>

                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-12 col-lg-12 col-md-12">
        <div class="card" style="">
            <div class="card-header">
                <h4 class="card-title">روابط التواصل الاجتماعي</h4>
            </div>
            <div class="card-block">
                <div class="card-body">

                    <fieldset class="form-group">
                        <label class="text-muted">الفيسبوك</label>
                        <input type='text' class="form-control border-primary" name='facebook' value="{{$settings->facebook}}">
                    </fieldset>

                    <fieldset class="form-group">
                        <label class="text-muted">تويتر</label>
                        <input type="text" class="form-control border-primary" name='tiwtter' value="{{$settings->tiwtter}}">
                    </fieldset>


                    <fieldset class="form-group">
                        <label class="text-muted">انستجرام</label>
                        <input type='text' class="form-control border-primary" name='instagram' value="{{$settings->instagram}}">
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
</div>


<fieldset class="form-group">

    <button class="btn btn-primary">حفظ الاعدادات</button>

</fieldset>

</form>




</div>

@stop

@section('scripts')
@endsection
