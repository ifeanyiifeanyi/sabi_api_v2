<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('logo/favicon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('logo/favicon.png') }}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- seo tags -->
    <title>{{ config('app.name') }} :: @yield('title')</title>
    <meta name="description"
        content="Discover the profound teachings of Catholic Catechism with Sabi Catechism. Explore a comprehensive collection of articles, lessons, and timeless wisdom, enhancing your understanding of Catholic faith and doctrine. Join us on a journey of spiritual growth and enlightenment">
    <meta name="keywords" content="catechism, catholic, religion">
    <link rel="canonical" href="{{ config('app.url') }}">
    <meta name="robots" content="index, follow">
    <meta property="og:title" content="{{ config('app.name') }}">
    <meta property="og:description"
        content="Discover the profound teachings of Catholic Catechism with Sabi Catechism. Explore a comprehensive collection of articles, lessons, and timeless wisdom, enhancing your understanding of Catholic faith and doctrine. Join us on a journey of spiritual growth and enlightenment">
    <meta property="og:image" content="{{ asset('logo/favicon.png') }}">
    <meta name="twitter:card" content="Discover the profound teachings of Catholic Catechism with Sabi Catechism.">
    <meta name="twitter:site" content="@YourTwitterHandle">
    <meta name="twitter:title" content="{{ config('app.name') }}">
    <meta name="twitter:description"
        content="Discover the profound teachings of Catholic Catechism with Sabi Catechism. Explore a comprehensive collection of articles, lessons, and timeless wisdom, enhancing your understanding of Catholic faith and doctrine. Join us on a journey of spiritual growth and enlightenment">
    <meta name="twitter:image" content="{{ asset('logo/favicon.png') }}">

    <!-- seo tags ends-->

    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('backend/assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="{{ asset('backend/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('backend/assets/css/argon-dashboard.css?v=2.0.4') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    @yield('mystyles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" />

</head>

<body class="g-sidenav-show dark-version">
    @include('admin.layouts.aside')
    <main class="main-content position-relative border-radius-lg ">
        <!-- Navbar -->
        @include('admin.layouts.navbar')
        <!-- End Navbar -->

        @yield('adminlayout')
        @include('admin.layouts.footer')

    </main>

    @include('admin.layouts.others')
    <!--   Core JS Files   -->
    <script src="{{ asset('backend/assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
    @yield('scripts')
    @yield('videoScripts')
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('backend/assets/js/argon-dashboard.min.js?v=2.0.4') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        @if(Session::has('message'))
        let type = "{{ Session::get('alert-type','info') }}"
        switch (type) {
            case 'info':
                toastr.info(" {{ Session::get('message') }} ");
                break;

            case 'success':
                toastr.success(" {{ Session::get('message') }} ");
                break;

            case 'warning':
                toastr.warning(" {{ Session::get('message') }} ");
                break;

            case 'error':
                toastr.error(" {{ Session::get('message') }} ");
                break;
        }
        @endif

    </script>

    <script src="https://cdn.ckeditor.com/ckeditor5/35.3.2/classic/ckeditor.js"></script>

    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor1'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
</body>

</html>
