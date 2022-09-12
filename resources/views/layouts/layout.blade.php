<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    {{-- <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> --}}
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ config('app.name', 'Laravel') }}</title>


    {{-- <title>SB Admin 2 - Charts</title> --}}

    <!-- Custom fonts for this template-->
    <link href="{{asset('template/vendor/fontawesome-free-v6/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('template/css/sb-admin-2.min.css')}}" rel="stylesheet">

    <!-- Toastr style -->
    <link href="{{asset('Toastr/build/toastr.min.css')}}" rel="stylesheet" type="text/css">

    <!-- DataTable style -->
    <link href="{{asset('DataTables/DataTables-1.12.1/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">


    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

    <!-- Fonts -->
    {{-- <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('template/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('template/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('template/js/sb-admin-2.min.js')}}"></script>

    <!-- Toastr scripts -->
    <script src="{{asset('Toastr/build/toastr.min.js')}}"></script>

    <!-- DataTable scripts -->
    <script src="{{asset('DataTables/datatables.min.js')}}"></script>

</head>
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column bg-gradient-primary">

            <!-- Main Content -->
            <div id="layout" style="height: 810px;">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @guest
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">New user</span>
                                @else
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Auth::user()->name}}</span>
                                <img class="img-profile rounded-circle"
                                    src="{{asset('template/img/undraw_profile.svg')}}">
                                @endguest
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                @guest
                                    <a class="dropdown-item" href='/login'>Login</a>
                                    <a class="dropdown-item" href='/register'>Register</a>
                                @else
                                    

                                <a class="dropdown-item" data-toggle="modal" data-target="#logoutModal" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                </form>
                                @endguest
                            </div>
                        </li>

                    </ul>

                </nav>

                <main class="py-4">
                    @yield('content')
                </main>

            </div>

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; To Do List</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>

    </div>

</body>
</html>
