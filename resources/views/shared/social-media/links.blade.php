@if($section->hasCustomProperty('fb_page'))
    <!-- Facebook -->
    <a href="https://www.facebook.com/{{$section->getCustomProperty('fb_page')}}/" class="btn btn-outline-light mx-1" target="_blank">
        <i class="fa fa-facebook fa-lg"></i>
    </a>
@endif
@if($section->hasCustomProperty('instagram'))
    <!--Instagram-->
    <a href="https://www.instagram.com/{{$section->getCustomProperty('instagram')}}/" class="btn btn-outline-light mx-1" target="_blank">
        <i class="fa fa-instagram fa-lg"> </i>
    </a>
@endif
@if($section->hasCustomProperty('twitter'))
    <!-- Twitter -->
    <a href="https://twitter.com/{{$section->getCustomProperty('twitter')}}" class="btn btn-outline-light mx-1" target="_blank">
        <i class="fa fa-twitter fa-lg"> </i>
    </a>
@endif
@if($section->hasCustomProperty('google_plus'))
    <!-- Twitter -->
    <a href="https://plus.google.com/{{$section->getCustomProperty('google_plus')}}" class="btn btn-outline-light mx-1" target="_blank">
        <i class="fa fa-google-plus-official fa-lg"> </i>
    </a>
@endif
