<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home.index') }}">
        <div class="sidebar-brand-icon">
            <img src="img/logo.png" alt="logo" width="50" height="50"/>
        </div>
        <div class="sidebar-brand-text mx-3">Đại học Nha Trang</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    @include('partials.sidebar-menu-item', [
        'route' => 'home.index',
        'icon' => 'fa fa-home',
        'title' => 'Trang chủ'
    ])

    <div id="sticky-sidebar" style="position: sticky;">
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
        Bảng điều khiển
    </div>

    @if (!empty($tieuChuans))
        @foreach ($tieuChuans as $tieuChuan)
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#nav-tieu-chuan-{{ $tieuChuan->stt }}"
                    aria-expanded="true" aria-controls="nav-tieu-chuan-{{ $tieuChuan->stt }}">
                    <i class="fas fa-server"></i>
                    <span>Tiêu chuẩn {{ $tieuChuan->stt }}</span>
                </a>
                <div id="nav-tieu-chuan-{{ $tieuChuan->stt }}" class="collapse" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item baocao-scrollItem" href="#modau-tieuchuan-{{ $tieuChuan->stt }}"><i class="fas fa-server"></i>&nbsp;&nbsp;Mở đầu</a>
                        @foreach($tieuChuan->tieuChi as $key => $tieuChi)
                            @if($loop->first)
                                @continue
                            @endif
                            <a class="collapse-item baocao-scrollItem" href="#tieuchi-{{ $tieuChuan->stt }}-{{ $tieuChi->stt }}"><i class="fas fa-server"></i>&nbsp;&nbsp;Tiêu chí {{ $tieuChuan->stt }}.{{ $tieuChi->stt }}</a>
                        @endforeach
                        <a class="collapse-item baocao-scrollItem" href="#ketluan-tieuchuan-{{ $tieuChuan->stt }}"><i class="fas fa-server"></i>&nbsp;&nbsp;Kết luận</a>
                    </div>
                </div>
            </li>
        @endforeach
    @endif

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-block">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
    </div>

</ul>
