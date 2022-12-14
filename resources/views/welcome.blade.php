@extends('layouts.web')

@section('content')

<div class="category-list__item">
    <div class="category-item">
        <a href="{{ route('show.section', $first_section->slug) }}"
            class="category-item__link focus"
            style="background-image:url({{ asset('images/sections/'.$first_section->image) }});">
            <h2 class="h2"><b>{{ app()->getLocale()=="ar" ? $first_section->name_ar:$first_section->name_he }}</b></h2>
        </a>
        <!---->
    </div>
    <!---->
</div>

    <div class="row">
        @foreach ($sections as $section)
        <div class="col-md-6 col-lg-6 col-6">
            <div id="block1" style="">
                <div class="category-list__item">
                    <div class="category-item xx">
                        <a href="{{ route('show.section', $section->slug) }}"
                            class="category-item__link focus"
                            style="background-image:url({{ asset('images/sections/'.$section->image) }});">
                            <h2 class="h2"><b>{{ app()->getLocale()=="ar" ? $section->name_ar:$section->name_he }}</b></h2>
                        </a>
                        <!---->
                    </div>
                    <!---->
                </div>
            </div>
        </div>
        @endforeach
    </div>




@stop
