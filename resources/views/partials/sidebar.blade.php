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

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Danh mục
    </div>

    @can('capdanhgia-danhsach')
    @include('partials.sidebar-menu-item', [
        'route' => 'capdanhgia.index',
        'icon' => 'fas fa-server',
        'title' => 'Cấp đánh giá'
    ])
    @endcan

    @can('dotdanhgia-danhsach')
    @include('partials.sidebar-menu-item', [
        'route' => 'dotdanhgia.index',
        'icon' => 'fas fa-server',
        'title' => 'Đợt đánh giá'
    ])
    @endcan

    @can('botieuchuan-danhsach')
    @include('partials.sidebar-menu-item', [
        'route' => 'botieuchuan.index',
        'icon' => 'fas fa-server',
        'title' => 'Bộ tiêu chuẩn'
    ])
    @endcan

    @can('tieuchuan-danhsach')
    @include('partials.sidebar-menu-item', [
        'route' => 'tieuchuan.index',
        'icon' => 'fas fa-server',
        'title' => 'Tiêu chuẩn'
    ])
    @endcan

    @can('tieuchi-danhsach')
    @include('partials.sidebar-menu-item', [
        'route' => 'tieuchi.index',
        'icon' => 'fas fa-server',
        'title' => 'Tiêu chí'
    ])
    @endcan

    @can('nguoidung-danhsach')
    @include('partials.sidebar-menu-item', [
        'route' => 'nguoidung.index',
        'icon' => 'fas fa fa-user',
        'title' => 'Người dùng'
    ])
    @endcan

    @can('chucvu-danhsach')
        @include('partials.sidebar-menu-item', [
            'route' => 'chucvu.index',
            'icon' => 'fas fa-users-cog',
            'title' => 'Chức vụ'
        ])
    @endcan

    @can('donvi-danhsach')
    @include('partials.sidebar-menu-item', [
        'route' => 'donvi.index',
        'icon' => 'fas fa-building',
        'title' => 'Đơn vị'
    ])
    @endcan

    @can('nganh-danhsach')
    @include('partials.sidebar-menu-item', [
        'route' => 'nganh.index',
        'icon' => 'fas fa-briefcase',
        'title' => 'Ngành'
    ])
    @endcan

    @can('nhom-danhsach')
    @include('partials.sidebar-menu-item', [
        'route' => 'nhom.index',
        'icon' => 'fas fa fa-users',
        'title' => 'Nhóm'
    ])
    @endcan

    @can('minhchung-danhsach')
    @include('partials.sidebar-menu-item', [
        'route' => 'minhchung.index',
        'icon' => 'fa fa-paperclip',
        'title' => 'Minh chứng'
    ])
    @endcan


    @can('vaitrohethong-danhsach')
    @include('partials.sidebar-menu-item', [
        'route' => 'vaitrohethong.index',
        'icon' => 'fa fa-wrench',
        'title' => 'Vai trò hệ thống'
    ])
    @endcan

    @can('baocaogk-danhsach')
        @include('partials.sidebar-menu-item', [
              'route' => 'baocaogiuaky.index',
              'icon' => 'fas fa-pencil-alt',
              'title' => 'Báo cáo giữa kỳ'
          ])
    @endcan


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Tự đánh giá
    </div>

    @can('quanlynhom')
    @include('partials.sidebar-menu-item', [
        'route' => 'quanlynhom.index',
        'icon' => 'fas fa fa-users',
        'title' => 'Quản lý nhóm'
    ])
    @endcan

    @can('baocao-danhsach')
    @include('partials.sidebar-menu-item', [
        'route' => 'baocao.index',
        'icon' => 'fas fa-pencil-alt',
        'title' => 'Viết báo cáo'
    ])
    @endcan



    @can('nhanxetbaocao-danhsach')
    @include('partials.sidebar-menu-item', [
        'route' => 'nhanxetbaocao.index',
        'icon' => 'fa fa-comments',
        'title' => 'Nhận xét báo cáo'
    ])
    @endcan

    @can('phanbienbaocao-danhsach')
    @include('partials.sidebar-menu-item', [
        'route' => 'phanbienbaocao.index',
        'icon' => 'fa fa-comments',
        'title' => 'Phản biện báo cáo'
    ])
    @endcan

    @can('tiendo-danhsach')
    @include('partials.sidebar-menu-item', [
        'route' => 'tiendobaocao.index',
        'icon' => 'fa fa-tasks',
        'title' => 'Tiến độ báo cáo'
    ])
    @endcan

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
