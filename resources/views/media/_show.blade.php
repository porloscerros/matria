<div class="card">
    <a  href="#gallery-modal-{{ $modal }}" data-toggle="modal">
        <img src="{{ $medium->getUrl('thumb') }}" alt="{{ $medium->name }}" class="card-img-top">
    </a>

    <div class="card-body text-dark text-muted">
        <p class="card-text text-center">
            <i class="fa fa-tag" aria-hidden="true"></i>
            @foreach($medium->tags as $tag)
                <a href="{{ route('media', ['q' => $tag->name]) }}">
                    #{{ $tag->name }}
                </a>
            @endforeach
            {!! $medium->getCustomProperty('description') !!}
        </p>
    </div>
</div>
