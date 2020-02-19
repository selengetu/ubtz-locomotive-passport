   <div class="page-header navbar navbar-fixed-top">
                <!-- BEGIN HEADER INNER -->
                <div class="page-header-inner ">
                    <!-- BEGIN LOGO -->
                    <div class="page-logo">
                        <a href="{{ route('home') }}">
                             <img src="{{asset('image/logo1.png')}}" alt="logo" class="logo-default" width="95%" /> </a>
                     
                    </div>
                    <!-- END LOGO -->
                    <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                    <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                        <span></span>
                    </a>
                    <!-- END RESPONSIVE MENU TOGGLER -->
                    <!-- BEGIN TOP NAVIGATION MENU -->
                    <div class="title">ЗҮТГҮҮРИЙН ЭД АНГИЙН ЦАХИМ ПАССПОРТ</div>
                    <div class="top-menu">
                        <ul class="nav navbar-nav pull-right">
         
                         
                                     <li class="dropdown dropdown-user dropdown-dark">
                                <a  class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <span class="username username-hide-on-mobile">  Депо:
                                    @if( Auth::user()->depo_id  == 1)
                                        Сүхбаатар
                                    @elseif( Auth::user()->depo_id == 2)
                                        Улаанбаатар
                                    @elseif( Auth::user()->depo_id == 3)
                                        Сайншанд
                                        @elseif( Auth::user()->depo_id == 5)
                                            Дархан
                                        @elseif( Auth::user()->depo_id == 13)
                                            Замын-Үүд
                                    @endif </span></a>
                                    <!-- DOC: Do not remove below empty space(&nbsp;) as its purposely used -->
                    
                            </li>
                       
                                     <li class="dropdown dropdown-user dropdown-dark">
                                <a href="" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <span class="username username-hide-on-mobile"> {{ Auth::user()->name }} </span>
                                    <!-- DOC: Do not remove below empty space(&nbsp;) as its purposely used -->
                                    <img alt="" class="img-circle" src="{{asset('assets/layouts/layout4/img/avatar9.jpg')}}" /> </a>
                                <ul class="dropdown-menu dropdown-menu-default">
                                    <li>
                                        <a href="">
                                            <i class="icon-user"></i> Миний мэдээлэл </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <i class="icon-calendar"></i> Миний төлөвлөгөө</a>
                                    </li>
                               
                                 
                                    <li class="divider"> </li>
                                 
                                    <li>
                                        <a href="{{ route('logout') }}">
                                            <i class="icon-key"></i>Гарах </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- END USER LOGIN DROPDOWN -->
                            <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                         
                            <!-- END QUICK SIDEBAR TOGGLER -->
                        </ul>
                    </div>
                    <!-- END TOP NAVIGATION MENU -->
                </div>
                <!-- END HEADER INNER -->
            </div>