<div class="vertical-menu">


    <!-- LOGO -->
    <div class="navbar-brand-box">
        <a href="#" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ asset('/assets/images/logo-sm.svg') }}" alt="" height="26">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('/assets/images/logo-lg.svg') }}" alt="" height="40">
            </span>
        </a>

        <a href="#" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ asset('/assets/images/logo-sm.svg') }}" alt="" height="26">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('/assets/images/logo-lg-wh.svg') }}" alt="" height="40">
            </span>
        </a>
    </div>

    <button type="button" class="btn btn-sm px-3 font-size-16 header-item vertical-menu-btn">
        <i class="fa fa-fw fa-bars"></i>
    </button>

    <div data-simplebar class="sidebar-menu-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" data-key="t-menu">For Admin</li>

                <li>
                    <a href="{{ route('dashboard') }}">
                        <i class="bx bx-home-circle nav-icon"></i>
                        <span class="menu-item" data-key="t-dashboard">Dashboard</span>
                    </a>
                </li>

                <li>

                    <a href="javascript: void(0);" class="has-arrow">
                        <i class='bx bxs-user-detail nav-icon'></i>
                        <span class="menu-item" data-key="t-ecommerce">User Management</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin.index') }}"> Users </a></li>
                       {{--  <li><a href="{{ route('admin.index', 'central-store') }}"> Central Store</a></li>
                        <li><a href="{{ route('admin.index', 'retail-store') }}"> Retail Store</a></li> --}}
                        <li><a href="{{ route('roles.index') }}"> Roles Management</a></li>
                    </ul>

                </li>

                {{-- <li>
                    <a href="{{ route('roles.index') }}">
                        <i class='bx bxs-check-shield nav-icon'></i>
                        <span class="menu-item" data-key="t-dashboard">Roles Management</span>
                    </a>
                </li> --}}

                {{-- <li>
                    <a href="">
                        <i class='bx bxs-check-shield nav-icon'></i>
                        <span class="menu-item" data-key="t-dashboard">Customer  Management</span>
                    </a>
                </li>

                <li>
                    <a href="">
                        <i class='bx bxs-check-shield nav-icon'></i>
                        <span class="menu-item" data-key="t-dashboard">Publisher   Management</span>
                    </a>
                </li> --}}


                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class='bx bxs-book-content nav-icon'></i>

                    


                        <span class="menu-item" data-key="t-ecommerce">Store </span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('stores.index', 'central-store')  }}">Central Store </a></li>
                        <li><a href="{{ route('stores.index', 'retail-store') }}">Retail Store </a></li>
                        <li><a href="{{ route('publisher.index')}}">Publisher Store</a></li>


                    </ul>
                </li>






                {{-- <li>
                    <a href="{{ route('stores.index', 'central-store')  }}" >
                        <i class='bx bxs-user-detail nav-icon'></i>
                        <span class="menu-item" data-key="t-ecommerce">Central Store Management</span>
                    </a>
                </li> --}}

                {{-- <li>
                    <a  href="{{ route('stores.index', 'retail-store') }}" class="has-arrow">
                        <i class='bx bxs-book-content nav-icon'></i>
                        <span class="menu-item" data-key="t-ecommerce">Retail Store Management </span>
                    </a>
                </li> --}}
                 {{-- <li>
                    <a href="{{ route('publisher.index')}}">
                        <i class='bx bx-map-pin nav-icon'></i>
                        <span class="menu-item" data-key="t-dashboard">Publisher Masters</span>
                    </a>
                </li>  --}}

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class='bx bx-book nav-icon' ></i>
                        <span class="menu-item" data-key="t-ecommerce">Books</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('books.index') }}">All Books </a></li>
                        {{-- <li><a href="{{ route('brands.index')}}">Brand </a></li> --}}
                        <li><a href="{{ route('categories.index') }}">Category </a></li>
                        {{-- <li><a href="{{ route('gstslabs.index') }}">GstSlab </a></li> --}}
                        <li><a href="{{ route('auth.index') }}">Auther </a></li>
                        {{-- <li><a href="{{ route('storagesites.index') }}">Storage Site </a></li> --}}
                        {{-- <li><a href="{{ route('storagelocations.index') }}">Storage Location </a></li> --}}
                        {{-- <li><a href="{{ route('racks.index') }}">Rack </a></li> --}}
                        <li><a href="#">Unit </a></li>
                        <li><a href="#">Stock Count </a></li>

                    </ul>
                </li>

                {{-- <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class='bx bxs-book-content nav-icon'></i>
                        <span class="menu-item" data-key="t-ecommerce">Inventory</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('storagesites.index') }}">Storage Site </a></li>
                        <li><a href="{{ route('storagelocations.index') }}">Storage Location </a></li>

                    </ul>
                </li> --}}

                {{-- <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class='bx bxs-book-content nav-icon'></i>
                        <span class="menu-item" data-key="t-ecommerce">Sales </span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#"></a></li>
                        <li><a href="#"></a></li>


                        

                    </ul>
                </li> --}} 
                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class='bx bxs-book-content nav-icon'></i>
                        <span class="menu-item" data-key="t-ecommerce">Requisition</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#"></a></li>
                        <li><a href="#"></a></li>


                    </ul>
                </li>



                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="bx bx-file nav-icon"></i>
                        <span class="menu-item">Reports and Analytics</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#">Overall Summary Report</a></li>
                        <li><a href="#">Activity Report</a></li>
                        <li><a href="#">Profit and Loss</a></li>
                        <li><a href="#">Sale Report</a></li>
                        <li><a href="#">Purchase Report</a></li>
                        <li><a href="#">Inventory Report</a></li>
                        <li><a href="#">Product Report</a></li>
                        <li><a href="#">Customer Report</a></li>
                        <li><a href="#">Supplier Report</a></li>
                        <li><a href="#">Payment Sale</a></li>
                        <li><a href="#">Payment Purchase</a></li>
                        <li><a href="#">Payment Sale Return</a></li>
                        <li><a href="#">Payment Purchase Return</a></li>
                        <li><a href="#">Product Quantity Alerts</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class='bx bx-list-ul nav-icon'></i>
                        <span class="menu-item" data-key="t-projects">Utility</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#">Bulk Email/SMS Notification</a></li>
                        <li><a href="#">Media</a></li>
                        <li><a href="#">Announcment</a></li>
                        <li><a href="#">Backup</a></li>
                        <li><a href="#">Activity Log</a></li>
                    </ul>
                </li>


                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class='bx bx-cog nav-icon'></i>
                        <span class="menu-item" data-key="t-projects">Setup</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#">Print</a></li>
                        <li><a href="#">Payment Mode</a></li>
                        <li><a href="#">POS Receipt</a></li>
                        <li><a href="#">SMS Templates</a></li>
                        <li><a href="#">Email Templates</a></li>
                        <li><a href="#">Notifications</a></li>
                        <li><a href="#" class="has-arrow">Location</a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{route('districts.index')}}">District</a>
                                <li><a href="">Status</a>
                            </ul>
                        </li>
                        <li><a href="{{route('admin.setting')}}">setting</a></li>
                        <li><a href="#" class="has-arrow">Account</a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{ route('gstslabs.index') }}">GstSlab</a>
                                <li><a href="">Billing Header</a>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">

                        <i class='bx bxs-book-content nav-icon'></i>
                        <span class="menu-item" data-key="t-Offer">Offer</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('admin.discount')}}">Discount</a></li>
                        {{-- <li><a href="#"></a></li> --}}

                    </ul>
                </li>


                
                {{-- <li>
                    <a href="{{ route('districts.index')}}">
                        <i class='bx bx-map-pin nav-icon'></i>


                    </a>
                </li> --}}

                {{-- <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class='bx bxs-book-content nav-icon'></i>
                        <span class="menu-item" data-key="t-ecommerce">Warehouse </span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('admin.list.ware')}}">List of Warehouse</a></li>
                        {{-- <li><a href="{{route('admin.add.ware')}}">Add Warehouse</a></li> --}}

                    {{-- </ul> --}}
                {{-- </li> --}} 

               

                {{-- <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class='bx bxs-book-content nav-icon'></i>
                        <span class="menu-item" data-key="t-ecommerce">Order</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#"></a></li>
                        <li><a href="#"></a></li>

                    </ul>
                </li> --}}

               
{{-- 
                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class='bx bxs-book-content nav-icon'></i>
                        <span class="menu-item" data-key="t-ecommerce">Payout</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#"></a></li>
                        <li><a href="#"></a></li>

                    </ul>
                </li> --}}

              

                {{-- <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class='bx bxs-book-content nav-icon'></i>
                        <span class="menu-item" data-key="t-ecommerce">Purchase Order </span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#"></a></li>
                        <li><a href="#"></a></li>

                    </ul>
                </li> --}}

                {{-- <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class='bx bxs-book-content nav-icon'></i>
                        <span class="menu-item" data-key="t-ecommerce">Dispatch Order </span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#"></a></li>
                        <li><a href="#"></a></li>

                    </ul>
                </li> --}}

                {{-- <li>
                    <a href="javascript: void(0);" class="has-arrow">

                        <i class='bx bxs-book-content nav-icon'></i>
                        <span class="menu-item" data-key="t-ecommerce">Goods Received Note (GRN) Management</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#"></a></li>
                        <li><a href="#"></a></li>

                    </ul>
                </li> --}}

                {{-- <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class='bx bxs-book-content nav-icon'></i>
                        <span class="menu-item" data-key="t-ecommerce">Purchase Invoice</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#"></a></li>
                        <li><a href="#"></a></li>

                    </ul>
                </li> --}}

                {{-- <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class='bx bxs-book-content nav-icon'></i>
                        <span class="menu-item" data-key="t-ecommerce">Sales Invoice</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#"></a></li>
                        <li><a href="#"></a></li>

                    </ul>
                </li>
               --}}

                {{-- <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class='bx bxs-book-content nav-icon'></i>
                        <span class="menu-item" data-key="t-ecommerce">Notifications</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#"></a></li>
                        <li><a href="#"></a></li>

                    </ul>
                </li> --}}

                {{-- <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class='bx bxs-book-content nav-icon'></i>
                        <span class="menu-item" data-key="t-ecommerce">Activities Log</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('pos.check')}}">check</a></li>
                        <li><a href="#"></a></li>

                    </ul>
                </li> --}}
                
               {{--  <li>
                    <a href="{{ route('stores.index')}}">
                        <i class='bx bx-map-pin nav-icon'></i>
                        <span class="menu-item" data-key="t-dashboard">Store Masters</span>
                    </a>
                </li> --}}
               
               
                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class='bx bxs-book-content nav-icon'></i>
                        <span class="menu-item" data-key="t-ecommerce">Content Management</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#">Manage blog posts</a></li>
                        <li><a href="#">Manage Articles</a></li>

                    </ul>
                </li>


                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class='bx bxs-help-circle nav-icon'></i>
                        <span class="menu-item" data-key="t-projects">Help and Support</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#">Give support for all Users</a></li>
                        <li><a href="#">Manage FAQ and Documation</a></li>
                    </ul>
                </li>



            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->