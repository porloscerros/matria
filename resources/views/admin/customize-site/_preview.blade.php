<div class="container bg-translucent">
    <div class="row">
        <div class="col-12 text-center">
            <h2 class="m-1">
                @if($section->hasCustomProperty('title'))
                    {{$section->getCustomProperty('title')}}
                @else
                    @lang('sections.'.$section->name)
                @endif
            </h2>
            @if($section->name === 'header')
            @endif
            @if($section->hasCustomProperty('subtitle'))
                <h3 class="m-2">
                    {{$section->getCustomProperty('subtitle')}}
                </h3>
            @endif
            @if( $section->hasCustomProperty('content_list') )
                <h4 class="align-self-center text-center mt-3">
                    {!! $section->getCustomProperty('content_list') !!}
                </h4>
            @endif

            @if($section->name === 'contact-us')
                <div class="container p-3 bg-translucent">
                    <div class="row align-self-center">
                        <div class="col-md-5 align-self-center">
                            <div class="row justify-content-center">
                                @if($section->hasCustomProperty('phone'))
                                    <p>
                                        <span class="fa fa-whatsapp"></span>  @lang('contact-us.phone')/Wapp:
                                        <a href="tel:{{$section->getCustomProperty('phone')}}"> {{$section->getCustomProperty('phone')}}</a>
                                    </p>
                                @endif
                            </div>
                            <div class="row justify-content-center">
                                @if($section->hasCustomProperty('email'))
                                    <p>
                                        <span class="fa fa-envelope-o"></span> Email:
                                        <a href="mailto:{{$section->getCustomProperty('email')}}"> {{$section->getCustomProperty('email')}}</a>
                                    </p>
                                @endif
                            </div>
                            <div class="row justify-content-center">
                                @if($section->hasCustomProperty('location'))
                                    <p>
                                        <span class="fa fa-map-marker"></span> @lang('contact-us.location'):
                                        <a href=""  data-toggle="modal" data-target="#mapModal"> {{$section->getCustomProperty('location')}}</a>
                                    </p>
                                @endif
                            </div>

                            @if($section->hasSocialMedia())
                                <hr>
                                <!-- Social Media Elements -->
                                <div class="row d-flex justify-content-center">
                                    <p>@lang('contact-us.social-media'):</p>
                                </div>
                                <div class="row d-flex justify-content-center">
                                    @include('shared.social-media.links')
                                </div>
                                <!-- Social Media Elements -->
                            @endif
                        </div>

                        <div class="col-md-7">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => __('contact-us.name'), 'required']) !!}
                                </div>

                                <div class="form-group col-md-6">
                                    {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => __('contact-us.email'), 'required']) !!}
                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::textarea('msg', null, ['class' => 'form-control' . ($errors->has('msg') ? ' is-invalid' : ''), 'placeholder' => __('contact-us.message'), 'rows' => 4, 'required' => 'required']) !!}
                            </div>

                            {!! Form::submit(__('forms.actions.send'), ['class' => 'btn btn-info pull-right']) !!}
                        </div>
                    </div>
                </div>
                @if($section->hasSocialMedia())
                    <div class="col-12 d-flex justify-content-center">
                        @include('shared.social-media.follow-us')
                    </div>
                @endif
            @endif
        </div>
    </div>
</div>
