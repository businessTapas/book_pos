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
                <li class="menu-title" data-key="t-menu">For Retail</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class='bx bx-book nav-icon'></i>
                        <span class="menu-item" data-key="t-dashboard">Dashboard</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('dashboard') }}" href="">Profile</a></li>

                    </ul>
                </li>

 


                <li>

                <!-- <li>
 
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class='bx bxs-user-detail nav-icon'></i>
                        <span class="menu-item" data-key="t-ecommerce">User and RoleManagement</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin.index','retail-store')}}">For Retail </a></li>

                    </ul>
                </li>

                {{-- {{-- <li> --}}

                <li>


             

                    <a href="javascript: void(0);" class="has-arrow">
                        <i class='bx bx-book nav-icon' ></i>

                        <span class="menu-item" data-key="t-ecommerce">Books</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('books.index') }}">All Books </a></li>
                        {{-- <li><a href="{{ route('brands.index')}}">Brand </a></li> --}}
                        <li><a href="{{ route('categories.index') }}">Category </a></li>
                        <li><a href="{{ route('gstslabs.index') }}">GstSlab </a></li>

                        <li><a href="{{ route('central.book.request') }}">Book Request </a></li>

                        <li><a href="#">Unit </a></li>
                        <li><a href="#">Author </a></li>
                        <li><a href="#">Stock Count </a></li>

                    </ul>


                </li> 

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
                        <li><a href="{{ route('transfer.index') }}">ADJUSTMENT </a>
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
                        <i class='bx bxs-user-detail nav-icon'></i>
                        <span class="menu-item" data-key="t-role">User and Role</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin.index', 'retail-store') }}">For Retail </a></li>

                    </ul>
                </li>


                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class='bx bx-cart nav-icon'></i>

                        <span class="menu-item" data-key="t-sale">Sale Invoice </span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('sale.index') }}">Sale List </a></li>
                        <li><a href="{{ route('sale.create') }}">Add Sale </a></li>
                        <li><a href="#">POS </a></li>
                        <li><a href="#">Sale Return </a></li>
                    </ul>


                </li> 

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class='bx bx-purchase-tag-alt nav-icon'></i>
                        <span class="menu-item" data-key="t-sale">Purchase Order</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('purchase.index') }}">Purchase List </a></li>
                        <li><a href="{{ route('purchase.create') }}">Add Purchase </a></li>
                        <li><a href="#">Purchase Return </a></li>
                    </ul>
                </li>

                </li> 


              


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

           

                    </ul>
                </li>

                 
                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class='bx bx-cog nav-icon'></i>
                        <span class="menu-item" data-key="t-Customer">Customer</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{route('retail.customer')}}">List Customers </a></li>
                    <li><a href="{{route('retail.view')}}">Add Customers </a></li>
                    <li><a href="{{route('index.wish')}}">Customer Whishlist </a></li>
                    </ul>
                </li>

               
