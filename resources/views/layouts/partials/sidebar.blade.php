   <!-- BEGIN: Main Menu-->
   <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
       <div class="navbar-header">
           <ul class="nav navbar-nav flex-row">
               <li class="nav-item mr-auto">
                   <a class="navbar-brand" href="{{route('home')}}">
                       <span class="brand-logo">
                           <img src="/app-assets/images/logo/Ascend-logo.png" alt="">
                       </span>
                   </a>
               </li>
               <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i></a></li>
           </ul>
       </div>
       <div class="shadow-bottom"></div>
       <div class="main-menu-content">
           <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
               {{-- Users --}}
               <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="users"></i><span class="menu-title text-truncate" data-i18n="Dashboards">Users</span></a>
                   <ul class="menu-content">
                       <li><a class="d-flex align-items-center" href="{{route('user.create')}}"><i data-feather="circle"></i><span class="menu-item" data-i18n="Shop">Add</span></a>
                       </li>
                       <li><a class="d-flex align-items-center" href="{{route('user.list')}}"><i data-feather="circle"></i><span class="menu-item" data-i18n="Details">List</span></a>
                       </li>
                   </ul>
               </li>
           {{-- Regions --}}
           <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span class="menu-title text-truncate" data-i18n="Dashboards">Regions</span></a>
               <ul class="menu-content">
                   <li><a class="d-flex align-items-center" href="{{route('region.create')}}"><i data-feather="circle"></i><span class="menu-item" data-i18n="Shop">Add</span></a>
                   </li>
                   <li><a class="d-flex align-items-center" href="{{route('region.index')}}"><i data-feather="circle"></i><span class="menu-item" data-i18n="Details">List</span></a>
                   </li>
               </ul>
           </li>
           {{-- Vacine Site --}}
           <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="thermometer"></i><span class="menu-title text-truncate" data-i18n="Dashboards"> Site</span></a>
               <ul class="menu-content">
                   <li><a class="d-flex align-items-center" href="{{route('site.create')}}"><i data-feather="circle"></i><span class="menu-item" data-i18n="Shop">Add</span></a>
                   </li>
                   <li><a class="d-flex align-items-center" href="{{route('site.index')}}"><i data-feather="circle"></i><span class="menu-item" data-i18n="Details">List</span></a>
                   </li>
               </ul>
           </li>
           {{-- Module --}}
           <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="x-circle"></i><span class="menu-title text-truncate" data-i18n="Dashboards">Module</span></a>
               <ul class="menu-content">
                   <li><a class="d-flex align-items-center" href="{{route('module.create')}}"><i data-feather="circle"></i><span class="menu-item" data-i18n="Shop">Add</span></a>
                   </li>
                   <li><a class="d-flex align-items-center" href="{{route('module.index')}}"><i data-feather="circle"></i><span class="menu-item" data-i18n="Details">List</span></a>
                   </li>
               </ul>
           </li>
           </ul>
       </div>
   </div>
   <!-- END: Main Menu-->
