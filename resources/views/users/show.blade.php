@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-2">
                @if ($user->getMedia('avatar')->count())
                    <div class="card-img-top text-center my-3 avatar-thumb">
                        {{ Html::image($user->getMedia('avatar')->first()->getUrl('thumb'), $user->name, ['class' => 'card-img-top']) }}
                    </div>
                @endif
                <div class="card-body text-center">
                        <h2 v-pre class="card-title mb-0">{{ $user->name }}</h2>
                        <small class="card-subtitle mb-2 text-muted">{{ $user->email }}</small>

                        @if ($user->extract)
                            <div class="card-text row mt-3 text-center">
                                <div class="col-12">
                                    <span class="text-muted d-block">@lang('users.attributes.extract'):</span>
                                    {{ $user->extract }}
                                </div>
                            </div>
                        @endif

                    <div class="col-12">
                        @profile($user)
                        {{ link_to_route('users.edit', __('users.edit'), [], ['class' => 'btn btn-primary btn-sm float-right']) }}
                        @endprofile
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
