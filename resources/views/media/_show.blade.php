<div class="card">
    <a  href="#gallery-modal-{{ $modal }}" data-toggle="modal">
        <img src="{{ $medium->getUrl('thumb') }}" alt="{{ $medium->name }}" class="card-img-top">
    </a>

    <div class="card-body">
        <p class="card-text text-center">
            <small class="text-muted">
                <i class="fa fa-tag" aria-hidden="true"></i>
                @foreach($medium->tags as $tag)
                    #{{ $tag->name }}
                @endforeach
            </small>
        </p>
    </div>
</div>
