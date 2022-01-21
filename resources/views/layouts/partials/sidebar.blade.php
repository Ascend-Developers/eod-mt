   <!-- BEGIN: Main Menu-->
   <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
       <div class="navbar-header">
           <ul class="nav navbar-nav flex-row">
               <li class="nav-item mr-auto">
                   <a class="navbar-brand" href="{{route('home')}}">
                       <span class="brand-logo">
                           <img src="/app-assets/images/logo/EOD logo Blue-01.png" alt="">
                       </span>
                   </a>
               </li>
               <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i></a></li>
           </ul>
       </div>
       <div class="shadow-bottom"></div>
       <div class="main-menu-content">
           <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
               @if (Auth::user()->type == "admin")
                    {{-- Users --}}
                    <li class=" nav-item"><a class="d-flex align-items-center" href=""><i data-feather="users"></i><span class="menu-title text-truncate" data-i18n="Dashboards">Users</span></a>
                        <ul class="menu-content">
                            <li class="{{ Request::is('user/create') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{route('user.create')}}"><i data-feather="circle"></i><span class="menu-item" data-i18n="Shop">Add</span></a>
                            </li>
                            <li class="{{ Request::is('user') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{route('user.index')}}"><i data-feather="circle"></i><span class="menu-item" data-i18n="Details">List</span></a>
                            </li>
                        </ul>
                    </li>
                    {{-- Regions --}}
                    <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span class="menu-title text-truncate" data-i18n="Dashboards">Regions</span></a>
                        <ul class="menu-content">
                            <li class="{{ Request::is('region/create') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{route('region.create')}}"><i data-feather="circle"></i><span class="menu-item" data-i18n="Shop">Add</span></a>
                            </li>
                            <li class="{{ Request::is('region') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{route('region.index')}}"><i data-feather="circle"></i><span class="menu-item" data-i18n="Details">List</span></a>
                            </li>
                        </ul>
                    </li>
                    {{--  Site --}}
                    <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="thermometer"></i><span class="menu-title text-truncate" data-i18n="Dashboards"> Site</span></a>
                        <ul class="menu-content">
                            <li class="{{ Request::is('site/create') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{route('site.create')}}"><i data-feather="circle"></i><span class="menu-item" data-i18n="Shop">Add</span></a>
                            </li>
                            <li class="{{ Request::is('site') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{route('site.index')}}"><i data-feather="circle"></i><span class="menu-item" data-i18n="Details">List</span></a>
                            </li>
                        </ul>
                    </li>
                    {{--  Item --}}
                    <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="archive"></i><span class="menu-title text-truncate" data-i18n="Dashboards"> Item</span></a>
                        <ul class="menu-content">
                            <li class="{{ Request::is('item/create') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{route('item.create')}}"><i data-feather="circle"></i><span class="menu-item" data-i18n="Shop">Add</span></a>
                            </li>
                            <li class="{{ Request::is('item') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{route('item.index')}}"><i data-feather="circle"></i><span class="menu-item" data-i18n="Details">List</span></a>
                            </li>
                        </ul>
                    </li>

                    {{-- Module --}}
                    <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="x-circle"></i><span class="menu-title text-truncate" data-i18n="Dashboards">Module</span></a>
                        <ul class="menu-content">
                            <li class="{{ Request::is('module/create') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{route('module.create')}}"><i data-feather="circle"></i><span class="menu-item" data-i18n="Shop">Add</span></a>
                            </li>
                            <li class="{{ Request::is('module') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{route('module.index')}}"><i data-feather="circle"></i><span class="menu-item" data-i18n="Details">List</span></a>
                            </li>
                        </ul>
                    </li>
                @endif
                {{--  Submission --}}
                @if (Auth::user()->type == "agent" && in_array("EOD Submission", Auth::user()->modulesNameArr()))
                    <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="file"></i><span class="menu-title text-truncate" data-i18n="Dashboards"> EOD</span></a>
                        <ul class="menu-content">
                            <li class="{{ Request::is('eod/create') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{route('eod.create')}}"><i data-feather="circle"></i><span class="menu-item" data-i18n="Shop">Add</span></a>
                            </li>
                            <li class="{{ Request::is('eod/index') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{route('eod.index')}}"><i data-feather="circle"></i><span class="menu-item" data-i18n="Details">Submissions</span></a>
                            </li>
                            <li class="{{ Request::is('eod/site') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{route('eod.site')}}"><i data-feather="circle"></i><span class="menu-item" data-i18n="Details">Site View</span></a>
                            </li>
                        </ul>
                    </li>
                @elseif (Auth::user()->type == "admin")
                    <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="file"></i><span class="menu-title text-truncate" data-i18n="Dashboards"> EOD</span></a>
                        <ul class="menu-content">
                            <li  class="{{ Request::is('eod/create') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{route('eod.create')}}"><i data-feather="circle"></i><span class="menu-item" data-i18n="Shop">Add</span></a>
                            </li>
                            <li class="{{ Request::is('eod/index') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{route('eod.index')}}"><i data-feather="circle"></i><span class="menu-item" data-i18n="Details">Submissions</span></a>
                            </li>
                            <li class="{{ Request::is('eod/site') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{route('eod.site')}}"><i data-feather="circle"></i><span class="menu-item" data-i18n="Details">Site View</span></a>
                            </li>
                        </ul>
                    </li>
                @endif

                {{-- Waiting Time --}}
                @if (Auth::user()->type == "agent" && in_array("Waiting Time", Auth::user()->modulesNameArr()))
                    <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="layers"></i><span class="menu-title text-truncate" data-i18n="Dashboards">MT hourly checklist status</span></a>
                        <ul class="menu-content">
                            <li class="{{ Request::is('waiting/create') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{route('waiting.create')}}"><i data-feather="circle"></i><span class="menu-item" data-i18n="Shop">Add</span></a>
                            </li>
                            <li class="{{ Request::is('waiting') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{route('waiting.index')}}"><i data-feather="circle"></i><span class="menu-item" data-i18n="Details">List</span></a>
                            </li>
                        </ul>
                    </li>
                @elseif (Auth::user()->type == "admin")
                    <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="layers"></i><span class="menu-title text-truncate" data-i18n="Dashboards">MT hourly checklist status</span></a>
                        <ul class="menu-content">
                            <li class="{{ Request::is('waiting/create') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{route('waiting.create')}}"><i data-feather="circle"></i><span class="menu-item" data-i18n="Shop">Add</span></a>
                            </li>
                            <li class="{{ Request::is('waiting') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{route('waiting.index')}}"><i data-feather="circle"></i><span class="menu-item" data-i18n="Details">List</span></a>
                            </li>
                        </ul>
                    </li>
                @endif

                {{-- Rapid Antigen Testing Site Audid --}}
                @if (Auth::user()->type == "agent" && in_array("Rapid Antigen Testing Site Audit", Auth::user()->modulesNameArr()))
                    <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="edit-3"></i><span class="menu-title text-truncate" data-i18n="Dashboards">Rapid Antigen Site Audid</span></a>
                        <ul class="menu-content">
                            <li class="{{ Request::is('ratsas/create') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{route('ratsas.create')}}"><i data-feather="circle"></i><span class="menu-item" data-i18n="Shop">Add</span></a>
                            </li>
                            <li class="{{ Request::is('ratsas') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{route('ratsas.index')}}"><i data-feather="circle"></i><span class="menu-item" data-i18n="Details">List</span></a>
                            </li>
                        </ul>
                    </li>
                @elseif (Auth::user()->type == "admin")
                    <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="edit-3"></i><span class="menu-title text-truncate" data-i18n="Dashboards">Rapid Antigen Site Audid</span></a>
                        <ul class="menu-content">
                            <li class="{{ Request::is('ratsas/create') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{route('ratsas.create')}}"><i data-feather="circle"></i><span class="menu-item" data-i18n="Shop">Add</span></a>
                            </li>
                            <li class="{{ Request::is('ratsas') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{route('ratsas.index')}}"><i data-feather="circle"></i><span class="menu-item" data-i18n="Details">List</span></a>
                            </li>
                        </ul>
                    </li>
                @endif

                {{-- Lab Shipment --}}
                {{-- @if (Auth::user()->type == "agent" && in_array("Lab Shipment", Auth::user()->modulesNameArr()))
                    <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="anchor"></i><span class="menu-title text-truncate" data-i18n="Dashboards">Lab Shipment</span></a>
                        <ul class="menu-content">
                            <li class="{{ Request::is('shipment/create') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{route('shipment.create')}}"><i data-feather="circle"></i><span class="menu-item" data-i18n="Shop">Add</span></a>
                            </li>
                            <li class="{{ Request::is('shipment') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{route('shipment.index')}}"><i data-feather="circle"></i><span class="menu-item" data-i18n="Details">List</span></a>
                            </li>
                        </ul>
                    </li>
                @elseif (Auth::user()->type == "admin")
                    <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="anchor"></i><span class="menu-title text-truncate" data-i18n="Dashboards">Lab Shipment</span></a>
                        <ul class="menu-content">
                            <li class="{{ Request::is('shipment/create') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{route('shipment.create')}}"><i data-feather="circle"></i><span class="menu-item" data-i18n="Shop">Add</span></a>
                            </li>
                            <li class="{{ Request::is('shipment') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{route('shipment.index')}}"><i data-feather="circle"></i><span class="menu-item" data-i18n="Details">List</span></a>
                            </li>
                        </ul>
                    </li>
                @endif --}}

                {{-- Lab CheckList --}}
                @if (Auth::user()->type == "agent" && in_array("Lab Classification", Auth::user()->modulesNameArr()))
                    <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="clipboard"></i><span class="menu-title text-truncate" data-i18n="Dashboards">Lab Per Shift Submission</span></a>
                        <ul class="menu-content">
                            <li class="{{ Request::is('checklist/create') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{route('checklist.create')}}"><i data-feather="circle"></i><span class="menu-item" data-i18n="Shop">Add</span></a>
                            </li>
                            <li class="{{ Request::is('checklist') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{route('checklist.index')}}"><i data-feather="circle"></i><span class="menu-item" data-i18n="Details">List</span></a>
                            </li>
                        </ul>
                    </li>
                @elseif (Auth::user()->type == "admin")
                    <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="clipboard"></i><span class="menu-title text-truncate" data-i18n="Dashboards">Lab Per Shift Submission</span></a>
                        <ul class="menu-content">
                            <li class="{{ Request::is('checklist/create') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{route('checklist.create')}}"><i data-feather="circle"></i><span class="menu-item" data-i18n="Shop">Add</span></a>
                            </li>
                            <li class="{{ Request::is('checklist') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{route('checklist.index')}}"><i data-feather="circle"></i><span class="menu-item" data-i18n="Details">List</span></a>
                            </li>
                        </ul>
                    </li>
                @endif
           </ul>
       </div>
   </div>
   <!-- END: Main Menu-->
