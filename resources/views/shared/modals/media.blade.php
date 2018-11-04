<!-- Media Modal -->
<div class="modal" id="gallery-modal-{{ $modal }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-full" role="document">
        <div class="modal-content bg-translucent">
            <div class="modal-header border-0">
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body text-center p-4" id="result">
                    <img class="img-fluid" src="{{ $url }}" alt="{{ $name }}">
                {!! $medium->getCustomProperty('description') !!}
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('modals.close')</button>
            </div>
        </div>
    </div>
</div>
