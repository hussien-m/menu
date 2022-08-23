@extends('layouts.admin')

@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('dash-rtl/app-assets/vendors/js/gallery/photo-swipe/photoswipe.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('dash-rtl/app-assets/css-rtl/pages/gallery.css') }}">
@endsection


@section('content')

<section id="image-gallery" class="card">
    <div class="card-content collapse show mt-4">
        <div class="card-body card-dashboard">
          <table class="table table-striped table-bordered zero-configuration table-responsive">
            <thead>
              <tr>
                <th>#ID</th>
                <th>@lang('dashboard.meal-name')</th>
                <th>@lang('dashboard.meal-slug')</th>
                <th>@lang('dashboard.meal-price')</th>
                <th>@lang('dashboard.meal-created_at')</th>

              </tr>
            </thead>
            <tbody>
                    <tr id="{{$meal->id}}">
                        <td>#</td>
                        <td>{{  app()->getLocale() =='ar' ? $meal->name_ar : $meal->name_he  }} </td>>
                        <td>{{$meal->slug}}</td>
                        <td>{{$meal->price}}</td>
                        <td>{{ $meal->created_at }}</td>
                    </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th>#ID</th>
                    <th>@lang('dashboard.sec-name')</th>
                    <th>@lang('dashboard.sec-image')</th>
                    <th>@lang('dashboard.sec-slug')</th>
                    <th>@lang('dashboard.sec-created_at')</th>
                  </tr>
            </tfoot>
          </table>
          <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg ">
              <div class="modal-content">
                <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>
                <img id="expandedImg" style="width:100%">
                <div id="imgtext"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <div class="card-header">
      <h4 class="card-title">Image gallery</h4>
      <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
      <div class="heading-elements">
        <ul class="list-inline mb-0">
          <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
          <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
          <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
          <li><a data-action="close"><i class="ft-x"></i></a></li>
        </ul>
      </div>
    </div>
    <div class="card-content">
      <div class="card-body  my-gallery" itemscope="" itemtype="http://schema.org/ImageGallery" data-pswp-uid="1">
        <div class="row">
            @foreach($meal->images as $image)
          <figure class="col-lg-4 col-md-6 col-12" itemprop="associatedMedia" itemscope="" itemtype="http://schema.org/ImageObject">
            <a href="{{ asset('images/meals/'.$image->image) }}" itemprop="contentUrl" data-size="480x360">
              <img class="img-thumbnail img-fluid" src="{{ asset('images/meals/'.$image->image) }}" itemprop="thumbnail" alt="Image description">
            </a>
          </figure>
          @endforeach
        </div>
      </div>
      <!--/ Image grid -->
      <!-- Root element of PhotoSwipe. Must have class pswp. -->
      <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
        <!-- Background of PhotoSwipe.
       It's a separate element as animating opacity is faster than rgba(). -->
        <div class="pswp__bg"></div>
        <!-- Slides wrapper with overflow:hidden. -->
        <div class="pswp__scroll-wrap">
          <!-- Container that holds slides.
          PhotoSwipe keeps only 3 of them in the DOM to save memory.
          Don't modify these 3 pswp__item elements, data is added later on. -->
          <div class="pswp__container" style="transform: translate3d(0px, 0px, 0px);">
            <div class="pswp__item" style="display: block; transform: translate3d(-1701px, 0px, 0px);"><div class="pswp__zoom-wrap" style="transform: translate3d(520px, 181px, 0px) scale(0.567823);"><img class="pswp__img" src="../../../app-assets/images/gallery/4.jpg" style="opacity: 1; width: 845px; height: 634px;"></div></div>
            <div class="pswp__item" style="transform: translate3d(0px, 0px, 0px);"><div class="pswp__zoom-wrap" style="transform: translate3d(941px, 316.913px, 0px) scale(0.315142);"><img class="pswp__img pswp__img--placeholder" src="../../../app-assets/images/gallery/1.jpg" style="width: 845px; height: 634px; display: none;"><img class="pswp__img" src="../../../app-assets/images/gallery/1.jpg" style="display: block; width: 845px; height: 634px;"></div></div>
            <div class="pswp__item" style="display: block; transform: translate3d(1701px, 0px, 0px);"><div class="pswp__zoom-wrap" style="transform: translate3d(520px, 181px, 0px) scale(0.567823);"><img class="pswp__img" src="../../../app-assets/images/gallery/2.jpg" style="opacity: 1; width: 845px; height: 634px;"></div></div>
          </div>
          <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
          <div class="pswp__ui pswp__ui--fit pswp__ui--hidden">
            <div class="pswp__top-bar">
              <!--  Controls are self-explanatory. Order can be changed. -->
              <div class="pswp__counter">1 / 4</div>
              <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
              <button class="pswp__button pswp__button--share" title="Share"></button>
              <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
              <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
              <!-- Preloader demo http://codepen.io/dimsemenov/pen/yyBWoR -->
              <!-- element will get class pswp__preloader-active when preloader is running -->
              <div class="pswp__preloader">
                <div class="pswp__preloader__icn">
                  <div class="pswp__preloader__cut">
                    <div class="pswp__preloader__donut"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
              <div class="pswp__share-tooltip"></div>
            </div>
            <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
            </button>
            <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
            </button>
            <div class="pswp__caption">
              <div class="pswp__caption__center"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--/ PhotoSwipe -->
  </section>
@stop

@section('scripts')
<script src="{{ asset('dash-rtl/app-assets/vendors/js/gallery/masonry/masonry.pkgd.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('dash-rtl/app-assets/vendors/js/gallery/photo-swipe/photoswipe.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('dash-rtl/app-assets/vendors/js/gallery/photo-swipe/photoswipe-ui-default.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('dash-rtl/app-assets/js/scripts/gallery/photo-swipe/photoswipe-script.js') }}" type="text/javascript"></script>
@endsection
