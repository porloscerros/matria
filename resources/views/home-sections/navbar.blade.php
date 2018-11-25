<nav id="homeNavbar" class="navbar navbar-dark bg-transparent fixed-top navbar-expand-md">
    <div class="container">
        <!-- Branding Image -->
        <a class="navbar-brand" href="#page-top">
            <img src="{{ asset('img/logo.png') }}" height="64" width="auto" alt="logo">
        </a>

        <!-- Collapsed Hamburger -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
            @admin
            <ul class="navbar-nav">
                <li class="nav-item">
                    {{ link_to_route('admin.dashboard', __('dashboard.dashboard'), [], ['class' => 'nav-link']) }}
                </li>
            </ul>
            @endadmin

            <ul class="navbar-nav">
            </ul>

            <ul class="navbar-nav ml-auto">
                <div class="d-flex align-items-end flex-column">
                    <li class="nav-item btn-nav">
                        <a class="nav-link" href="#home-gallery" data-toggle="collapse" data-target=".navbar-collapse.show">
                            {{ __('media.gallery') }}
                        </a>
                    </li>
                </div>
                <div class="d-flex align-items-end flex-column">
                    <li class="nav-item btn-nav">
                        <a class="nav-link" href="#home-posts" data-toggle="collapse" data-target=".navbar-collapse.show">
                            {{ __('posts.posts') }}
                        </a>
                    </li>
                </div>
                <div class="d-flex align-items-end flex-column">
                    <li class="nav-item btn-nav">
                        <a class="nav-link" href="#home-contact-us" data-toggle="collapse" data-target=".navbar-collapse.show">
                            {{ __('contact-us.contact') }}
                        </a>
                    </li>
                </div>
                @guest

                @else
                    <li class="nav-item dropdown">
                        <a v-pre href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            {{ link_to_route('users.show', __('users.public_profile'), Auth::user(), ['class' => 'dropdown-item']) }}
                            {{ link_to_route('users.edit', __('users.settings'), [], ['class' => 'dropdown-item']) }}

                            <div class="dropdown-divider"></div>

                            <a href="{{ url('/logout') }}"
                               class="dropdown-item"
                               onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                @lang('auth.logout')
                            </a>

                            <form id="logout-form" class="d-none" action="{{ url('/logout') }}" method="POST">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

