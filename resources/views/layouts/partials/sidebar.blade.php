{{-- Navbar Toggle untuk Mobile --}}
<nav class="navbar navbar-dark bg-dark d-md-none">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMobile">
            <span class="navbar-toggler-icon"></span>
        </button>
        <span class="text-white">Admin Panel</span>
    </div>
</nav>

{{-- Sidebar Mobile: Offcanvas --}}
<div class="offcanvas offcanvas-start bg-black text-white" tabindex="-1" id="sidebarMobile">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title">Menu</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body d-flex flex-column justify-content-between">
        <div>
            <div class="profile-card text-center mb-4">
                <div class="avatar rounded-circle bg-warning text-black"
                    style="width: 60px; height: 60px; display: flex; align-items: center; justify-content: center; font-size: 24px;">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>
                <h5 class="text-white mt-2">{{ Auth::user()->name }}</h5>
                <a href="{{ route('profile.index') }}" class="text-warning">View Profile</a>
            </div>
            <ul class="nav flex-column">
                <li class="nav-item mb-2">
                    <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }} text-white"
                        href="{{ route('dashboard') }}">
                        <i class="fa fa-home me-1"></i> Dashboard
                    </a>
                </li>
            </ul>
        </div>
        <div class="logout-wrapper mt-3">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn btn-sm btn-outline-warning w-100">
                    <i class="fa fa-sign-out-alt me-1"></i> Logout
                </button>
            </form>
        </div>
    </div>
</div>

{{-- Sidebar Desktop --}}
<div class="d-none d-md-flex flex-column justify-content-between position-fixed top-0 start-0 bg-black text-white vh-100 p-3" style="width: 250px;">
    <div>
        <h4 class="text-warning mb-4">ADMIN</h4>
        <div class="profile-card text-center mb-4">
            <div class="avatar rounded-circle bg-warning text-black"
                style="width: 80px; height: 80px; display: flex; align-items: center; justify-content: center; font-size: 32px;">
                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
            </div>
            <h5 class="text-white mt-2">{{ Auth::user()->name }}</h5>
            <a href="{{ route('profile.index') }}" class="text-warning">View Profile</a>
        </div>
        <ul class="nav flex-column">
            <li class="nav-item mb-2">
                <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }} text-white"
                    href="{{ route('dashboard') }}">
                    <i class="fa fa-home me-1"></i> Dashboard
                </a>
            </li>
        </ul>
        {{-- separate --}}
        <hr class="text-warning">
        <h6 class="text-warning mb-4">MENU</h6>
        <ul class="nav flex-column">
            <li class="nav-item mb-2">
                <a class="nav-link {{ request()->routeIs('') ? 'active' : '' }} text-white"
                    href="{{ route('dashboard') }}">
                    <i class="fa fa-tasks me-1"></i> My Requests
                </a>
                <a class="nav-link {{ request()->routeIs('') ? 'active' : '' }} text-white"
                    href="{{ route('dashboard') }}">
                    <i class="fa fa-folder-open me-1"></i> All Requests
                </a>
            </li>
        </ul>
    </div>
    <div class="logout-wrapper mt-3">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn btn-sm btn-outline-warning w-100">
                <i class="fa fa-sign-out-alt me-1"></i> Logout
            </button>
        </form>
    </div>
</div>

{{-- CSS untuk Sidebar & Button --}}
<style>
    .nav-link {
        transition: all 0.3s;
    }

    .nav-link:hover {
        background-color: rgb(255, 96, 0);
        border-radius: 5px;
    }

    .nav-link.active {
        background-color: rgb(255, 191, 0);
        color: black;
        border-radius: 5px;
    }

    .nav-item button {
        background-color: rgb(255, 96, 0);
        color: white;
        border-radius: 5px;
    }

    .nav-item button:hover {
        background-color: rgb(255, 191, 0);
    }

    .offcanvas-body {
        background-color: rgb(0, 0, 0);
    }

    .offcanvas-title {
        color: rgb(255, 191, 0);
    }

    .profile-card {
        background-color: rgba(255, 255, 255, 0.1);
        padding: 15px;
        border-radius: 10px;
    }

    .avatar {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 80px;
        height: 80px;
        font-size: 32px;
        border-radius: 50%;
        font-weight: bold;
        color: #000;
        background-color: rgb(255, 191, 0);
        margin: 0 auto;
    }

    .profile-card a {
        font-size: 14px;
        text-decoration: none;
    }

    .profile-card a:hover {
        text-decoration: underline;
        color: rgb(255, 96, 0);
    }

    .logout-wrapper {
        padding-bottom: 1rem;
    }
</style>
