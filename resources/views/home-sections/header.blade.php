<!-- Header -->
<header id="home-header" class="home-section"  @if($section->custom->bg_img)style="background-image: url({{$section->custom->bg_img}});"@endif>
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12 text-center">
                <h3 class="m-1">
                @if($section->custom->title)
                    {{$section->custom->title}}
                @else
                    @lang('home.home')
                @endif
                </h3>
                <h1 class="m-3">
                    {{ config('app.name', 'Laravel') }}
                </h1>
                @if($section->custom->subtitle)
                    <h2 class="m-2">
                        {{$section->custom->subtitle}}
                    </h2>
                @endif
            </div>
        </div>
    </div>
</header>
