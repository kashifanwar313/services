<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pressure Washing Services | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('dashboard-assets/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('dashboard-assets/bower_components/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('dashboard-assets/bower_components/Ionicons/css/ionicons.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dashboard-assets/dist/css/AdminLTE.min.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
        folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('dashboard-assets/dist/css/skins/_all-skins.min.css') }}">
    <!-- Morris chart -->
    <link rel="stylesheet" href="{{ asset('dashboard-assets/bower_components/morris.js/morris.css') }}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{ asset('dashboard-assets/bower_components/jvectormap/jquery-jvectormap.css') }}">
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{ asset('dashboard-assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('dashboard-assets/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{ asset('dashboard-assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <style>
        #options_data_div{
            displa: none;
        }
    </style>
    @yield('css')
    @livewireStyles
</head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">

        <header class="main-header">
            @include('dashboard.partials.header')
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            @include('dashboard.partials.aside')
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('content')
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            {{-- <div class="pull-right hidden-xs">
            <b>Version</b> 2.4.18
            </div> --}}
            <strong>Copyright &copy; {{ date('Y')}} <a href="#">Pressure Washing Services</a>.</strong> All rights
            reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark" style="display: none;">
            {{-- @include('dashboard.partials.control_sidebar') --}}
        </aside>
        <!-- /.control-sidebar -->
        <!-- Add the sidebar's background. This div must be placed
            immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
        </div>
        <!-- ./wrapper -->

        <!-- jQuery 3 -->
        <script src="{{ asset('dashboard-assets/bower_components/jquery/dist/jquery.min.js') }}"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="{{ asset('dashboard-assets/bower_components/jquery-ui/jquery-ui.min.js') }}"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
        $.widget.bridge('uibutton', $.ui.button);
        </script>
        <!-- Bootstrap 3.3.7 -->
        <script src="{{ asset('dashboard-assets/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
        <!-- Morris.js charts -->
        <script src="{{ asset('dashboard-assets/bower_components/raphael/raphael.min.js') }}"></script>
        <script src="{{ asset('dashboard-assets/bower_components/morris.js/morris.min.js') }}"></script>
        <!-- Sparkline -->
        <script src="{{ asset('dashboard-assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
        <!-- jvectormap -->
        <script src="{{ asset('dashboard-assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
        <script src="{{ asset('dashboard-assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
        <!-- jQuery Knob Chart -->
        <script src="{{ asset('dashboard-assets/bower_components/jquery-knob/dist/jquery.knob.min.js') }}"></script>
        <!-- daterangepicker -->
        <script src="{{ asset('dashboard-assets/bower_components/moment/min/moment.min.js') }}"></script>
        <script src="{{ asset('dashboard-assets/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
        <!-- datepicker -->
        <script src="{{ asset('dashboard-assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="{{ asset('dashboard-assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
        <!-- Slimscroll -->
        <script src="{{ asset('dashboard-assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
        <!-- FastClick -->
        <script src="{{ asset('dashboard-assets/bower_components/fastclick/lib/fastclick.js') }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('dashboard-assets/dist/js/adminlte.min.js') }}"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="{{ asset('dashboard-assets/dist/js/pages/dashboard.js') }}"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="{{ asset('dashboard-assets/dist/js/demo.js') }}"></script>
        @yield('scripts')

        @stack('modals')
            @livewireScripts
        @stack('scripts')

        <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.3.0/alpine.js" integrity="sha512-nIwdJlD5/vHj23CbO2iHCXtsqzdTTx3e3uAmpTm4x2Y8xCIFyWu4cSIV8GaGe2UNVq86/1h9EgUZy7tn243qdA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script type="text/javascript">
            var i=1;
            $(document).ready(function() {
                $(document).on('click', '.btn_remove', function(){
                    var button_id = $(this).attr("id");
                    $('#row-'+button_id+'').remove();
                });

                $("#options_type_id").on('change', function(){
                    if($(this).val()=='3' || $(this).val()=='4' || $(this).val()=='5')
                        $("#options_data_div").css('display', 'block');
                    else
                        $("#options_data_div").css('display', 'none');
                });
            });

            function addMoreFeatures()
            {
                i++;
                $('#dynamic_features').append('<div class="row" id="row-'+i+'"> <div class="col-md-8"> <div class="form-group"> <label for="feature">Feature</label> <input type="text" class="form-control" id="feature" name="features[]" placeholder="Enter Feature" value="{{ old("feature", "") }}" required> </div> </div> <div class="col-md-2"> <div class="form-group"> <label for="feature">Status?</label> <input type="checkbox" class="flat-red" id="status" name="status[]" value="1"> </div> </div> <div class="col-md-2"> <div class="form-group"> <label>Remove</label> <button id="'+i+'" type="button" class="btn btn-sm btn-danger btn_remove">x</button> </div> </div> </div>')
            }

            function addMoreOptions()
            {
                i++;
                $('#dynamic_features').append('<div class="row" id="row-'+i+'"> <div class="col-md-10"> <div class="form-group"> <label for="options">Option</label> <input type="text" class="form-control" id="options" name="options[]" placeholder="Enter Other Option" value="{{ old("options", "") }}" required> </div> </div><div class="col-md-2"> <div class="form-group"> <label>Remove</label> <button id="'+i+'" type="button" class="btn btn-sm btn-danger btn_remove">x</button> </div> </div> </div>')
            }
        </script>
    </body>
</html>
