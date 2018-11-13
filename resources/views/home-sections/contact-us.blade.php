<!-- Contact Us Section-->
<section id="home-contact-us" class="home-section" @if( $section->hasCustomProperty('bg_img') )style="background-image: url({{ $section->getCustomProperty('bg_img') }}) !important;"@endif>
    <div class="container h-100 bg-translucent">
        <div class="d-flex justify-content-center flex-column h-100">

            <div class="d-flex align-items-start flex-column">
                <h3 class="align-self-center p-3 label1">
                    @if( $section->hasCustomProperty('title') )
                        {{ $section->getCustomProperty('title') }}
                    @else
                        @lang('sections.contact-us')
                    @endif
                </h3>
            </div>

            <div class="d-flex flex-md-column p-5 bg-translucent">
                <div class="d-flex flex-md-row justify-content-around">
                    <div class="justify-content-between">
                        @if($section->hasCustomProperty('phone'))
                            <div class=" align-items-center">
                                <span class="fa fa-whatsapp"></span>  @lang('contact-us.phone')/Wapp:
                                <a href="tel:{{$section->getCustomProperty('phone')}}"> {{$section->getCustomProperty('phone')}}</a>
                            </div>
                        @endif
                        @if($section->hasCustomProperty('email'))
                            <div class=" align-items-stretch">
                                <span class="fa fa-envelope-o"></span> Email:
                                <a href="mailto:{{$section->getCustomProperty('email')}}"> {{$section->getCustomProperty('email')}}</a>
                            </div>
                        @endif
                        @if($section->hasCustomProperty('location'))
                            <div class="justify-content-center">
                                <span class="fa fa-map-marker"></span> @lang('contact-us.location'):
                                <a href=""  data-toggle="modal" data-target="#mapModal"> {{$section->getCustomProperty('location')}}</a>
                            </div>
                            <!-- Map Modal -->
                            @include('shared.modals.map')

                        @endif
                        @if($section->hasSocialMedia())
                            <hr>

                            <!-- Social Media Elements -->
                            <div class="">
                                <p>@lang('contact-us.social-media'):</p>
                            </div>
                            <div class="">
                                @include('shared.social-media.links')
                            </div>
                            <!-- Social Media Elements -->
                        @endif
                    </div>

                    <div class="justify-content-between">
                        @include('shared/alerts')
                        {!! Form::open(['route' => 'mail-to-admin']) !!}

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                {!! Form::text('name', null, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => __('contact-us.name'), 'required']) !!}

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">{{ $errors->first('name') }}</span>
                                @endif
                            </div>

                            <div class="form-group col-md-6">
                                {!! Form::text('email', null, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => __('contact-us.email'), 'required']) !!}

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::textarea('msg', null, ['class' => 'form-control' . ($errors->has('msg') ? ' is-invalid' : ''), 'placeholder' => __('contact-us.message'), 'rows' => 4, 'required' => 'required']) !!}

                            @if ($errors->has('msg'))
                                <span class="invalid-feedback">{{ $errors->first('msg') }}</span>
                            @endif
                        </div>

                        {!! Form::submit(__('forms.actions.send'), ['class' => 'btn btn-action pull-right']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>

            @if($section->hasSocialMedia())
                <div class="d-flex align-items-end flex-column mt-3">
                    <div class="d-flex align-self-center">
                        @include('shared.social-media.follow-us')
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>
