@extends('app')

@section('content')
<section class="menu-item-list">
    <h2 class="menu-item-list__title h2">
       <span><b>{{ app()->getLocale()=="ar"?$section_name[0]->name_ar:$section_name[0]->name_he }}</b></span>
       <!---->
    </h2>
    @foreach($meals as $meal)
    <div class="menu-item-list__item">
       <article class="dish">

             <img
                data-url="{{route("show.meal",$meal->slug) }}"
                alt="&quot;Homemade&quot; dumplings" class="dish-image__img" src="{{ asset('images/meals/'.$meal->image) }}">

          <div class="dish-content" style="padding-top: 10px">
             <div class="dish-body">
                <div class="dish-header">
                   <h3 class="dish-title">
                      <!---->
                      <!----> <span> <b><a href="{{ route('show.meal',$meal->slug) }}">{{ app()->getLocale() == "ar" ? $meal->name_ar:$meal->name_he }}</a></span></b>
                   </h3>
                   <div class="dish-weight" >
                      <h6><b>{{ Currency::format($meal->price,'ILS') }}</b></h6>
                   </div>
                </div>
                <!---->
                <div class="dish-description">
                   <p>
                     <a href="{{ route('show.meal',$meal->slug) }}">{{ app()->getLocale() == "ar" ? $meal->description_ar:$meal->description_he }}</a>
                   </p>
                </div>
             </div>
          </div>
          <div class="dish-action">
             <!---->
          </div>
       </article>
       <!---->
    </div>
    @endforeach
    <!---->
 </section>
@stop
