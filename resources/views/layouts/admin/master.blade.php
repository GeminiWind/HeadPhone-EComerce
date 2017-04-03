<!DOCTYPE html>
<html>
  @include('layouts.admin.includes.head')
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  @include('layouts.admin.includes.header')
  @include('layouts.admin.includes.sidebar')
  <!-- Content Wrapper. Contains page content -->
  @yield('content')
  <!-- /.content-wrapper -->
  @include('layouts.admin.includes.footer')
@include('layouts.admin.includes.script')
</body>
</html>