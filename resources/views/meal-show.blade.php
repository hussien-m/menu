@extends('app')

@section('content')

<div class="menu-item-list__item">
    <article class="dish">

          <img
             data-url=""
             alt="&quot;Homemade&quot; dumplings" class="dish-image__img" src="{{ asset('images/meals/'.$meal->image) }}">

       <div class="dish-content" style="padding-top: 10px">
          <div class="dish-body">
             <div class="dish-header">
                <h3 class="dish-title">
                   <!---->
                   <!----> <span> <a href="{{ route('show.meal',$meal->slug) }}">{{ app()->getLocale() == "ar" ? $meal->name_ar:$meal->name_he }}</a></span>
                </h3>
                <div class="dish-weight" >
                   <b>{{ Currency::format($meal->price,'ILS') }}</b>
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
    </article>
    <!---->
 </div>

 <b>الاضافات:</b>

 <table class="table table-striped table-bordered table-hover">
     <thead>
         <th>الاضافة</th>
         <th>السعر</th>
     </thead>
     <tbody>
        @php
        if(app()->getLocale()=="ar"){

            $extra = $meal->extra;

        }

        if(app()->getLocale() =="he") {

            $extra = $meal->extra_he;
        }

        @endphp

         @if(is_null($extra))

         @else

         @forelse ($extra as $property)
             <tr>
                 <td>{{ $property['add'] }}</td>
                 <td>{{ Currency::format($property['price'],'ILS') }}</td>
             </tr>

        @empty
        <td clospan="2">--</td>
         @endforelse

         @endif

     </tbody>
 </table>

@stop
