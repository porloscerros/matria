<!-- Contact Us Section-->
<section id="home-contact-us" class="home-section" @if( $section->custom->hasBackground() )style="background-image: url({{$section->background()}});"@endif>
    <div class="container h-100 bg-translucent">
        <div class="row h-100 p-3 align-items-center">
            <div class="col-12 text-center">
                <h3 class="m-0 display-4">
                    @if($section->custom->title)
                        {{$section->custom->title}}
                    @else
                        @lang('sections.contact-us')
                    @endif
                </h3>
            </div>
            <div class="container p-3 bg-translucent">
                <div class="row align-self-center">
                    <div class="col-md-5 align-self-center">
                        <div class="row d-flex justify-content-center">
                            <p>
                                <span class="fa fa-whatsapp"></span>  @lang('contact-us.phone')/Wapp:
                                <a href="tel:+5493454085001"> +54-9-345-4085001</a>
                            </p>
                            <p>
                                <span class="fa fa-envelope-o"></span> Email:
                                <a href="mailto:talladoscarteles@gmail.com"> talladoscarteles@gmail.com</a>
                            </p>
                            <p>
                                <span class="fa fa-map-marker"></span> @lang('contact-us.location'):
                                <a href=""  data-toggle="modal" data-target="#mapModal"> Las Chacras, Traslasierra</a>
                            </p>
                        </div>

                        <hr>

                        <!-- Social Media Elements -->
                        <div class="row d-flex justify-content-center">
                            <p>@lang('contact-us.social-media'):</p>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <!-- Facebook -->
                            <a href="https://www.facebook.com/matriacartelestallados/" class="fb-ic" target="_blank">
                                <i class="fa fa-facebook fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
                            </a>
                            <!--Instagram-->
                            <a href="https://www.instagram.com/matria_carteles_tallados/" class="ins-ic" target="_blank">
                                <i class="fa fa-instagram fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
                            </a>
                            <!-- Twitter -->
                            <a href="https://twitter.com/de_matria" class="tw-ic" target="_blank">
                                <i class="fa fa-twitter fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
                            </a>
                        </div>
                        <!-- Social Media Elements -->
                    </div>

                    <div class="col-md-7">
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
                            {!! Form::textarea('msg', null, ['class' => 'form-control trumbowyg-form' . ($errors->has('msg') ? ' is-invalid' : ''), 'placeholder' => __('contact-us.message'), 'rows' => 4, 'required' => 'required']) !!}

                            @if ($errors->has('msg'))
                                <span class="invalid-feedback">{{ $errors->first('msg') }}</span>
                            @endif
                        </div>

                        {!! Form::submit(__('forms.actions.send'), ['class' => 'btn btn-info pull-right']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            <div class="col-12 d-flex justify-content-center">
                @include('shared.social-media.follow-us')
            </div>
        </div>
    </div>
</section>

<!-- Map Modal -->
@include('shared.modals.map')
