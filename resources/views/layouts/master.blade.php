<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <title> @yield('title') | Webadmin - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('build/images/favicon.ico') }}">

    <!-- include head css -->
    @include('layouts.head-css')
    @livewireStyles
</head>

@yield('body')

<!-- Begin page -->
<div id="layout-wrapper">
    <!-- topbar -->
    @include('layouts.topbar')

    <!-- sidebar components -->
    @include('layouts.sidebar')
    @include('layouts.horizontal')

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">
                @yield('content')
            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        <!-- footer -->
        @include('layouts.footer')
        @auth
            <livewire:client.form-reminder />
        @endauth

    </div>
    <!-- end main content-->
</div>
<!-- END layout-wrapper -->

<!-- vendor-scripts -->
@livewireScripts
@include('layouts.vendor-scripts')
       <script>
            document.addEventListener('close-quiz-modal', () => {
                console.log('hola');
                const modal = bootstrap.Modal.getInstance(document.getElementById('quizModal'));
                if (modal) {
                    modal.hide();
                }
            });
        </script>
</body>

</html>
