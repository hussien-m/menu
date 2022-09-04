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
                   <b>{{ Currency::format($meal->price,'ILS') ." | ". Currency::format($meal->price_two,'ILS')  }}</b>
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


 @if(app()->getLocale()=="ar")

    @if (empty($meal->extra))

    @else
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <th>@lang('dashboard.extra')</th>
                <th>@lang('dashboard.price')</th>
            </thead>
            <tbody>

                @foreach ($meal->extra as $property)
                    <tr>
                        <td>{{ $property['add'] }}</td>
                        <td>{{ Currency::format($property['price'],'ILS') }}</td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    @endif

@endif


@if(app()->getLocale() == "he")

    @if (empty($meal->extra_he))

    @else
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <th>@lang('dashboard.extra')</th>
                <th>@lang('dashboard.price')</th>
            </thead>
            <tbody>

                @foreach ($meal->extra_he as $property)
                    <tr>
                        <td>{{ $property['add'] }}</td>
                        <td>{{ Currency::format($property['price'],'ILS') }}</td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    @endif

@endif



@stop
