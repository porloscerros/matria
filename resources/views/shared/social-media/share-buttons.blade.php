<div class="align-self-center pt-2 px-2 label1">
    <p>Compartir: </p>
</div>

<div class="social-buttons ml-2">
    <button class="btn btn-action p-3">
        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($url) }}"
           target="_blank">
            <i class="fa fa-facebook fa-md"></i>
        </a>
    </button>
    <button class="btn btn-action p-3">
        <a href="https://twitter.com/intent/tweet?url={{ urlencode($url) }}"
           target="_blank">
            <i class="fa fa-twitter fa-md"></i>
        </a>
    </button>
    <button class="btn btn-action p-3">
        <a href="https://plus.google.com/share?url={{ urlencode($url) }}"
           target="_blank">
            <i class="fa fa-google-plus fa-md"></i>
        </a>
    </button>
</div>
<button class="btn btn-action p-3 text-success">
    <a href="whatsapp://send?text={{ urlencode($url) }}">
        <i class="fa fa-whatsapp fa-md"></i>
    </a>
</button>
