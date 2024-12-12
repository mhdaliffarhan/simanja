<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>
        {{-- <li class="nav-item">
          <a class="nav-link collapsed" href="{{ url('input-angka-kredit') }}">
              <i class="bi bi-pencil"></i>
              <span>Input Angka Kredit</span>
          </a>
      </li>
      <li class="nav-item">
          <a class="nav-link collapsed" href="{{ url('database-pegawai') }}">
              <i class="bi bi-layout-text-window-reverse"></i>
              <span>Database Pegawai</span>
          </a>
      </li> --}}
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('transaksi') }}">
                <i class="bi bi-credit-card"></i>
                <span>Transaksi</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('database-penyedia') }}">
                <i class="bi bi-layout-text-window-reverse"></i>
                <span>Database Penyedia</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('database-produk') }}">
                <i class="bi bi-cart2"></i>
                <span>Database Produk</span>
            </a>
        </li>

        {{-- MENU SUPERVISOR --}}
        @if (auth()->user()->role == 'supervisor')
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-people"></i><span>Menu Supervisor</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ url('daftar-pengentri') }}">
                            <i class="bi bi-circle"></i><span>Daftar Pengentri</span>
                        </a>
                    </li>
                    {{-- FITUR ASPEK KINERJA DINAMIS UNTUK PENGEMBANGAN LEBIH LANJUT --}}
                    {{-- <li>
                        <a href="{{ url('aspek-kinerja') }}">
                            <i class="bi bi-circle"></i><span>Aspek Kinerja</span>
                        </a>
                    </li> --}}
                    {{-- <li>
                        <a href="{{ url('daftar-jabatan') }}">
                            <i class="bi bi-circle"></i><span>Daftar Jabatan</span>
                        </a>
                    </li> --}}
                </ul>
            </li><!-- End Master Nav -->
        @endif


        <!-- Add more sidebar items as needed -->
    </ul>
</aside>
