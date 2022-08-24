@extends('layouts.web')

@section('content')
<div class="text-right" style="float: right;">
    <p class="alignright">{{ $section_name[0]->name_ar }}</p>
</div>
    @foreach ($meals as $meal)

    <div class="category-list__item">
        <div class="category-list__item">
            <div class="category-item">
                <a href="{{ route('show.meal', $meal->slug) }}"
                    class="category-item__link focus"
                    style="background-image:url({{ asset('images/meals/'.$meal->image) }});">

                </a>
                <!---->
            </div>
            <div>
                <p class="alignright" style="margin-right: 15px;margin-top:5px">{{ app()->getLocale()=="ar" ? $meal->name_ar:$meal->name_he }}</p>
                <p class="alignleft ml-2" style="margin-left: 15px;margin-top:5px">{{ Currency::format($meal->price,'ILS') }}</p>

            </div>
            <div>
                <small class="alignright" style="margin-right: 15px;margin-top:8px">{{ app()->getLocale()=="ar" ? $meal->description_ar:$meal->description_he }}</small>
            </div>


            <!---->
        </div>

        <!---->
    </div>
    @endforeach
@stop
