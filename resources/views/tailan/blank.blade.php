<!DOCTYPE html>

<html lang="en">
   
    <head>
        <meta charset="utf-8" />
        <title>Тууз бүртгэлийн програм</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Тууз бүртгэлийн програм<" name="description" />
        <meta content="" name="author" />
     
       @section('css')
            @include('layouts.partials.css')
        @show

        @yield('csss')
       
        <link rel="shortcut icon" href="favicon.ico" /> </head>
    <!-- END HEAD -->

    <body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo page-md">
        <!-- BEGIN HEADER -->
         @include('layouts.partials.header')
        <!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
           
                 @include('layouts.partials.sidebar')
            
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEAD-->
                    <div class="page-head">
                        <!-- BEGIN PAGE TITLE -->
                        <div class="page-title">
                            <h1>Admin Dashboard 2
                                <small>statistics, charts, recent events and reports</small>
                            </h1>
                        </div>
                     
                    </div>
                 
           
                
               
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
            <!-- BEGIN QUICK SIDEBAR -->
           
           
        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
      @include('layouts.partials.footer')
       
       
    </body>
  @include('layouts.partials.scripts')
</html>