<style>
    .alignleft {
	float: left;
}
.alignright {
	float: right;
}
</style>

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
            <a href="{{ route('homepage') }}"><img src="{{ asset('web/l.png') }}" width="50%" ></a>
        </div>
        <div class="text-center">
            <p style="font-size: 20px;" class="mr-3"> @lang('dashboard.follow_us')

                <a  target="blank" href="{{ $setting->facebook }}"><i class="m-2 fa-brands fa-facebook"></i> </a>

                 <a  target="blank" href="{{ $setting->instagram }}"><i class="m-2 fa-brands fa-instagram"></i></a>

                 <a target="blank" href="{{ $setting->tiwtter }}"><i class="m-2 fa-brands fa-tiktok"></i> </a>
                    |
                 <a target="blank" href="https://wa.me/{{$setting->phone}}"><i  class="m-2 fa fa-phone" aria-hidden="true"></i> </a>


            </p>
        </div>
    </div>

