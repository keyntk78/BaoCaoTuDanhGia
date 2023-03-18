<!DOCTYPE html>
<html lang="vi">

<head>
    @include('partials.head')
    <title>{{ $title }}</title>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        @if (!empty($isShowBaoCao) && $isShowBaoCao)
        @include('partials.sidebar-baocao', ['tieuChuans' => !empty($tieuChuans) ? $tieuChuans : null])
        @else
        <!-- Sidebar -->
        @include('partials.sidebar')
        <!-- End of Sidebar -->
        @endif

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('partials.topbar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Breadcrumb -->
                    @yield('breadcrumb')

                    <!-- Page Heading -->
                    @yield('page-heading')

                    <!-- Message -->
                    @yield('message')

                    <!-- Content -->
                    @yield('content')

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            @include('partials.footer')
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    @include('partials.scroll-to-top-button')

    <!-- Logout Modal-->
    @include('partials.logout-modal')

    <!-- Scripts -->
    @include('partials.scripts')

</body>

</html>
