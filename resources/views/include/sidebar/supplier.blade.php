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
            <li class="menu-title" data-key="t-menu">For Publisher</li>

            <li>
                <a href="{{ route('dashboard') }}">
                    <i class='bx bxs-dashboard nav-icon'></i>
                    <span class="menu-item" data-key="t-dashboard">Dashboard</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{route('publisher.view')}}">Profile</a></li>
                </ul>
            </li>

            <li>
                <a href="javascript: void(0);" class="has-arrow">
                    <i class='bx bx-book nav-icon'></i>
                    <span class="menu-item" data-key="t-ecommerce">User and Role</span>
                </a>
                {{-- <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{route('publisher.view')}}">Publisher</a></li>
                </ul> --}}
            </li>
            <li>
                <a href="javascript: void(0);" class="has-arrow">
                    <i class='bx bx-book nav-icon'></i>
                    <span class="menu-item" data-key="t-ecommerce">Books</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('books.index') }}">All Books </a></li>
                  {{--  <li><a href="{{ route('books.csv') }}">CSV Upload </a></li>  --}}
                    <li><a href="{{ route('categories.index') }}">Category </a></li>
                    {{-- <li><a href="{{ route('auth.index') }}">Author</a></li> --}}
                    <li><a href="#">Brand</a></li>
                    {{-- <li><a href="{{ route('racks.index') }}">Rack </a></li> --}}
                    <li><a href="#">Units</a></li>
                    {{-- <li><a href="#">Stock Count </a></li> --}}

                </ul>
            </li>

            <li style="display: none;">
            <a href="javascript: void(0);" class="has-arrow">
                    <i class='bx bxs-user-detail nav-icon'></i>
                    <span class="menu-item" data-key=""> Store</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('stores.index', 'central-store')  }}">Central Store</a></li>
                    <li><a href="">Retail Store</a></li>
                    <li><a href="">Publisher Store</a></li>
                </ul>
            </li>  

            <li>
                <a href="javascript: void(0);" class="has-arrow">
                    <i class='bx bx-book nav-icon'></i>
                    <span class="menu-item" data-key="t-store"> Store</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('stores.index', 'central-store')  }}">Central Store</a></li>
                    <li><a href="">Retail Store</a></li>
                    <li><a href="">Publisher Store</a></li>
                </ul>
            </li>

            <li>
                <a href="javascript: void(0);" class="has-arrow">
                    <i class='bx bx-purchase-tag-alt nav-icon'></i>
                    <span class="menu-item" data-key="t-sale">Inventory</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    @if (isCentral() || isPublisher())
                    <li><a href="{{ route('requisition-request.index') }}">Requisition Request </a></li>
                    @endif
                </ul>
            </li>

            {{-- <li>
                <a href="javascript: void(0);" class="has-arrow">
                    <i class='bx bx-book nav-icon'></i>
                    <span class="menu-item" data-key="t-ecommerce">Transfer</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{route('ps.trans')}}">All Transfer</a></li>
                    <li><a href="">Create Transfer</a></li>
                    <li><a href=""> </a></li>
                </ul>
            </li> --}}

            {{-- <li>

                <a href="{{ route('stores.index', 'central-store')  }}" >
                    <i class='bx bxs-user-detail nav-icon'></i>
                    <span class="menu-item" data-key="t-ecommerce">Central Store Management</span>
                </a>
            </li> --}}

            {{-- <li>
                <a href="javascript: void(0);" class="has-arrow">
                    <i class='bx bx-book nav-icon'></i>
                    <span class="menu-item" data-key="t-Purchace">Purchace</span>
                </a>
                <ul>
                    <li><a href="#">GRN List </a></li>
                <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('grn.index') }}">GRN List </a></li>
                        <li><a href="{{ route('grn.create') }}">Add GRN </a></li>
                </ul>
                </ul>
                
            </li> --}}

            {{-- <li>
                <a href="javascript: void(0);" class="has-arrow">
                    <i class='bx bx-book nav-icon'></i>
                    <span class="menu-item" data-key="t-Sales">Sales</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href=""> </a></li>
                    {{-- <li><a href="{{ route('brands.index')}}">Brand </a></li> --}}
                    {{-- <li><a href=""> </a></li> --}}
                    {{-- <li><a href=""> </a></li> --}}
                {{-- </ul> --}}
            {{-- </li> --}} 
            
            {{-- <li>
                <a href="javascript: void(0);">
                    <i class='bx bx-rupee nav-icon'></i>
                    <span class="menu-item" data-key="t-projects">Payout Management</span>
                </a>

            </li> --}}

            {{-- <li>
                <a href="javascript: void(0);" class="has-arrow">
                    <i class="bx bx-file nav-icon"></i>
                    <span class="menu-item">Reports and Analytics</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">

                    <li><a href="#"> Book-wise Sale Data </a></li>
                    <li><a href="#"> Store-wise Sale Data </a></li>
                    <li><a href="#"> District-wise Sale Data </a></li>
                    <li><a href="#"> Same for Stock </a></li>
                    <li><a title="Manage publisher information, including contact details and payment preferences"
                            href="#"> Manage publisher information</a></li>
                    <li><a href="#"> View personalized sales data and analytics. </a></li>
                    <li><a title=" - Detailed sales and royalty reports for each book. Real-time sales tracking"
                            href="#">Detailed sales</a></li>
                            <li><a title=" - Detailed sales and royalty reports for each book. Real-time sales tracking"
                                href="#">Real time sales tracking</a></li>

                </ul>
            </li>

            <li>
                <a href="javascript: void(0);" class="has-arrow">
                    <i class='bx bx-book nav-icon'></i>
                    <span class="menu-item" data-key="t-Utility">Utility</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href=""> </a></li>
                    {{-- <li><a href="{{ route('brands.index')}}">Brand </a></li> --}}
                    {{-- <li><a href="">Activities Log</a></li> --}}
                    {{-- <li><a href="">Bulk Data Export</a></li> --}}
                    {{-- <li><a href="">Bulk send</a></li> --}}
                    {{-- <li><a href="">Offer</a></li> --}}
                    {{-- <li><a href="">Back up</a></li> --}}
                {{-- </ul> --}}
            {{-- </li> --}} 

                        {{-- <li>
                            <a href="{{ route('dashboard') }}">
                                <i class='bx bxs-dashboard nav-icon'></i>
                                <span class="menu-item" data-key="t-dashboard">Dashboard</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{route('publisher.view')}}">Profile</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow">
                                <i class='bx bx-book nav-icon'></i>
                                <span class="menu-item" data-key="t-ecommerce">User and Role Management</span>
                            </a>
                            {{-- <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{route('publisher.view')}}">Publisher</a></li>
                            </ul> --}}
                        {{-- </li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow">
                                <i class='bx bx-book nav-icon'></i>
                                <span class="menu-item" data-key="t-ecommerce">Books</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{ route('books.index') }}">All Books </a></li>
                                <li><a href="{{ route('categories.index') }}">Category </a></li>
                                <li><a href="#">Author</a></li>
                                <li><a href="#">Brand</a></li> --}}
                                {{-- <li><a href="{{ route('racks.index') }}">Rack </a></li> --}}
                                {{-- <li><a href="#">Units</a></li> --}}
                                {{-- <li><a href="#">Stock Count </a></li> --}}

                            {{-- </ul> --}}
                        {{-- </li> --}} 

                       
                        {{-- <li>
                            <a href="javascript: void(0);" class="has-arrow">
                                <i class='bx bx-purchase-tag-alt nav-icon'></i>
                                <span class="menu-item" data-key="t-sale">Inventory</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                @if (isCentral() || isPublisher())
                                <li><a href="{{ route('requisition-request.index') }}">Requisition Request </a></li>
                                @endif
                            </ul>
                        </li> --}}

                        {{-- <li>
                            <a href="javascript: void(0);" class="has-arrow">
                                <i class='bx bx-book nav-icon'></i>
                                <span class="menu-item" data-key="t-ecommerce">Transfer</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{route('ps.trans')}}">All Transfer</a></li>
                                <li><a href="">Create Transfer</a></li>
                                <li><a href=""> </a></li>
                            </ul>
                        </li> --}}

                        {{-- <li>

                            <a href="{{ route('stores.index', 'central-store')  }}" >
                                <i class='bx bxs-user-detail nav-icon'></i>
                                <span class="menu-item" data-key="t-ecommerce">Central Store Management</span>
                            </a>
                        </li> --}}

                        {{-- <li>
                            <a href="javascript: void(0);" class="has-arrow">
                                <i class='bx bx-book nav-icon'></i>
                                <span class="menu-item" data-key="t-Purchace">Purchace</span>
                            </a>
                            <ul>
                                <li><a href="#">GRN List </a></li>
                            <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{ route('grn.index') }}">GRN List </a></li>
                                    <li><a href="{{ route('grn.create') }}">Add GRN </a></li>
                            </ul>
                            </ul>
                            
                        </li> --}}

                        {{-- <li>
                            <a href="javascript: void(0);" class="has-arrow">
                                <i class='bx bx-book nav-icon'></i>
                                <span class="menu-item" data-key="t-Sales">Sales</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href=""> </a></li>
                                {{-- <li><a href="{{ route('brands.index')}}">Brand </a></li> --}}
                                {{-- <li><a href=""> </a></li> --}}
                                {{-- <li><a href=""> </a></li> --}}
                            {{-- </ul> --}}
                        {{-- </li> --}} 
                        
                        {{-- <li>
                            <a href="javascript: void(0);">
                                <i class='bx bx-rupee nav-icon'></i>
                                <span class="menu-item" data-key="t-projects">Payout Management</span>
                            </a>

                        </li> --}}

                        <li>
                            <a href="javascript: void(0);" class="has-arrow">
                                <i class="bx bx-file nav-icon"></i>
                                <span class="menu-item">Reports and Analytics</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">

                                <li><a href="#"> Book-wise Sale Data </a></li>
                                <li><a href="#"> Store-wise Sale Data </a></li>
                                <li><a href="#"> District-wise Sale Data </a></li>
                                <li><a href="#"> Same for Stock </a></li>
                                <li><a title="Manage publisher information, including contact details and payment preferences"
                                        href="#"> Manage publisher information</a></li>
                                <li><a href="#"> View personalized sales data and analytics. </a></li>
                                <li><a title=" - Detailed sales and royalty reports for each book. Real-time sales tracking"
                                        href="#">Detailed sales</a></li>
                                        <li><a title=" - Detailed sales and royalty reports for each book. Real-time sales tracking"
                                            href="#">Real time sales tracking</a></li>

                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow">
                                <i class='bx bx-book nav-icon'></i>
                                <span class="menu-item" data-key="t-Utility">Utility</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href=""> </a></li>
                                {{-- <li><a href="{{ route('brands.index')}}">Brand </a></li> --}}
                                <li><a href="">Activities Log</a></li>
                                <li><a href="">Bulk Data Export</a></li>
                                <li><a href="">Bulk send</a></li>
                                <li><a href="">Offer</a></li>
                                <li><a href="">Back up</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow">
                                <i class='bx bx-purchase-tag-alt nav-icon'></i>
                                <span class="menu-item" data-key="t-Setting">Setting </span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="">Notifications </a></li>
                                <li><a href=""> </a></li>
                            </ul>
                        </li>


                      

                        {{-- <li>
                            <a href="javascript: void(0);" class="has-arrow">
                                <i class='bx bx-purchase-tag-alt nav-icon'></i>
                                <span class="menu-item" data-key="t-sale">Notifications </span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href=""> </a></li>
                                <li><a href=""> </a></li>
                            </ul>
                        </li> --}}

           

          

            {{-- <li>
                <a href="javascript: void(0);" class="has-arrow">
                    <i class='bx bx-purchase-tag-alt nav-icon'></i>
                    <span class="menu-item" data-key="t-sale">Notifications </span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href=""> </a></li>
                    <li><a href=""> </a></li>
                </ul>
            </li> --}}


            {{-- <li>
                <a href="javascript: void(0);" class="has-arrow">
                    <i class='bx bx-purchase-tag-alt nav-icon'></i>
                    <span class="menu-item" data-key="t-sale">Activities Log </span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href=""> </a></li>
                    <li><a href=""> </a></li>
                </ul>
            </li> --}}

            <li>
                <a href="javascript: void(0);" class="has-arrow">
                    <i class='bx bx-purchase-tag-alt nav-icon'></i>
                    <span class="menu-item" data-key="t-sale">Requisition </span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    @if (isCentral() || isPublisher())
                    <li><a href="{{ route('requisition-request.index') }}">Requisition Request </a></li>
                    @endif
                </ul>
            </li>
            {{-- <li>
                <a href="javascript: void(0);" class="has-arrow">
                    <i class='bx bx-purchase-tag-alt nav-icon'></i>
                    <span class="menu-item" data-key="t-sale">Purchase </span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('purchase_request.index') }}">Purchase Request </a></li>
                        </ul>
            </li> --}}
            {{-- Dispatch --}}
            <li>
                <a href="javascript: void(0);" class="has-arrow">
                    <i class='bx bx-purchase-tag-alt nav-icon'></i>
                    <span class="menu-item" data-key="t-sale">Dispatch </span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('dispatch.index') }}">Dispatch List </a></li>
                    <li><a href="{{ route('dispatch.create') }}">Add Dispatch </a></li>
                </ul>
            </li>

            <li>
                <a href="javascript: void(0);" class="has-arrow">
                    <i class='bx bx-purchase-tag-alt nav-icon'></i>
                    <span class="menu-item" data-key="t-sale">GRN </span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('grn.index') }}">GRN List </a></li>
                    <li><a href="{{ route('grn.create') }}">Add GRN </a></li>
                </ul>
            </li>



            

          



        </ul>
    </div>
    <!-- Sidebar -->
</div>
</div>
<!-- Left Sidebar End -->
