<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  @include('backend.partials.styles')
  @yield('styles')

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

@include('backend.partials.navbar')

  @include('backend.partials.aside')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        
       @yield('content')

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
 @include('backend.partials.footer')

 
</div>
<!-- ./wrapper -->

@include('backend.partials.scripts')

@yield('scripts')
</body>
</html>
