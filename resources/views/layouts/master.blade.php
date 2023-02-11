<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.title-meta')
    @include('layouts.head')
</head>
<body>
     <!-- Begin page -->
     <div class="layout-wrapper d-lg-flex">
         <!-- Start left sidebar-menu -->
        @include('layouts.sidebar')
        <!-- end left sidebar-menu -->

        @yield('content')
    </div>
    <!-- END layout-wrapper -->
<!-- JAVASCRIPT -->
@include('layouts.vendor-scripts')
</body>
</html>