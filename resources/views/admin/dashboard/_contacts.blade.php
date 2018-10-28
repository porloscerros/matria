@component('components.cards.default', ['class' => 'bg-warning text-light m-2'])
    <div class="row justify-content-between">
        <i class="fa fa-address-card fa-5x" aria-hidden="true"></i>
        <div class="text-right">
            <div class="huge">{{ $contacts->count() }}</div>
            <div>{{ trans_choice('contacts.new_contacts', $contacts->count()) }}</div>
        </div>
    </div>

    @slot('footer')
        <a href="{{ route('admin.contacts.index') }}" class="d-flex justify-content-between text-light">
            <span>@lang('dashboard.details')</span>
            <span><i class="fa fa-arrow-circle-right"></i></span>
        </a>
    @endslot
@endcomponent
