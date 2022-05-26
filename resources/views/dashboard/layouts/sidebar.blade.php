<!-- Sidebar -->
<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-primary">
                <li class="nav-item" id="dashboard">
                    <a href="{{ url('/dashboard') }}">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Data</h4>
                </li>
                <li class="nav-item" id="monitoring">
                    <a href="{{ url('/monitoring') }}">
                        <i class="fas fa-file"></i>
                        <p>Monitoring</p>
                    </a>
                </li>
                @if (Auth::user()->role == 'Admin')
                    <li class="nav-section">
                        <span class="sidebar-mini-icon">
                            <i class="fa fa-ellipsis-h"></i>
                        </span>
                        <h4 class="text-section">Master</h4>
                    </li>
                    <li class="nav-item" id="master-opd">
                        <a href="{{ url('/master-data/opd') }}">
                            <i class="fas fa-building"></i>
                            <p>OPD</p>
                        </a>
                    </li>
                    <li class="nav-item" id="master-indikator">
                        <a href="{{ url('/master-data/indikator') }}">
                            <i class="fas fa-tachometer-alt"></i>
                            <p>Indikator</p>
                        </a>
                    </li>
                    <li class="nav-item" id="master-wilayah">
                        <a href="{{ url('/master-data/kecamatan') }}">
                            <i class="fas fa-map-marked-alt"></i>
                            <p>Wilayah</p>
                        </a>
                    </li>
                    <li class="nav-item" id="master-akun">
                        <a href="{{ url('/master-data/akun') }}">
                            <i class="fas fa-user-circle"></i>
                            <p>Akun</p>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->
