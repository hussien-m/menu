<!doctype html>
<html data-n-head-ssr dir="rtl" lang="en"
   data-n-head="%7B%22dir%22:%7B%22ssr%22:%22ltr%22%7D,%22lang%22:%7B%22ssr%22:%22en%22%7D%7D">
   <head>
      <title>{{ $setting->site_name }}</title>
      <meta data-n-head="ssr" charset="utf-8">
      <meta data-n-head="ssr" name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=5.0">
      @include('themes')
      <style>
        .place-header {
            overflow: hidden;
            height: 263px;
            position: relative;
        }
    </style>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">
        <style>
              @if(app()->getLocale()=="ar")
            *{
                font-family: 'Cairo', sans-serif;

            }
            @endif
            body{
                font-family: 'Cairo', sans-serif;

            }

            .category-item__link .h2 {
                font-size: 28px;
                color: #FFF;
            }
            a {
                color: #000;
                text-decoration: none;
}
        </style>
    @if(app()->getLocale()=="he")

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo&display=swap" rel="stylesheet">
        <style>

            font-family: 'Heebo', sans-serif;

        </style>
    @endif
   </head>
   <body>
         <!---->
         <div id="__layout">
            <main class="place"
               style="--color-primary:#f7906c;--color-primary-1:#f7906c;--color-primary-4:rgba(247,144,108,0.15);--color-primary-5:rgba(247,144,108,0.1);">
               <div itemscope="itemscope" itemtype="https://schema.org/LocalBusiness" class="place-body">
                  <div class="place-header wrapper">
                     <div class="place-header__bg"
                        style="background-image:url({{ asset('images/meals/1661343951-.jpg') }});"></div>
                  </div>
                  <div class="place-content wrapper">
                     <h1 class="place-title">

                        <!---->
                     </h1>
                     @include('wifi')
                     <div class="place-layout">
                        <div class="menu-category-page">
                           <div class="place-nav">
                              <div class="place-nav__inner wrapper">
                                 <a href="javascript:void(0);" onclick="javascript:history.go(-1);"
                                    class="back-button focus nuxt-link-active">
                                    <svg width="24"
                                       height="24" viewBox="0 0 24 24" fill="none"
                                       xmlns="http://www.w3.org/2000/svg">
                                       <path fill-rule="evenodd" clip-rule="evenodd"
                                          d="M6.41412 13L12.707 19.2929L11.2928 20.7071L2.58569 12L11.2928 3.29289L12.707 4.70711L6.41412 11H20.9999V13H6.41412Z"
                                          fill="var(--color-black)"></path>
                                    </svg>
                                 </a>
                              </div>
                           </div>

                           @yield('content')
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

   </body>
</html>
