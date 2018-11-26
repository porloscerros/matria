<div class="card-columns">
    @each('posts/_show', $posts, 'post', 'posts/_empty')
</div>

<div class="d-flex justify-content-center">
    {{ $posts->links() }}
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
