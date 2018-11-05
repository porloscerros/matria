<!-- Facebook like my page button code -->
<div class="fb-like mx-1" data-href="https://www.facebook.com/{{ $fb_page }}/" data-layout="button" data-action="like" data-size="large" data-show-faces="true">

</div>

<!-- Twitter follow button code -->
<a href="https://twitter.com/{{ $twitter_user }}?ref_src=twsrc%5Etfw" class="twitter-follow-button mx-1" data-size="large" data-show-screen-name="false" data-lang="es" data-show-count="false">
    Follow @ {{ $twitter_user }}
</a>

@push('inline-scripts')
    <!-- Load Facebook SDK for JavaScript -->
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = 'https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v3.2';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>

    <!-- Load Twitter Share JavaScript -->
    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
@endpush
