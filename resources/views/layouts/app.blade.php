<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="shortcut icon" href="{{ asset('icons/hijab.png')  }}" type="image/x-icon">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    
    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
            display: flex;
            height: 100vh;
            margin: 0;
            overflow-x: hidden;
        }

        .navbar {
            background-color: #f7be03;
            width: 100%;
            z-index: 1;
            transition: all 0.3s;
        }

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
            color: #fff;
            transition: all 0.3s;
        }

        .navbar-toggler-icon {
            border-color: #fff;
        }

        .navbar-nav .nav-item {
            margin-right: 10px;
        }

        .navbar-nav .nav-link {
            color: #fff;
        }

        .navbar-nav .nav-link:hover {
            color: #eaeaea;
        }

        .sidebar {
            width: 250px;
            background-color: #343a40;
            color: #fff;
            position: fixed;
            top: 0;
            bottom: 0;
            padding-top: 60px;
            left: -250px;
            transition: all 0.3s;
        }

        .sidebar.active {
            left: 0;
        }

        .sidebar a {
            color: #fff;
            display: block;
            padding: 15px;
            text-decoration: none;
        }

        .sidebar a:hover {
            background-color: #495057;
        }

        .content {
            flex-grow: 1;
            padding: 20px;
            transition: margin-left 0.3s;
        }

        .content.active {
            margin-left: 250px;
        }

        .toggle-btn {
            font-size: 20px;
            cursor: pointer;
            color: #fff;
            margin-right: 15px;
        }

        .py-4 {
            min-height: calc(100vh - 150px);
        }

        footer {
            width: 100%;
        }

        @media (max-width: 768px) {
            .content.active {
                margin-left: 0;
            }
        }

        .card {
    transition: transform 0.2s;
}

.card:hover {
    transform: scale(1.05);
}

         .card-title {
        font-size: 1.2rem;
        font-weight: bold;
    }

    .card-text {
        font-size: 0.9rem;
    }

    .card img {
        transition: transform 0.2s ease-in-out;
    }

    .card img:hover {
        transform: scale(1.05);
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004085;
    }

    </style>
</head>
<body>
    <div class="sidebar" id="sidebar">
        <a href="{{ url('/') }}"><i class="bi bi-house"></i> Home</a>
        <a href="{{ url('/dashboard') }}"><i class="bi bi-eye"></i> Lihat Produk</a>
        <a href="{{ url('/produk') }}"><i class="bi bi-list"></i> Data Produk</a>
    </div>

    <div id="app" class="content">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm">
            <div class="container-fluid">
                <span class="toggle-btn" id="toggle-btn"><i class="bi bi-list"></i></span>
                <a class="navbar-brand" href="{{ url('/') }}" id="navbar-brand">
                    <img src="{{ asset('icons/hijab.png') }}" alt="Logo" height="50px" width="50px">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>

        <footer class="text-center text-muted py-3">
            <div class="container">
                &copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}. All rights reserved.
            </div>
        </footer>
    </div>
    
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        document.getElementById('toggle-btn').addEventListener('click', function() {
            var sidebar = document.getElementById('sidebar');
            var content = document.getElementById('app');
            var navbarBrand = document.getElementById('navbar-brand');
            
            sidebar.classList.toggle('active');
            content.classList.toggle('active');
            
            if (sidebar.classList.contains('active')) {
                navbarBrand.style.marginLeft = '250px';
            } else {
                navbarBrand.style.marginLeft = '0';
            }
        });
    </script>
</body>
</html>
