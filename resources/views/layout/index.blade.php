<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- [Google Font : Public Sans] icon -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@700..700&display=swap" rel="stylesheet" />
    <title>@yield('title')</title>
    @vite(['resources/css/app.css'])
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('fonts/material.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body
    data-pc-preset="preset-1"
    data-pc-sidebar-theme="dark"
    data-pc-header-theme="light"
    data-pc-sidebar-caption="true"
    data-pc-direction="ltr"
    data-pc-theme="light"
    class="landing-page">

    <!-- Sidebar -->
    @include('layout.sidebar')

    <!-- Header -->
    @include('layout.header')
    <div class="pc-container">
        <div class="pc-content">
            @include('layout.breadcrumb')
            <!-- [ Main Content ] start -->
            <div class="row">
                <div class="col-sm-12">
                    @yield('content')
                </div>
            </div>
            <!-- [ Main Content ] end -->
        </div>
    </div>
    <!-- Footer -->
    @include('layout.footer')

    @vite(['resources/js/app.js'])

    @stack('scripts')
    <script src="{{ asset('js/pcoded.js') }}"></script>
    <script>
        layout_change('light');
        layout_sidebar_change('dark');
        layout_sidebar_change('dark');
        change_box_container('false');
        layout_caption_change('true');
        layout_rtl_change('false');
        preset_change('preset-1');
    </script>

    <!-- [Page Specific JS] start -->
    <script>
        // Start [ Menu hide/show on scroll ]
        let ost = 0;
        document.addEventListener('scroll', function() {
            let cOst = document.documentElement.scrollTop;
            if (cOst == 0) {
                document.querySelector('.navbar').classList.add('top-nav-collapse');
            } else if (cOst > ost) {
                document.querySelector('.navbar').classList.add('top-nav-collapse');
                document.querySelector('.navbar').classList.remove('default');
            } else {
                document.querySelector('.navbar').classList.add('default');
                document.querySelector('navbar').classList.remove('top-nav-collapse');
            }
            ost = cOst;
        });
        // End [ Menu hide/show on scroll ]
    </script>
</body>

</html>
