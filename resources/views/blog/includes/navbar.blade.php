<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home') }}">{{ __('My Blog') }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                @if (Auth::check())
                <a class="nav-link active" aria-current="page" href="{{ route('home') }}">{{ __('Главная') }}</a>
                    <a class="nav-link" href="{{ route('blog.post.index') }}">{{ __('Блог') }}</a>
                @endif
            </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Войти') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Регистрация') }}</a>
                            </li>
                        @endif
                    @else
                        @if(Auth::user()->role_id == 1001)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.home') }}">{{ __('Кабинет администратора') }}</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('blog.personal.index') }}">{{ __('Личный кабинет') }}</a>
                            </li>
                        @endif
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <input class="btn btn-light" type="submit" value="Выйти">
                        </form>
                    @endguest
                </ul>
            </div>
        </div>
    </div>
</nav>
