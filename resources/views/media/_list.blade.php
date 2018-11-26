<div class="card-columns">
    @foreach($media as $medium)
        @include('media/_show', ['modal' => $loop->index])
        <!-- The Gallery Modal -->
        @include('shared.modals.media', ['modal' => $loop->index, 'url' => $medium->getUrl(), 'name' => $medium->name])

    @endforeach
</div>

<div class="d-flex justify-content-center">
    {{ $media->links() }}
</div>

@push('inline-scripts')
    <script>
        (function($) {
            $('ul.pagination li.active')
                .prev().addClass('show-mobile')
                .prev().addClass('show-mobile');
            $('ul.pagination li.active')
                .next().addClass('show-mobile')
                .next().addClass('show-mobile');
            $('ul.pagination')
                .find('li:first-child, li:last-child, li.active')
                .addClass('show-mobile');
        })(jQuery);
    </script>
@endpush
