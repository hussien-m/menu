@extends('layouts.web')

@section('content')



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


    </div>
    <b>الاضافات:</b>

    <table class="table table-striped table-bordered table-hover">
        <thead>
            <th>الاضافة</th>
            <th>السعر</th>
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

@stop
