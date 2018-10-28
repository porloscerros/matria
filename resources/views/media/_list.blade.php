<div class="card-columns">
    @foreach($media as $medium)
        @include('media/_show', ['modal' => $loop->index])
        <!-- The Gallery Modal -->
        @include('home-sections.partials.gallery-modal', ['modal' => $loop->index, 'url' => $medium->getUrl(), 'name' => $medium->name])

    @endforeach
</div>

<div class="d-flex justify-content-center">
    {{ $media->links() }}
</div>
