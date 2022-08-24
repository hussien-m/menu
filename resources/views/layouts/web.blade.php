<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <title>{{ $setting->site_name }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=5.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('web/sdd.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">
    <style>
        *{
            font-family: 'Cairo', sans-serif;

        }
        body{
            font-family: 'Cairo', sans-serif;

        }

        .category-item__link .h2 {
            font-size: 28px;
            color: #FFF;
        }
    </style>
</head>

<body direction="rtl">
    <div id="__nuxt">
        <!---->
        <div id="__layout">
            <main class="place"
                style="--color-primary:#f7906c; --color-primary-1:#f7906c; --color-primary-4:rgba(247,144,108,0.15); --color-primary-5:rgba(247,144,108,0.1);">
                <div itemscope="itemscope" itemtype="https://schema.org/LocalBusiness" class="place-body">
                    <div class="place-header wrapper">
                        <div class="place-header__bg"
                            style="background-image:url({{ asset('images/header.jpg') }});"></div>
                    </div>
                    <div class="place-content wrapper">


                        <div id="textbox">
                            <p class="alignleft">{{ $setting->wifi_name ." | ". $setting->wifi_password }} <i class="fa fa-wifi"></i> </p>
                            <p class="alignright">
                                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                    {{ $properties['native'] ." | " }}
                                </a>
                                @endforeach

                            </p>
                            <div style="clear: both;"></div>
                            <div style="text-align:center">
                                <img src="{{ asset('web/l.png') }}" width="50%" >
                            </div>
                        </div>

                        <div selected-menu="[object Object]" class="place-layout">

                            <div class="cafe-list">
                                <div class="cafe-list-body">
                                    <div class="menu-item-search">
                                        <!---->
                                    </div>
                                    <div class="category-list">
                                        <!---->


                                        @yield('content')

                                    </div>
                                </div>
                                <!---->
                            </div>
                            <!---->
                            <!---->
                        </div>

                    </div>
                    <!---->
                </div>
            </main>
        </div>
    </div>
</body>

</html>
