<table class="table table-striped table-sm table-responsive-md">
    <caption>{{ trans_choice('contacts.count', $contacts->total()) }}</caption>
    <thead>
        <tr>
            <th>@lang('contacts.attributes.name')</th>
            <th>@lang('contacts.attributes.email')</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($contacts as $contact)
            <tr>
                <td>{{ $contact->name }}</td>
                <td>{{ $contact->defaultEmail ? $contact->defaultEmail->email : '' }}</td>
                <td>
                    <a href="{{ route('admin.contacts.edit', $contact) }}" class="btn btn-primary btn-sm">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                    </a>

                    {!! Form::model($contact, ['method' => 'DELETE', 'route' => ['admin.contacts.destroy', $contact], 'class' => 'form-inline', 'data-confirm' => __('forms.contacts.delete')]) !!}
                        {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i>', ['class' => 'btn btn-danger btn-sm', 'name' => 'submit', 'type' => 'submit']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<div class="d-flex justify-content-center">
    {{ $contacts->links() }}
</div>
