<table class="table table-striped table-sm table-responsive-md">
    <thead>
    <tr>
        <th>@lang('customize-site.section-name')</th>
        <th>@lang('customize-site.preview')</th>
        <th>@lang('forms.edit')</th>
    </tr>
    </thead>
    <tbody>
    @foreach($sections as $section)
        <tr>
            <td>
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-12 text-center">
                            <h3 class="m-1">
                                @lang('sections.'.$section->name)

                            </h3>
                        </div>
                    </div>
                </div>
            </td>
            <td class="home-section-preview align-middle" @if( $section->hasMedia('sections-background') )style="background-image: url({{ $section->getFirstMedia('sections-background')->getUrl('bg') }}) !important;"@endif>
                @include('admin.customize-site._preview')
            </td>
            <td>
                {!! Form::model($customProperties->{$section->id}, ['route' => ['admin.customize-site.update', $section->id], 'method' =>'PUT']) !!}
                @include('admin.customize-site._form')
                @if($section->name === 'header')
                    @include('admin.customize-site._header-form')
                @endif
                @if($section->name === 'contact-us')
                    @include('admin.customize-site._contact-us-form')
                @endif

                <div class="pull-right">
                    {!! Form::submit(__('forms.actions.save'), ['class' => 'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
