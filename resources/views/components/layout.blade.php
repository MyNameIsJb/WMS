<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>WMS | {{ auth()->user()->level_of_access }}</title>

    {{-- Icon --}}
    <link rel="icon" href="{{ asset('images/warehouse.jpg') }}" type="image/x-icon" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav align-items-center">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ auth()->user()->level_of_access == 'Administrator' ? '/user/lists' : '/profile' }}"
                        class="nav-link">Home</a>
                </li>

                <!-- Navbar Search -->
                <li class="nav-item">
                    <div class="navbar-search-block">
                        <form class="form-inline" action="/user/search" autocomplete="off">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                    value="{{ request('search') }}" name="search" aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <form method="POST" action="/logout">
                        @csrf
                        <button type="submit" class="btn btn-light">
                            <i class="fa-solid fa-right-from-bracket"></i>
                            <span class="button-text">Logout</span>
                        </button>
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="/user/lists" class="brand-link">
                <img src="{{ asset('images/warehouse.jpg') }}" alt="Warehouse Logo" class="brand-image elevation-3"
                    style="opacity: 1">
                <span class="brand-text font-weight-light">WMS | {{ auth()->user()->level_of_access }}</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img class="img-circle elevation-2" width="200"
                            src="{{ auth()->user()->profile_image ? asset('storage/' . auth()->user()->profile_image) : asset('images/blank-profile.png') }}"
                            alt="Profile Image" />
                    </div>
                    <div class="info">
                        <a href="/profile" class="d-block">{{ auth()->user()->name }}</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                                   with font-awesome or any other icon font library -->
                        @if (auth()->user()->level_of_access == 'Administrator')
                        <li class="nav-item">
                            <a href="/user/lists"
                                class="nav-link {{ Request::path() == 'user/lists' ? 'active' : '' }}">
                                <i class="fa-solid fa-list-ul"></i>
                                <p>
                                    Users List
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/product/lists"
                                class="nav-link {{ Request::path() == 'product/lists' ? 'active' : '' }}">
                                <i class=" fa-solid fa-cart-plus"></i>
                                <p>
                                    Products List
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/gallery" class="nav-link {{ Request::path() == 'gallery' ? 'active' : '' }}">
                                <i class="fa-solid fa-image"></i>
                                <p>
                                    Gallery
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#"
                                class="nav-link {{ Request::path() == 'warehouse-inventory' || Request::path() == 'store-inventory' ? 'active' : '' }}">
                                <i class="fa-solid fa-cart-flatbed"></i>
                                <p>
                                    Inventory
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/warehouse-inventory" class="nav-link">
                                        {!! Request::path() == 'warehouse-inventory' ? '<i
                                            class="fa-solid fa-circle nav-icon"></i>'
                                        : '<i class="far fa-circle nav-icon"></i>' !!}
                                        <p>Warehouse Inventory</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/store-inventory" class="nav-link">
                                        {!! Request::path() == 'store-inventory' ? '<i
                                            class="fa-solid fa-circle nav-icon"></i>'
                                        : '<i class="far fa-circle nav-icon"></i>' !!}
                                        <p>Store Inventory</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#"
                                class="nav-link {{ Request::path() == 'sales' || Request::path() == 'purchase' ? 'active' : '' }}">
                                <i class="fa-solid fa-peso-sign"></i>
                                <p>
                                    Sales and Purchase
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/sales" class="nav-link">
                                        {!! Request::path() == 'sales' ? '<i class="fa-solid fa-circle nav-icon"></i>'
                                        : '<i class="far fa-circle nav-icon"></i>' !!}
                                        <p>Sales</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/purchase" class="nav-link">
                                        {!! Request::path() == 'purchase' ? '<i
                                            class="fa-solid fa-circle nav-icon"></i>'
                                        : '<i class="far fa-circle nav-icon"></i>' !!}
                                        <p>Purchase</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link {{ Request::path() == 'incoming-product' 
                                || Request::path() == 'outgoing-product' 
                                || Request::path() == 'stock-replenishment' ? 'active' : '' }}">
                                <i class="fa-solid fa-file-contract"></i>
                                <p>
                                    Product Monitoring
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/incoming-product" class="nav-link">
                                        {!! Request::path() == 'incoming-product' ? '<i
                                            class="fa-solid fa-circle nav-icon"></i>'
                                        : '<i class="far fa-circle nav-icon"></i>' !!}
                                        <p>Incoming Product</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/outgoing-product" class="nav-link">
                                        {!! Request::path() == 'outgoing-product' ? '<i
                                            class="fa-solid fa-circle nav-icon"></i>'
                                        : '<i class="far fa-circle nav-icon"></i>' !!}
                                        <p>Outgoing Product</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/stock-replenishment" class="nav-link">
                                        {!! Request::path() == 'stock-replenishment' ? '<i
                                            class="fa-solid fa-circle nav-icon"></i>'
                                        : '<i class="far fa-circle nav-icon"></i>' !!}
                                        <p>Stock Replenishment</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa-solid fa-arrow-rotate-left"></i>
                                <p>
                                    Returned Items
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="fa-solid fa-rectangle-list"></i>
                                <p>
                                    Reports
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Audit Trail</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Sales Report</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Purchase Report</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Incoming Product</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Outgoing Product</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Stock Replenishment</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Delivered Product</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Received Product</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Billing Report</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa-solid fa-circle-question"></i>
                                <p>
                                    Help
                                </p>
                            </a>
                        </li>
                        @elseif (auth()->user()->level_of_access == 'Staff')

                        @elseif (auth()->user()->level_of_access == 'Store')
                        @endif
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            {{ $slot }}
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <footer class="main-footer text-center">
            <!-- Default to the left -->
            <strong>Copyright &copy; 2021 <a href="https://cgabnb.online/">CGAWarehouse.com</a>.</strong> All rights
            reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>

    {{-- Sweet Alert CDN --}}
    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
</body>

</html>