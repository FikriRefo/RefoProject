<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #632323">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{ asset('/metalcluster.jpg') }}" alt="Metal Cluster" class="brand-image " style="width: 30px; height: auto; margin-right: 10px;">
        <span class="brand-text font-weight-light">Metal Cluster</span>
    </a>
  
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>
  
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Dashboard -->
                <li class="nav-item @if(request()->is('home*')) menu-open @endif">
                    <a href="{{ route('home') }}" class="nav-link @if(request()->is('home*')) active @endif">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                {{-- {{ dd(auth()->user()->role) }} --}}
                
                @if(auth()->user()->role === 'Admin')
                    <!-- Master User -->
                    <li class="nav-item {{ request()->is('master-user*') ? 'menu-open' : '' }}">
                        <a href="{{ route('master.user.index') }}" class="nav-link {{ request()->is('master-user*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-users"></i>
                            <p>Form Master User</p>
                        </a>
                    </li>                    

                    <!-- Master Karyawan -->
                    <li class="nav-item @if(request()->is('master-karyawan*')) menu-open @endif">
                        <a href="{{ route('master-karyawan.index') }}" class="nav-link @if(request()->is('master-karyawan*')) active @endif">
                            <i class="nav-icon fas fa-id-card"></i>
                            <p>
                                Form Master Karyawan
                            </p>
                        </a>
                    </li>
                    
                @endif

                <!-- Perhitungan Gaji -->
                <li class="nav-item @if(request()->is('perhitungan-gaji*')) menu-open @endif">
                    <a href="{{ route('perhitungan.gaji.index') }}" class="nav-link @if(request()->is('perhitungan-gaji*')) active @endif">
                        <i class="nav-icon fas fa-calculator"></i>
                        <p>
                            Form Perhitungan Gaji
                        </p>
                    </a>
                </li>

                <!-- Rekap Perhitungan Gaji -->
                <li class="nav-item @if(request()->is('rekap-perhitungan-gaji*')) menu-open @endif">
                    <a href="{{ route('rekap.perhitungan.gaji.index') }}" class="nav-link @if(request()->is('rekap-perhitungan-gaji*')) active @endif">
                        <i class="nav-icon fas fa-file-pdf"></i>
                        <p>
                            Report Rekap Perhitungan Gaji
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
