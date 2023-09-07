<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/home" class="brand-link">
        {{-- <img src="{{ asset('admin/dist/images/logo-lam-kprs.png') }}" alt="AdminLTE Logo" style="width:200px"> --}}
        <img src="{{ asset('admin/dist/images/Logo.jpg') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-2"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Sirop Kesambi</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a class="d-block">{{ Auth::User()->name }}</a>
            </div>
        </div> --}}

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link @yield('dashboard')">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('product.index') }}" class="nav-link @yield('product')">
                        <i class="nav-icon fas fa-box-open"></i>
                        <p>
                            Produk
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('transaction.index') }}" class="nav-link @yield('transaction')">
                        <i class="nav-icon fas fa-shopping-cart"></i>
                        <p>
                            Transaksi
                        </p>
                    </a>
                </li>

                @role('admin')
                    <li class="nav-item">
                        <a href="{{ route('user.index') }}" class="nav-link @yield('user')">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                User
                            </p>
                        </a>
                    </li>
                @endrole

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
