<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin Project') | MyProfile</title>
    <link rel="stylesheet" href="{{ asset('bootstrap-5.3.8-dist/css/bootstrap.min.css') }}">
    <script src="{{ asset('bootstrap-5.3.8-dist/js/bootstrap.bundle.min.js') }}"></script>
    <style>
        :root { --unpam-yellow: #ffc400; --admin-dark: #293441; }
        body { background: #f4f6f9; }
        .admin-header { background: var(--unpam-yellow); min-height: 68px; }
        .brand-mark { width: 42px; height: 42px; display: inline-flex; align-items: center; justify-content: center; border-radius: 50%; background: #fff; border: 2px solid #263238; color: #263238; font-weight: 800; }
        .admin-sidebar { background: var(--admin-dark); min-height: calc(100vh - 68px); }
        .admin-sidebar .nav-link { color: #d9e0e7; border-radius: .5rem; padding: .75rem .9rem; }
        .admin-sidebar .nav-link:hover, .admin-sidebar .nav-link.active { color: #fff; background: rgba(255,255,255,.14); }
        .admin-main { min-height: calc(100vh - 120px); }
        .stat-card { border: 0; border-radius: 1rem; }
        .stat-icon { width: 46px; height: 46px; display: inline-flex; align-items: center; justify-content: center; border-radius: .8rem; background: #fff3c4; color: #6b5200; font-size: 1.25rem; }
        .table > :not(caption) > * > * { padding: .85rem; }
    </style>
</head>
<body>
<header class="admin-header shadow-sm">
    <nav class="navbar navbar-expand-lg py-2">
        <div class="container-fluid px-3 px-lg-4">
            <a class="navbar-brand d-flex align-items-center gap-2 me-4" href="{{ route('admin.dashboard') }}">
                <span class="brand-mark">SI</span>
                <span class="lh-sm">
                    <strong class="d-block text-dark">UNIVERSITAS PAMULANG</strong>
                    <small class="text-dark">SISTEM INFORMASI</small>
                </span>
            </a>
            <button class="navbar-toggler border-dark" type="button" data-bs-toggle="collapse" data-bs-target="#adminTopNav" aria-controls="adminTopNav" aria-expanded="false" aria-label="Buka menu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="adminTopNav">
                <div class="navbar-nav ms-auto align-items-lg-center gap-lg-2 pt-3 pt-lg-0">
                    <a class="nav-link fw-semibold text-dark px-3" href="{{ route('admin.dashboard') }}">Dashboard</a>
                    <form action="{{ route('admin.logout') }}" method="POST" class="m-0">
                        @csrf
                        <button type="submit" class="btn btn-dark btn-sm px-3">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>
</header>

<div class="container-fluid">
    <div class="row">
        <aside class="col-lg-2 col-md-3 admin-sidebar px-3 py-4">
            <div class="text-uppercase small fw-bold text-white-50 px-2 mb-3">Admin Menu</div>
            <nav class="nav flex-column gap-1">
                <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                    <span class="me-2">▦</span> Dashboard
                </a>
                <a class="nav-link {{ request()->routeIs('admin.projects.*') ? 'active' : '' }}" href="{{ route('admin.projects.index') }}">
                    <span class="me-2">▤</span> Data Project
                </a>
            </nav>
            <hr class="border-secondary my-4">
            <a class="nav-link" href="{{ route('project.index') }}"><span class="me-2">↗</span> Lihat Website</a>
        </aside>

        <main class="col-lg-10 col-md-9 admin-main px-3 px-lg-4 py-4">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
                </div>
            @endif
            @yield('content')
        </main>
    </div>
</div>

<footer class="bg-white text-center border-top py-3 text-secondary small">
    &copy; {{ date('Y') }} MyProfile. All rights reserved.
</footer>
</body>
</html>
