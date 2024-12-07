<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hệ thống cảnh báo lũ lụt</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    @yield('style')
</head>

<body>
    <div id="main">
        <!-- NAV -->
        <div id="header" class="position-fixed top-0 start-0 w-100">
            <a href="{{ route('home') }}" id="title__header">Hệ thống cảnh báo lũ lụt</a>
            <div class="nav">
                <ul>
                    {{-- {{ Illuminate\Support\Facades\Auth::logout()}} --}}
                    <li><a href="{{ route('home') }}" id="home"
                            class="{{ \Request::route()->getName() == 'home' ? 'active' : '' }}">Trang chủ</a></li>
                    @auth
                        <li><a href="{{ route('add-device') }}" id="add-device"
                                class="{{ \Request::route()->getName() == 'add-device' ? 'active' : '' }}">Thêm thiết bị</a>
                        </li>
                        <li><a href="{{ route('profile') }}" id="profile"
                                class="{{ \Request::route()->getName() == 'profile' ? 'active' : '' }}">Hồ sơ</a></li>
                        <li>
                            <form action="{{ route('logout') }}" id="logout" method="POST">
                                @csrf
                                <input type="submit" value="Đăng xuất">
                            </form>
                        </li>
                    @else
                        <li>
                            <a href="{{ route('login') }}" id="login"
                                class="{{ \Request::route()->getName() == 'login' ? 'active' : '' }}">Đăng nhập</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
        <!-- NAV -->


        <div class="mt-10">
            @yield('content')
        </div>
        

        <div id="footer">

        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/annotations.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script src="{{ asset('js/scrip.js') }}"></script>
    @yield('js')
</body>

</html>
