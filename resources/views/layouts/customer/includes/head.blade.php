<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <title>
            @yield('title')
        </title>
    <link href="http://fonts.googleapis.com/css?family=Dosis:300,400" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" rel="stylesheet" type="text/css">
    <link href="{{ asset('customer/bootstrap3.3.7/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('customer/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('customer/vendors/colorbox/example3/colorbox.css') }}" rel="stylesheet">
    <link href="{{ asset('customer/rs-plugin/css/settings.css') }}" rel="stylesheet">
    <link href="{{ asset('customer/rs-plugin/css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('customer/css/style.css') }}" rel="stylesheet" title="style">
    <link href="{{ asset('customer/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('customer/css/mystyle.css') }}" rel="stylesheet" title="style">
    <link rel="stylesheet" href="{{ asset('plugins/sweetalert2/sweetalert2.min.css') }}">
    <script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    @stack('css')
    @stack('style')
    @stack('js-head')
    @stack('script-head')                                   
</head>
