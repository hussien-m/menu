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
    </div>

