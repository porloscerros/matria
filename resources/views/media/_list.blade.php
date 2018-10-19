<table class="table table-striped table-sm table-responsive-md">
    <caption>{{ trans_choice('media.count', $media->count()) }}</caption>
    <thead>
        <tr>
            <th>@lang('media.attributes.image')</th>
            <th>@lang('media.attributes.name')</th>
            <th>@lang('media.attributes.posted_at')</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($media as $medium)
            <tr>
                <td>
                    <a href="{{ $medium->getUrl() }}" target="_blank">
                        <img src="{{ $medium->getUrl('thumb') }}" alt="{{ $medium->name }}" width="100">
                    </a>
                </td>
                <td>{{ $medium->name }}</td>
                <td>{{ humanize_date($medium->posted_at, 'd/m/Y H:i:s') }}</td>
                <td>
                    <a href="{{ $medium->getUrl() }}" title="{{ __('media.show') }}" class="btn btn-primary btn-sm" target="_blank">
                        <i class="fa fa-eye" aria-hidden="true"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>