<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        @media (min-width: 768px) {
            .main-content {
                margin-left: 250px;
            }
        }

        body {
            background-color: rgb(235, 234, 232);
        }

        .breadcrumb {
            background-color: rgb(235, 234, 232) !important;
        }

        .breadcrumb-item a {
            color: rgb(0, 0, 0);
            text-decoration: none;
        }

        .breadcrumb-item.active {
            color: rgb(255, 96, 0);
            font-weight: 600;
        }
    </style>
</head>

<body>

    {{-- Sidebar --}}
    @include('layouts.partials.sidebar')

    {{-- Konten utama --}}
    <div class="main-content p-4">
        @yield('content')
    </div>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
