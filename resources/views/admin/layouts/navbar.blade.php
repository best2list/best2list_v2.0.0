    <nav class="navbar navbar-expand-md navbar-light navbar-laravel mb-0">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="fas fa-ticket-alt"><span class="badge badge-danger">6</span></i><span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <div class="dropdown-item-text border-bottom">
                                    <strong>armin</strong> : <span>I want create my Business, but I ...</span>
                                </div>
                                <div class="dropdown-item-text border-bottom">
                                    <strong>kamran</strong> : <span>I want create my Business ...</span>
                                </div>
                                <div class="dropdown-item-text border-bottom">
                                    <strong>mohammad</strong> : <span>I want create my Business, but I ca... </span>
                                </div>
                                <a class="dropdown-item" href="/admin/tickets">more</a>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="fas fa-comments"><span class="badge badge-danger">4</span></i><span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <div class="dropdown-item-text border-bottom">
                                    <strong>armin</strong> : <span>I want create my Business, but I ...</span>
                                </div>
                                <div class="dropdown-item-text border-bottom">
                                    <strong>kamran</strong> : <span>I want create my Business ...</span>
                                </div>
                                <div class="dropdown-item-text border-bottom">
                                    <strong>mohammad</strong> : <span>I want create my Business, but I ca... </span>
                                </div>
                                <a class="dropdown-item" href="/admin/tickets">more</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->username }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="/mybusiness">my account</a>
                                <a class="dropdown-item" href="/mybusiness/create">create business</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>

                    @endguest
                </ul>
            </div>
        </div>
    </nav>