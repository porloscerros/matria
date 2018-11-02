@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-2">
                <div class="card-body text-center">
                    <h2 v-pre class="card-title mb-0">{{ $contact->name }}</h2>
                    <small class="card-subtitle mb-2 text-muted">{{ $contact->email }}</small>

                    <div class="card-text row mt-3">

                    </div>

                    @profile($contact)
                    {{ link_to_route('contacts.edit', __('contacts.edit'), [], ['class' => 'btn btn-primary btn-sm float-right']) }}
                    @endprofile
                </div>
            </div>
        </div>
    </div>
@endsection
