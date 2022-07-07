<!DOCTYPE html>
<html lang="en">
<head>
    @include('frontend.layouts.partials.header')
    @yield('head')
</head>

<body class="nav-md">
<div class="container body">
    @include('sweetalert::alert')
    <div class="main_container">
    @include('frontend.layouts.partials.navbar')

    <!-- page content -->
        <div class="right_col" role="main">
            @yield('content')
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
            <div class="pull-right">
                Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
            </div>
            <div class="clearfix"></div>
        </footer>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="modal-body">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('global.close') }}</button>

                    </div>
                </div>
            </div>
        </div>


        <!-- /footer content -->
    </div>
</div>

@include('frontend.layouts.partials.scripts')
@yield('script')
</body></html>
