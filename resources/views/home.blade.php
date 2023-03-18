@extends('layouts.index', ['title' => 'Trang chủ'])

@section('content')
    <h3 class="font-weight-bold text-primary mb-2 text-uppercase">Danh mục</h3>
    <div class="row">
        @can('capdanhgia-danhsach')
            @include('partials.home-menu-item', [
                'color' => 1,
                'route' => 'capdanhgia.index',
                'icon' => 'fas fa-server',
                'title' => 'Cấp đánh giá'
            ])
        @endcan
        @can('dotdanhgia-danhsach')
            @include('partials.home-menu-item', [
                'color' => 1,
                'route' => 'dotdanhgia.index',
                'icon' => 'fas fa-server',
                'title' => 'Đợt đánh giá'
            ])
        @endcan

            @can('botieuchuan-danhsach')
                @include('partials.home-menu-item', [
                    'color' => 1,
                    'route' => 'botieuchuan.index',
                    'icon' => 'fas fa-server',
                    'title' => 'Bộ tiêu chẩn'
                ])
            @endcan

        @can('tieuchuan-danhsach')
            @include('partials.home-menu-item', [
                'color' => 2,
                'route' => 'tieuchuan.index',
                'icon' => 'fas fa-server',
                'title' => 'Tiêu chuẩn'
            ])
        @endcan

        @can('tieuchi-danhsach')
            @include('partials.home-menu-item', [
                'color' => 3,
                'route' => 'tieuchi.index',
                'icon' => 'fas fa-server',
                'title' => 'Tiêu chí'
            ])
        @endcan

        @can('nguoidung-danhsach')
            @include('partials.home-menu-item', [
                'color' => 4,
                'route' => 'nguoidung.index',
                'icon' => 'fas fa fa-user',
                'title' => 'Người dùng'
            ])
        @endcan

        @can('donvi-danhsach')
            @include('partials.home-menu-item', [
                'color' => 5,
                'route' => 'donvi.index',
                'icon' => 'fas fa-building',
                'title' => 'Đơn vị'
            ])
        @endcan

        @can('nganh-danhsach')
            @include('partials.home-menu-item', [
                'color' => 6,
                'route' => 'nganh.index',
                'icon' => 'fas fa-briefcase',
                'title' => 'Ngành'
            ])
        @endcan

        @can('nhom-danhsach')
            @include('partials.home-menu-item', [
                'color' => 1,
                'route' => 'nhom.index',
                'icon' => 'fas fa fa-users',
                'title' => 'Nhóm'
            ])
        @endcan


        @can('minhchung-danhsach')
            @include('partials.home-menu-item', [
                'color' => 3,
                'route' => 'minhchung.index',
                'icon' => 'fa fa-paperclip',
                'title' => 'Minh chứng'
            ])
        @endcan

            @can('loaiminhchung-danhsach')
                @include('partials.home-menu-item', [
                    'color' =>2,
                    'route' => 'loaiminhchung.index',
                    'icon' => 'fas fa-server',
                    'title' => 'Loại minh chứng'
                ])
            @endcan

        @can('vaitrohethong-danhsach')
            @include('partials.home-menu-item', [
                'color' => 4,
                'route' => 'vaitrohethong.index',
                'icon' => 'fa fa-wrench',
                'title' => 'Vai trò hệ thống'
            ])
        @endcan
    </div>
    <h3 class="font-weight-bold text-primary mb-2 text-uppercase">Tự đánh giá</h3>
    <div class="row">
        @can('quanlynhom')
            @include('partials.home-menu-item', [
                'color' => 4,
                'route' => 'quanlynhom.index',
                'icon' => 'fas fa fa-users',
                'title' => 'Quản lý nhóm'
            ])
        @endcan

        @can('baocao-danhsach')
            @include('partials.home-menu-item', [
                'color' => 5,
                'route' => 'baocao.index',
                'icon' => 'fas fa-pencil-alt',
                'title' => 'Viết báo cáo'
            ])
        @endcan

        @can('nhanxetbaocao-danhsach')
            @include('partials.home-menu-item', [
                'color' => 6,
                'route' => 'nhanxetbaocao.index',
                'icon' => 'fa fa-comments',
                'title' => 'Nhận xét báo cáo'
            ])
        @endcan

        @can('phanbienbaocao-danhsach')
            @include('partials.home-menu-item', [
                'color' => 1,
                'route' => 'phanbienbaocao.index',
                'icon' => 'fa fa-comments',
                'title' => 'Phản biện báo cáo'
            ])
        @endcan

        @can('tiendo-danhsach')
            @include('partials.home-menu-item', [
                'color' => 7,
                'route' => 'tiendobaocao.index',
                'icon' => 'fa fa-tasks',
                'title' => 'Tiến độ báo cáo'
            ])
        @endcan
    </div>
@endsection
