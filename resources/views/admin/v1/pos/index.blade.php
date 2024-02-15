<x-layout>
    @slot('title', 'pos')
    @slot('body')
        <link rel="stylesheet" href="{{ asset('assets/css/pos.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/frontend.css') }}">
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content p_content p-0">
                <div class="container-fluid">

                    <form id="form_data_pos" action="{{ route('pos.cartstore') }}">
                        <div class="row">
                            @csrf
                            <div class="col-xl-7">
                                @include('admin.v1.pos.header')
                                <div class="card mt-3">
                                    <div class="row filter mb-2">
                                        <div class="col-sm-3">
                                            <select id="storage_site_id" required
                                                class="form-control selectpicker form-select w-100" name="storage_site_id">
                                                <option selected disabled> -Select Warehouse- </option>
                                                @foreach ($storage_sites as $site)
                                                    <option value="{{ $site->id }}">{{ $site->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <select required
                                                onchange="selectDrop('form_data_pos', '{{ route('pos.search') }}', 'book_list')"
                                                name="publisher_id" class="form-control form-select w-100"
                                                id="publisher_id">
                                                <option selected disabled> -Select Publisher- </option>
                                                @foreach ($publishers as $publisher)
                                                    <option value="{{ $publisher->id }}"> {{ $publisher->name }}</option>
                                                @endforeach

                                            </select>
                                        </div>

                                        <div class="col-md-3">
                                            <select class="form-control form-select w-100 border-primary" name="category_id"
                                                id=""
                                                onchange="selectDrop('form_data_pos', '{{ route('pos.search') }}', 'book_list')">
                                                <option selected disabled> - Select Category - </option>
                                                @foreach ($category as $cat)
                                                    <option value="{{ $cat->id }}"> {{ $cat->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>



                                        <div class="col-md-3">
                                            <select class="form-control form-select w-100 border-primary" name=""
                                                id="">
                                                <option selected disabled> - Top Selling - </option>

                                                <option value=""> Featured 1</option>
                                                <option value=""> Featured 2</option>
                                            </select>
                                        </div>


                                    </div>
                                </div>
                                <div class="card-body p-2" id="book_list">
                                    {{-- @include('admin.v1.pos.book_list') --}}
                                    {{-- <div class="row pt-2">
                                        <div class="col-sm-12">
                                            <div class="">
                                                {!! $books->links() !!}
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>

                            </div>

                            <div class="col-xl-5">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row g-2 invoice-fields-area">
                                            <div class="col-md-8">
                                                <input id="invoice_no" name="invoice_no" required type="text"
                                                    class="form-control" readonly required
                                                    value="{{ 'INVNO:' . rand(1000000000, 9999999999) }}">
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input class="form-control" type="date" value="2023-12-04"
                                                        id="date">
                                                </div>
                                            </div>

                                            {{-- <div class="col-md-8">
                                                <div class="form-group">
                                                    <input type="hidden" name="warehouse_id_hidden" value="2">
                                                    <select
                                                        onchange="selectDrop('form_data_pos', '{{ route('pos.search') }}', 'book_list')"
                                                        name="store_id" required id="warehouse_id" name="warehouse_id"
                                                        class="form-select form-control" data-live-search="true"
                                                        data-live-search-style="begins" title="Select warehouse...">
                                                        <option selected disabled> -Select Warehouse- </option>
                                                        @foreach ($stores as $store)
                                                            <option value="{{ $store->id }}">{{ $store->store_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div> --}}

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    {{-- <input type="hidden" name="customer_id_hidden" value="11"> --}}
                                                    <div class="input-group pos">
                                                        <select
                                                            onchange="editForm('{{ route('pos.cart.get.customer') }}/'+this.value,'pos_cart')"
                                                            required name="customer_id" id="customer_id"
                                                            class="form-select form-control selectpicker"
                                                            data-live-search="true" title="Select customer..."
                                                            style="width: 100px">
                                                            <option selected disabled value="null">- Selsect Customers -
                                                            </option>
                                                            @foreach ($customers as $customer)
                                                                <option value="{{ $customer->id }}">{{ $customer->name }}
                                                                    (+91 {{ $customer->phone }})
                                                                </option>
                                                            @endforeach

                                                        </select>
                                                        {{-- <button type="button" class="btn btn-default btn-sm border"
                                                        data-bs-toggle="modal" data-bs-target="#addCustomer"><i
                                                                class="fas fa-plus"></i></button> --}}
                                                        <a class="btn btn-default btn-sm border" data-bs-toggle="modal"
                                                            data-bs-target="#customerAdd" style="padding-top: 10px;"><i
                                                                class="fas fa-plus"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- <div class="col-md-4">
                                                <select name="currency_id" id="currency" class="form-control form-select"
                                                    data-toggle="tooltip" title=""
                                                    data-original-title="Sale currency">
                                                    <option selected value="1" data-rate="1">₹ INR</option>
                                                </select>
                                            </div> --}}
                                            <div class="col-md-12">
                                                <div class="form-inline">
                                                    <div class="search-box">
                                                        <div class="position-relative">
                                                            <input type="text"
                                                                class="form-control bg-light border-light rounded "
                                                                placeholder="Search Book by name/code">
                                                            <i class="bx bx-search search-icon"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="pos_cart">
                                        </div>
                                        <div class="d-flex mt-4">
                                            <button type="button" class="btn btn-success w-100 mx-1" 
                                           {{--  data-bs-toggle="modal"  data-bs-target="#invoice"  --}}
                                                onclick="addsale()">
                                                Place Order
                                            </button>
                                            {{--  <button type="button" class="btn btn-outline-primary w-50 mx-1">
                                                Save Draft
                                            </button> --}}
                                        </div>
                                        {{-- <div class="d-flex flex-wrap gap-2">
                                            <button type="button" class="btn btn-primary"><i
                                                    class="bx bx-card icon-sm"></i>
                                                Card</button>
                                            <button type="button" class="btn btn-success"><i
                                                    class="bx bx-money icon-sm"></i> Cash</button>
                                            <button type="button" class="btn btn-warning"><i
                                                    class="uil uil-paypal me-2"></i> PayPal</button>
                                            <button type="button" class="btn btn-info"><i class="bx bx-money icon-sm"></i>
                                                Cheque</button>
                                            <button type="button" class="btn btn-danger"><i
                                                    class="uil uil-exclamation-triangle me-2"></i> Cancel</button>
                                            <button type="button" class="btn btn-purple"><i
                                                    class="uil uil-clock me-2"></i>
                                                Recent Transaction</button>
                                            <button type="button" class="btn btn-purple"><i class="fa fa-shopping-cart"></i>Check Out</button>
                                        </div> --}}

                                    </div>
                                </div>
                            </div>

                        </div>


                    </form>
                </div>

            </div> <!-- container-fluid -->

        </div>
        <!-- End Page-content -->

        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <script>
                            document.write(new Date().getFullYear())
                        </script>2023 © Vuesy.
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-end d-none d-sm-block">
                            Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesdesign
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        </div>


        </div>
        @include('admin.v1.pos.addcustomer')
        <div class="modal fade" id="invoice" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="">tax invoice</h5>
                        {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                    </div>
                    <div class="modal-body" id="tax_invoice">
                    </div>
                </div>
            </div>
        </div>
        {{--  @include('admin.v1.bill.bill') --}}
        <!-- END layout-wrapper -->

    @endslot

</x-layout>
<script>
    // for the paginatin purpose 
    $(document).ready(function() {
        $(document).on('click', '.pagination a', function(event) {
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            fetch_data(page);
        });

        function fetch_data(page) {
            selectDrop('form_data_pos', '{{ route('pos.search') }}?page=' + page, 'book_list')
        }

        $(document).on('click', '#discount_apply', function(event) {
            event.preventDefault();
            var discountid = $(this).val();
            //alert(discountid);

            // Corrected route with the discountid parameter
            var routeUrl = '{{ route('discount.apply', ['id' => ':discountid']) }}';
            routeUrl = routeUrl.replace(':discountid', discountid);

            selectDrop('form_data_pos', routeUrl, 'pos_cart');
            $('#discount-sec').modal('hide');

        });

         $(document).on('click', '#pos-payment', function() {
            //event.preventDefault();
            var saleid = $(this).val();
            //alert(saleid);

            // Corrected route with the discountid parameter
            var routeUrl = '{{ route('payment.bank.api', ['sale_id' => ':saleid']) }}';
            routeUrl = routeUrl.replace(':saleid', saleid);

            editForm(routeUrl,'show-msg');
            alert("Payment Successfully accepted");
            //var redirect_url = '{{ route('sale.index') }}';
            window.print();
            refreshPage(200);
           
        });

        $(document).on('click', '#abc', function() {
            // window.reload();

            refreshPage();
           
        }); 


    });

    function addToCart(bookId) {

        var selectedCustomer = document.getElementById('customer_id').value;
        var route = '{{ route('pos.add_cart', ':bookId') }}';
        route = route.replace(':bookId', bookId);

        if (selectedCustomer == 'null') {

            alert("Please select a customer before adding a book to the cart.");
        } else {

            selectDrop('form_data_pos', route, 'pos_cart');
        }
    }

    function addsale() {
        if (document.querySelector('#pos_cart #total_amount') !== null) {
            var tot_val = document.getElementById('total_amount').value;
            if (tot_val > 0) {
                var invoice_no1 = document.getElementById('invoice_no').value;
                //selectDrop('form_data_pos','{{ route('pos.cartstore') }}', 'tax_invoice');

                var form = document.getElementById('form_data_pos');
                var method = "POST"
                target_id = 'tax_invoice';

            var formdata = new FormData(form);
            var formElements_button = Array.from(form.elements).pop();
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                document.getElementById(target_id).value = this.responseText;
                document.getElementById(target_id).innerHTML = this.responseText;

                }
                method;
            };
            xhttp.open(method, '{{ route('pos.cartstore') }}', true);
            xhttp.send(formdata);
            $('#invoice').modal('show');

            } else {
                alert("Add atleast one book to cart");
            }
        } else {
            alert("Add atleast one book to cart");
        }

    }
</script>
