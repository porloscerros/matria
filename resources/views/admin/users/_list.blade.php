<table class="table table-striped table-sm">
    <caption>{{ trans_choice('users.count', $users->total()) }}</caption>
    <thead>
        <tr>
            <th></th>
            <th>@lang('users.attributes.name')</th>
            <th>@lang('users.attributes.email')</th>
            <th>@lang('users.attributes.roles')</th>
            <th>@lang('users.attributes.registered_at')</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
            @if($user->role !== 'developer')
                <tr>
                    <td>
                        @if ($user->getMedia('avatar')->count())
                                {{ Html::image($user->getMedia('avatar')->first()->getUrl('thumb'), $user->name, ['class' => 'card-img-top', 'style' => 'max-height: 25px; max-width:25px;']) }}
                        @endif
                    </td>
                    <td>{{ link_to_route('admin.users.edit', $user->fullname, $user) }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @foreach($user->roles as $role)
                            {!! __('roles.' . $role->name) !!}
                        @endforeach
                    </td>
                    <td>{{ humanize_date($user->registered_at, 'd/m/Y H:i:s') }}</td>
                    <td>
                        <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-primary btn-sm">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>

                        @if(Auth::user()->isAdmin() && Auth::user()->id !== $user->id )
                            {!! Form::model($user, ['method' => 'DELETE', 'route' => ['admin.users.destroy', $user], 'class' => 'form-inline', 'data-confirm' => __('forms.users.delete')]) !!}
                            {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i>', ['class' => 'btn btn-danger btn-sm', 'name' => 'submit', 'type' => 'submit']) !!}
                            {!! Form::close() !!}
                        @endif
                    </td>
                </tr>
            @endif
        @endforeach
    </tbody>
</table>

<div class="d-flex justify-content-center">
    {{ $users->links() }}
</div>
