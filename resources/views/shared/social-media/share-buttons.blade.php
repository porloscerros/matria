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

@push('inline-scripts')
    <script>

        var popupSize = {
            width: 780,
            height: 550
        };

        $(document).on('click', '.social-buttons > button', function(e){

            var
                verticalPos = Math.floor(($(window).width() - popupSize.width) / 2),
                horisontalPos = Math.floor(($(window).height() - popupSize.height) / 2);

            var popup = window.open($(this).prop('href'), 'social',
                'width='+popupSize.width+',height='+popupSize.height+
                ',left='+verticalPos+',top='+horisontalPos+
                ',location=0,menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1');

            if (popup) {
                popup.focus();
                e.preventDefault();
            }

        });
    </script>
@endpush