<!-- 
                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class='bx bx-cog nav-icon'></i>
                        <span class="menu-item" data-key="t-setup">Setup</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#">Print</a></li>
                        <li><a href="#">Payment Mode</a></li>
                        <li><a href="#">POS Receipt</a></li>
                        <li><a href="#">SMS Templates</a></li>
                        <li><a href="#">Email Templates</a></li>
                    </ul>
                </li> -->
                


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
                        <li><a href="#" class="has-arrow">Requisition </a>
                            <ul class="sub-menu" aria-expanded="false" class="has-arrow">
                                <li><a href="{{ route('requisition.index') }}">Requisition List </a></li>
                            @if (isCentral() || isPublisher())
                                <li><a href="{{ route('requisition.index') }}">Requisition Request </a></li>
                            @endif
                            <li><a href="{{ route('requisition.create') }}">Add Requisition </a></li>
                                </ul>
                            </li>
                    </ul>
                </li>




                
                <!-- <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class='bx bx-purchase-tag-alt nav-icon'></i>
                        <span class="menu-item" data-key="t-requitions">Requisition</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('requisition.index') }}">Requisition List </a></li>
                        <li><a href="{{ route('requisition.create') }}">Add Requisition </a></li>
                    </ul>
                </li> -->


                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class='bx bx-purchase-tag-alt nav-icon'></i>
                        <span class="menu-item" data-key="t-dispatch">Dispatch Order</span>

                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('dispatch.index') }}">Dispatch List </a></li>
                        <li><a href="{{ route('dispatch.create') }}">Add Dispatch </a></li>
                    </ul>
                </li>

                <!-- <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class='bx bx-purchase-tag-alt nav-icon'></i>
                        <span class="menu-item" data-key="t-grn">Goods Received Note (GRN) Management </span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('grn.index') }}">GRN List </a></li>
                        <li><a href="{{ route('grn.create') }}">Add GRN </a></li>
                    </ul>
                </li> -->

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class='bx bxs-bank nav-icon'></i>
                        <span class="menu-item" data-key="t-payment">Accounts </span>

                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#">Expenses </a></li>
                        <li><a href="#">Expense Category </a></li>
                        <li><a href="#">Payment Method</a></li>
                        <li><a href="{{ route('payout.list.pending') }}">Payout Transfer Record </a></li>
                        <li><a href="{{route('customer.payment')}}">Customer Transactions </a></li>

                    </ul>
                </li>






                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="bx bx-file nav-icon"></i>
                        <span class="menu-item" data-key="t-setting">Reports and Analytics</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#">Retail Stores (Own and Publisher-wise) </a></li>

                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class='bx bx-list-ul nav-icon'></i>
                        <span class="menu-item" data-key="t-utility">Utility</span>

                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#">Bulk Email/SMS Notification</a></li>
                        <li><a href="#">Backup</a></li>
                        <li><a href="#">Activity Log</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class='bx bx-cog nav-icon'></i>

                        <span class="menu-item" data-key="t-setup">Setup</span>
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

                
                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class='bx bx-purchase-tag-alt nav-icon'></i>
                        <span class="menu-item" data-key="t-requitions">Requisition Management</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('requisition.index') }}">Requisition List </a></li>
                        <li><a href="{{ route('requisition.create') }}">Add Requisition </a></li>
                    </ul>
                </li>

                {{-- <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class='bx bx-purchase-tag-alt nav-icon'></i>
                        <span class="menu-item" data-key="t-order">Purchase Order Management</span>

                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('purchase.index') }}">Purchase List </a></li>
                        <li><a href="{{ route('purchase.create') }}">Add Purchase </a></li>
                        <li><a href="#">Purchase Return </a></li>
                    </ul>
                </li> --}}

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class='bx bx-purchase-tag-alt nav-icon'></i>
                        <span class="menu-item" data-key="t-dispatch">Dispatch Order Management</span>

                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('dispatch.index') }}">Dispatch List </a></li>
                        <li><a href="{{ route('dispatch.create') }}">Add Dispatch </a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class='bx bx-purchase-tag-alt nav-icon'></i>
                        <span class="menu-item" data-key="t-grn">Goods Received Note (GRN) Management </span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('grn.index') }}">GRN List </a></li>
                        <li><a href="{{ route('grn.create') }}">Add GRN </a></li>
                    </ul>
                </li>



                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class='bx bxs-bank nav-icon'></i>
                        <span class="menu-item" data-key="t-payment">Payment Management </span>

                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#">Expenses </a></li>
                        <li><a href="#">Expense Category </a></li>
                        <li><a href="#">Payment Method</a></li>
                        <li><a href="#">Payout Transfer Record </a></li>
                        <li><a href="#">Customer Transactions </a></li>

                    </ul>
                </li>



{{--                 




                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="bx bx-file nav-icon"></i>
                        <span class="menu-item" data-key="t-setting">Reports and Analytics</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#">Retail Stores (Own and Publisher-wise) </a></li>

                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class='bx bx-cog nav-icon'></i>



                        <span class="menu-item" data-key="t-setting">Settings</span>
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



                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class='bx bx-cog nav-icon'></i>
                        <span class="menu-item" data-key="t-notification">Notification</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#">Print</a></li>
                        <li><a href="#">Payment Mode</a></li>
                    </ul>


                </li> 

                </li> -->


               


                 <!-- <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class='bx bx-cog nav-icon'></i>
                        <span class="menu-item" data-key="t-log">Activities Log</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#">Print</a></li>
                        <li><a href="#">Payment Mode</a></li>
                    </ul>
                </li>  -->

         
                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class='bx bxs-cart nav-icon'></i>
                        <span class="menu-item" data-key="t-order">Order Management </span>

                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#">Warehouse Transfer </a></li>

                    </ul>
                </li> -->
                 <!-- <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class='bx bx-user-pin nav-icon'></i>
                        <span class="menu-item" data-key="t-customer">Customers </span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('retail.customer') }}">List Customers </a></li>
                        <li><a href="{{ route('retail.view') }}">Add Customers </a></li>
                        <li><a href="{{ route('index.wish') }}">Customer Whishlist </a></li>

                    </ul>
                </li>  -->
                <!-- <li>
                    <a href="#">
                        <i class='bx bx-purchase-tag-alt nav-icon'></i>
                        <span class="menu-item" data-key="t-publisher">Suppliers/Publishers
                        </span>
                    </a>
                </li>
               -->
               
            



                {{-- <li>


                <li>


                <!-- <li>

               

                    <a href="javascript: void(0);" class="has-arrow">
                        <i class='bx bx-transfer-alt nav-icon'></i>
                        <span class="menu-item" data-key="t-adjustement">Transfer and Adjustment </span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#">List Transfer with Status </a></li>
                        <li><a href="#">List Adjustment with Status </a></li>
                    </ul>

                </li> --}}



{{-- 
                <li>


                </li> -->




                <!-- <li>



                    <a href="#">
                        <i class='bx bx-repost nav-icon'></i>
                        <span class="menu-item" data-key="t-refund">Return and Refund
                        </span>
                    </a>


                </li> --}}


                </li>




                </li> 



            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->