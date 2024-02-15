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


                <li class="menu-title" data-key="t-menu">For {{ auth()->user()->store->store_name }}</li>

                <li>
                    <a href="{{ route('dashboard') }}">
                        <i class='bx bxs-dashboard nav-icon'></i>
                        <span class="menu-item" data-key="t-dashboard">Dashboard</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('central.showdetail') }}">Profile </a></li>
                    </ul>

                </li>



                <!-- <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class='bx bx-book nav-icon'></i>
                        <span class="menu-item" data-key="t-ecommerce">Books</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('books.index') }}">All Books </a></li>
                        {{-- <li><a href="{{ route('brands.index')}}">Brand </a></li> --}}
                        <li><a href="{{ route('categories.index') }}">Category </a></li>
                        {{-- <li><a href="{{ route('gstslabs.index') }}">GstSlab </a></li> --}}
                        {{-- <li><a href="{{ route('storagesites.index') }}">Storage Site </a></li> --}}
                        {{-- <li><a href="{{ route('storagelocations.index') }}">Storage Location </a></li> --}}
                        <li><a href="{{ route('racks.index') }}">Rack </a></li>
                        {{-- <li><a href="{{route('central.book.request')}}">Book Request </a></li> --}}
                        <li><a href="#">Auther </a></li>

                        <li><a href="#">Unit </a></li>
                        <li><a href="#">Stock Count </a></li>

                    </ul>

                </li> -->

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class='bx bx-store-alt nav-icon'></i>
                        <span class="menu-item" data-key="t-inventry">Inventory</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('master-stock-inventery.item-wise-stock') }}">ITEMISE STOCK </a>
                        </li>
                        <li><a href="{{ route('master-stock-inventery.index') }}">Batch wise STOCK </a>
                        </li>
                        <li><a href="{{ route('transfer.index') }}">TRANSFER </a>
                        </li>
                        <li><a href="{{ route('adjust.index') }}">ADJUSTMENT </a>
                        </li>
                        <li><a href="{{ route('transfer.index') }}">Waitlist </a>
                        </li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow">
                                <span class="menu-item" data-key="t-Storage">Storage </span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{ route('storagesites.index') }}">Storage Site </a></li>
                                <li><a href="{{ route('storagelocations.index') }}">Storage Location </a></li>
                                <li><a href="{{ route('racks.index') }}">Rack </a></li>

                            </ul>
                        </li>
                    </ul>
                </li>


                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class='bx bx-purchase-tag-alt nav-icon'></i>
                        <span class="menu-item" data-key="t-sale">Purchase</span>

                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('purchase.index') }}">Purchase List </a></li>

                        <li><a href="{{ route('purchase.create') }}">Add Purchase </a></li>
                        <li><a href="#">Purchase Return </a></li>
                        <li><a href="{{ route('grn.index') }}">GRN List </a></li>
                        <li><a href="{{ route('grn.create') }}">Add GRN </a></li>


                        <li><a href="{{ route('mannual-grn.create') }}">Add Mannual GRN </a></li>
                        <li><a href="{{ route('mannual-grn.index') }}">Mannual GRN  List </a></li>
                        <li><a href="#" class="has-arrow">Requisition </a>
                            <ul class="sub-menu" aria-expanded="false" class="has-arrow">
                                <li><a href="{{ route('requisition.index') }}">Requisition List </a></li>
                                @if (isCentral() || isPublisher())
                                    <li><a href="{{ route('requisition-request.index') }}">Requisition Request </a>
                                    </li>
                                @endif
                                <li><a href="{{ route('requisition.create') }}">Add Requisition </a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class='bx bx-cog nav-icon'></i>
                        <span class="menu-item" data-key="t-projects">Book CSV</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('books.csv.download') }}">Book CSV Download </a></li>
                        <li><a href="{{ route('books.csv.upload') }}">Book CSV Upload </a></li>

                       
                    </ul>
                </li>

                        <li>
                            <a href="#" class="has-arrow">
                            <i class='bx bx-purchase-tag-alt nav-icon'></i>
                                <span class="menu-item" data-key="t-sale">Requisition </span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false" class="has-arrow">
                                <li><a href="{{ route('requisition.index') }}">Requisition List </a></li>
                                @if (isCentral() || isPublisher())
                                     <li><a href="{{ route('requisition-request.index') }}">Requisition Request </a></li>
                                 @endif
                                <li><a href="{{ route('requisition.create') }}">Add Requisition </a></li>
                            </ul>
                        </li>
               


                <!-- <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class='bx bx-purchase-tag-alt nav-icon'></i>
                        <span class="menu-item" data-key="t-sale">Requisition </span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('requisition.index') }}">Requisition List </a></li>
                        @if (isCentral() || isPublisher())
