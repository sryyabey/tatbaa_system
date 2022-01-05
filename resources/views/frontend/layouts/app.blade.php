<!DOCTYPE html>
<html lang="en">
<head>
    @include('frontend.layouts.partials.header')
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
    @include('frontend.layouts.partials.navbar')

    <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                @yield('content')
            </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
            <div class="pull-right">
                Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>
</div>

@include('frontend.layouts.partials.scripts')
</body></html>
