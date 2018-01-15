
<nav class="navbar navbar-expand-lg navbar-light bg-light" style="border-bottom: 1px solid #1a1a1a;">

    <a class="navbar-brand text-white" href="{{ route('admin.dashboard') }}">
        <img src="{{ asset('back/img/admin2.png') }}" height="30" />
    </a>

    <button class="navbar-toggler" type="button"
            data-toggle="collapse" data-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">

            <li class="nav-item">
                <a class="nav-link text-white"  style="color: #000 !important;" href="{{ route('admin.logout') }}">
                    Logout
                </a>
            </li>
        </ul>
    </div>
</nav>