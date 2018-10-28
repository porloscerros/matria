<!-- Contact Us Section-->
<section id="home-contact-us" class="home-section">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12 text-center">
                <h3 class="m-0 display-4">@lang('home.contact-us')</h3>
            </div>
                <div class="col-md-4">
                    <div class="">
                        <p>
                            <span class="fa fa-whatsapp"></span>  Tel/Wapp:
                            <a href="tel:+5493454085001"> +54-9-345-4085001</a>
                        </p>
                    </div>
                    <div class="">
                        <p>
                            <span class="fa fa-envelope-o"></span> Email:
                            <a href="mailto:talladoscarteles@gmail.com"> talladoscarteles@gmail.com</a>
                        </p>
                    </div>
                    <div class="">
                        <p>
                            <span class="fa fa-map-marker"></span> Ubicación:
                            <a href=""  data-toggle="modal" data-target="#mapModal"> Las Chacras, Traslasierra</a>
                        </p>
                    </div>
                    <hr>

                    <!-- Social Media Elements -->
                    <div class="container">

                        <!-- Grid row-->
                        <div class="row">
                            <p>Encuéntramos en la Redes Sociales:</p>

                            <!-- Grid column -->
                            <div class="col-md-12 mx-auto">
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
                            <!-- Grid column -->

                        </div>
                        <!-- Grid row-->

                    </div>
                    <!-- Social Media Elements -->
                </div>

                <div class="col-md-8">
                    @include('shared/alerts')
                    {!! Form::open(['route' => 'mail-to-admin']) !!}

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            {!! Form::label('name', __('contact-us.name')) !!}
                            {!! Form::text('name', null, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'required']) !!}

                            @if ($errors->has('name'))
                                <span class="invalid-feedback">{{ $errors->first('name') }}</span>
                            @endif
                        </div>

                        <div class="form-group col-md-6">
                            {!! Form::label('email', __('contact-us.email')) !!}
                            {!! Form::text('email', null, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'required']) !!}

                            @if ($errors->has('email'))
                                <span class="invalid-feedback">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('msg', __('contact-us.message')) !!}
                        {!! Form::textarea('msg', null, ['class' => 'form-control trumbowyg-form' . ($errors->has('msg') ? ' is-invalid' : ''), 'rows' => 4, 'required' => 'required']) !!}

                        @if ($errors->has('msg'))
                            <span class="invalid-feedback">{{ $errors->first('msg') }}</span>
                        @endif
                    </div>

                    {!! Form::submit(__('forms.actions.send'), ['class' => 'btn btn-info']) !!}

                    {!! Form::close() !!}
                </div>
            </div>
    </div>
</section>

<!-- Map Modal -->
<div class="modal" id="mapModal" tabindex="-1" role="dialog" aria-labelledby="mapModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content bg-translucent">
            <div class="modal-header border-0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="embed-responsive embed-responsive-1by1">
                    @include('home-sections.partials.map')
                </div>
            </div>
        </div>
    </div>
</div>
