<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Application')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f8f9fa;
            padding-top: 75px;
        }

        .navbar {
            background-color: #ffffff;
            border-bottom: 1px solid #ddd;
            justify-content: center;
        }

        .navbar-brand img {
            max-height: 50px;
            height: auto;
            width: auto;
            margin-right: 15px;
        }

        .navbar-nav {
            margin-right: auto;
        }

        .navbar-nav .nav-link {
            color: #555;
            padding: 15px 25px;
            transition: color 0.3s, text-decoration 0.3s;
            font-weight: bold;
        }

        .navbar-nav .nav-link:hover {
            color: #28a745;
            text-decoration: underline;
        }

        .navbar-nav .nav-link:active {
            transform: scale(0.95);
        }

        .container {
            margin-top: 20px;
        }

        .content-area {
            margin-top: 40px;
        }

        .card {
            margin-bottom: 30px;
            border: none;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        @media (max-width: 768px) {
            .navbar-nav .nav-link {
                padding: 10px;
            }
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('products.index') }}">
                <img src="{{ asset('storage/images/logodongho.jpg') }}" alt="My Application">
            </a>
            <div class="navbar-collapse collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/admin/products') }}">PRODUCT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/admin/categories') }}">CATEGORIES</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('admin/orders') }}">Quản Lý Đơn Hàng</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/admin/reports') }}">Báo Cáo</a>
                    </li>

                </ul>
            </div>

            <div class="d-flex align-items-center">
                <!-- Dropdown cho Logout -->
                <div class="dropdown">
                    <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ asset('storage/images/TKND.jpg') }}" alt="Tài khoản" style="width: 50px; height: 50px;">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li>
                            <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"style="font-size: 20px; font-weight: bold;">
                                <img src="{{ asset('storage/images/IconLG.png') }}" alt="Logout" style="width: 40px; height: 35px; margin-right: 8px;">
                                Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </nav>

    <div class="container content-area">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
