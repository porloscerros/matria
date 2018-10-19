@component('components.cards.default', ['class' => 'bg-primary text-light m-2'])
    <div class="row justify-content-between">
        <i class="fa fa-file-image-o fa-5x" aria-hidden="true"></i>
        <div class="text-right">
            <div class="huge">{{ $media->count() }}</div>
            <div>{{ trans_choice('media.new_media', $media->count()) }}</div>
        </div>
    </div>

    @slot('footer')
        <a href="{{ route('admin.media.index') }}" class="d-flex justify-content-between text-light">
            <span>@lang('dashboard.details')</span>
            <span><i class="fa fa-arrow-circle-right"></i></span>
        </a>
    @endslot
@endcomponent