<li><a href="{{ route('requisition-request.index') }}">Requisition Request </a></li>
@endif
                        <li><a href="{{ route('requisition.create') }}">Add Requisition </a></li>
                    </ul>
                </li> -->


                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class='bx bx-cog nav-icon'></i>
                        <span class="menu-item" data-key="t-projects">Sale</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('sale.index') }}">Sale List </a></li>
                        <li><a href="{{ route('sale.create') }}">Add Sale </a></li>
                        <li><a href="#">POS </a></li>
                        <li><a href="#">Sale Return </a></li>
                        <li><a href="#"> Return and Refund </a></li>
                        <li><a href="#"> Coupon and Discount Setting </a></li>
                        <li><a href="#" class="has-arrow">Customer</a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{ route('central.customer') }}">List Customers </a></li>
                                <li><a href="{{ route('central.view') }}">Add Customers </a></li>
                                <li><a href="{{ route('central.wishlist') }}">Customer Whishlist </a></li>
                            </ul>
                        </li>
                    </ul>
                </li>


                <!-- <li>

                    <a href="javascript: void(0);" class="has-arrow">
                        <i class='bx bx-purchase-tag-alt nav-icon'></i>
                        <span class="menu-item" data-key="t-sale">Purchase </span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('purchase.index') }}">Purchase List </a></li>

                        <li><a href="{{ route('purchase.create') }}">Add Purchase </a></li>
                        <li><a href="{{ route('grn.index') }}">GRN List </a></li>
                        <li><a href="{{ route('grn.create') }}">Add GRN </a></li>
                        <li><a href="#">Purchase Return </a></li>
                    </ul>
                </li> -->

                 <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class='bx bx-purchase-tag-alt nav-icon'></i>
                        <span class="menu-item" data-key="t-sale">Dispatch Order Management </span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('dispatch.index') }}">Dispatch List </a></li>
                        <li><a href="{{ route('dispatch.create') }}">Add Dispatch </a></li>
                    </ul>
                </li>

                <!-- <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class='bx bx-purchase-tag-alt nav-icon'></i>
                        <span class="menu-item" data-key="t-sale">Goods Received Note (GRN) Management </span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('grn.index') }}">GRN List </a></li>
                        <li><a href="{{ route('grn.create') }}">Add GRN </a></li>
                    </ul>
                </li> -->


                <!--
                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class='bx bxs-bank nav-icon'></i>
                        <span class="menu-item" data-key="t-sale">Payout </span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#">Expenses </a></li>
                        <li><a href="#">Expense Category </a></li>
                        <li><a href="#">Payment Method</a></li>
                        <li><a href="#">Payout Transfer Record </a></li>
                        <li><a href="#">Customer Transactions </a></li>

                    </ul>
                </li> -->


                {{-- <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class='bx bxs-coupon nav-icon'></i>
                        <span class="menu-item" data-key="t-sale">Coupon and Discount Setting</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#">Approval </a></li>
                        <li><a href="#">Creation & Plan </a></li>
                </li>   --}}

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class='bx bxs-user-detail nav-icon'></i>
                        <span class="menu-item" data-key="t-ecommerce">User and Role</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">

                        <li><a href="{{ route('admin.index', 'retail-store') }}">For Retail </a></li>
                        <li><a href="{{ route('admin.index', 'publisher') }}">For Publisher </a></li>

                    </ul>
                </li>



                <!-- <li>
                    <a href="#">
                        <i class='bx bx-repost nav-icon'></i>
                        <span class="menu-item" data-key="t-dashboard">Return and Refund
                        </span>
                    </a>
                </li> -->

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="bx bx-file nav-icon"></i>
                        <span class="menu-item">Reports and Analytics</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#">Retail Stores (Own and Publisher-wise) </a></li>

                        <li><a href="{{ route('purchase.create') }}">Add Purchase </a></li>
                        <li><a href="{{ route('purchase_request.index') }}">Purchase Request </a></li>

                        <li><a href="#">Purchase Return </a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class='bx bx-list-ul nav-icon'></i>
                        <span class="menu-item" data-key="t-projects">Utility</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#">Bulk Email/SMS Notification</a></li>
                        <li><a href="#">Backup</a></li>
                        <li><a href="#">Marketing And Prmotions</a></li>
                        <li><a href="#">Activity Logs</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class='bx bx-cog nav-icon'></i>
                        <span class="menu-item" data-key="t-projects">Settings</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#">Print</a></li>
                        <li><a href="#">Payment Mode</a></li>
                        <li><a href="#">POS Receipt</a></li>
                        <li><a href="#">SMS Templates</a></li>
                        <li><a href="#">Email Templates</a></li>
                        <li><a href="#">Notification</a></li>
                    </ul>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
