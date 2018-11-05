
@if($section->hasCustomProperty('fb_page'))
<!-- Facebook -->
<a href="https://www.facebook.com/{{$section->getCustomProperty('fb_page')}}/" class="fb-ic" target="_blank">
    <i class="fa fa-facebook fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
</a>
@endif
@if($section->hasCustomProperty('instagram'))
<!--Instagram-->
<a href="https://www.instagram.com/{{$section->getCustomProperty('instagram')}}/" class="ins-ic" target="_blank">
    <i class="fa fa-instagram fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
</a>
@endif
@if($section->hasCustomProperty('twitter'))
<!-- Twitter -->
<a href="https://twitter.com/{{$section->getCustomProperty('twitter')}}" class="tw-ic" target="_blank">
    <i class="fa fa-twitter fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
</a>
@endif
