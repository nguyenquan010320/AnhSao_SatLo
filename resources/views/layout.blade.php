<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                  <a class="navbar-brand" href="{{ route('home') }}"  id="title__header">Hệ thống cảnh báo sạt lở</a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse flo" id="navbarSupportedContent">
                    <div class="me-auto"></div>
                    <ul class="navbar-nav mb-2 mb-lg-0">
                      <li class="nav-item">
                        <a href="{{ route('home') }}" id="home"
                            class="nav-link {{ \Request::route()->getName() == 'home' ? 'active' : '' }}">Trang chủ</a>
                      </li>
                      @auth
                      <li class="nav-item">
                        <a href="{{ route('add-device') }}" id="add-device"
                                class="nav-link {{ \Request::route()->getName() == 'add-device' ? 'active' : '' }}">Thêm thiết bị</a>
                      </li>
                      <li class="nav-item dropdown">
                        <a href="{{ route('profile') }}" id="profile"
                        class="nav-link {{ \Request::route()->getName() == 'profile' ? 'active' : '' }}">Hồ sơ</a>
                      </li>
                      <li class="nav-item">
                        <div class="nav-link">
                            <form action="{{ route('logout') }}" id="logout" method="POST">
                                @csrf
                                <input type="submit" class="btn_logout" value="Đăng xuất">
                            </form>
                        </div>
                        
                      </li>
                      @else
                      <li>
                        <a href="{{ route('login') }}" id="login"
                            class="nav-link {{ \Request::route()->getName() == 'login' ? 'active' : '' }}">Đăng nhập</a>
                    </li>
                      @endauth
                    </ul>
                  </div>
                </div>
              </nav>
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
