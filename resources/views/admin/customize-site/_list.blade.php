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
                                    @lang('customize-site.sections.'.$section->name)

                                </h3>
                            </div>
                        </div>
                    </div>
                </td>
                <td class="home-section-preview" @if( $section->custom->hasBackground() )style="background-image: url({{ $section->background() }}) !important;"@endif>
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-12 text-center">
                                título:
                                <h1 class="m-1">
                                    @if($section->custom->title)
                                        {{$section->custom->title}}
                                    @else
                                        @lang('home.home')
                                    @endif
                                </h1>
                                @if($section->custom->subtitle)
                                    subtítulo:
                                    <h2 class="m-2">
                                        {{$section->custom->subtitle}}
                                    </h2>
                                @endif
                                @if($section->name !== 'header')
                                    <div class="container-fluid h-100 bg-translucent">
                                        <div class="card-header">contenido de la sección</div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </td>
                <td>
                    {!! Form::model($section->custom, ['route' => ['admin.customize-site.update', $section->custom->id], 'method' =>'PUT']) !!}
                    @include('admin.customize-site._form')

                    <div class="pull-right">
                        {{ link_to_route('admin.customize-site.index', __('preview'), [], ['class' => 'btn btn-secondary']) }}
                        {!! Form::submit(__('forms.actions.save'), ['class' => 'btn btn-primary']) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
