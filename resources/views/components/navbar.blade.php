<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">

        <a class="navbar-brand" href="/">Home</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="ms-auto px-5">
                <ul class="navbar-nav mr-auto">
                    @guest
                        <x-navitem routeName="view.login" title="Login" />
                        <x-navitem routeName="view.register" title="Register" />

                    @endguest
                    @auth
                        <li class="nav-item">
                            <a class="nav-link">{{ Auth::user()->name }}</a>
                        </li>
                        <li class="nav-item">
                            <x-navitem routeName="users.index" title="Users List" />

                        </li>

                        <x-navitem routeName="logout" title="Logout" />
                    @endauth
                </ul>
            </div>
            <div class="text-white ">
                @auth
                    <h4>
                        <a class="nav-link">Job :{{ Auth::user()->role }}</a>
                    </h4>

                @endauth

            </div>
        </div>

    </div>
</nav>
