<x-layout>
    @slot('title', $page)
    @slot('body')
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between">
                                    <div class="header-title">
                                        <h4 class="card-title">{{ $page }} Create</h4>
                                    </div>
                                    <a class="btn btn-primary add-list btn-sm text-white" href="{{ route('sale.index') }}"><i
                                            class="las la-plus mr-3"></i>Back to
                                        {{ $page }} List</a>
                                </div>
                                <!-- Modal body -->
                                <div class="card-body">
                                    <form id="form_data" action="{{ route('sale.store') }}" method="POST"
                                        autocomplete="off">
                                        <div class="row">
                                            @csrf
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="store_id" class="required">Selected Store</label>
                                                    <select id="store_id" required class="form-control  "
                                                        data-live-search="true" placeholder="Select Store " name="store_id">
                                                        @foreach ($stores as $store)
                                                            <option value="{{ $store->id }}">{{ $store->store_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="storage_site_id" class="required">Wherhouse</label>
                                                    <select id="storage_site_id" required
                                                        class="form-control selectpicker  " data-live-search="true"
                                                        placeholder=" Select Wherhouse " name="storage_site_id">
                                                        @foreach ($storage_sites as $site)
                                                            <option value="{{ $site->id }}">{{ $site->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="customer_id" class="required">Customer</label>
                                                    <select id="customer_id" required class="form-control selectpicker  "
                                                        data-live-search="true" placeholder="Enter  Customer "
                                                        name="customer_id">
                                                        @foreach ($customers as $customer)
                                                            <option value="{{ $customer->id }}">{{ $customer->name }}
                                                                (+91 {{ $customer->phone }})
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="publisher_id" class="required">Publisher</label>
                                                    <select id="publisher_id" required class="form-control selectpicker  "
                                                        data-live-search="true" placeholder="Enter  Publisher "
                                                        name="publisher_id">
                                                        @foreach ($suppliers as $supplier)
                                                            <option value="{{ $supplier->id }}">
                                                                {{ $supplier->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="invoice_no" class="required">Invoice no </label>
                                                    <input id="invoice_no" name="invoice_no" required type="text"
                                                        class="form-control" readonly
                                                        value="{{ 'INVNO:' . rand(1000000000, 9999999999) }}"
                                                        placeholder="Enter Purchase no">
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="optional"> Description</label>
                                                    <textarea type="text" class="form-control" placeholder="Enter name" name="description"></textarea>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="card-body table-responsive">
                                                <table class="table table-bordered " id="dynamic_field"
                                                    style="overflow-y:auto;">
                                                    <thead>
                                                        <tr>
                                                            <th data-field="S.NO" data-sortable="true" rowspan="2">S.NO
                                                            </th>
                                                            <th>Products </th>
                                                            <th>Qantity</th>
                                                            <th>Price</th>
                                                            <!-- <th>Tax Percentage</th> -->
                                                            {{-- <th>Taxeble Amount</th> --}}
                                                            <th>Total Amount</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td width="2%"><input type="text" id="slno1"
                                                                    value="1" readonly class="form-control "
                                                                    style="border:none;" /></td>
                                                            <td width="18%">

                                                                <select onchange="price_get(this.value,0)" name="products[]"
                                                                    id="product0" placeholder="Search products.."
                                                                    class="form-control products selectpicker "
                                                                    data-live-search="true">
                                                                    <option value="">bookpas</option>
                                                                </select>
                                                                <small class="availbal_qty0"></small>

                                                            </td>
                                                            {{-- <td width="18%"><input onkeyup="product(this.value,0)"
                                                                    onkeyup="product(this.value,0)" list="product0"
                                                                    onclick="product(this.value,0)"
                                                                    onchange="price_get(this.value,0)"
                                                                    name="products[]"placeholder="Search products.."
                                                                    class="form-control form-control-sm products  ">
                                                                <datalist id="product0" aria-autocomplete='off'>

                                                                </datalist>
                                                                <small class="availbal_qty0"></small>

                                                            </td> --}}

                                                            <td><input type="number" name="request_qty[]"
                                                                    onkeyup="qtyCal(this.value)"
                                                                    onclick="qtyCal(this.value)" placeholder="Qty"
                                                                    class="form-control-sm form-control request_qty req_q0" />
                                                            </td>


                                                            <td><input type="number" name="price[]" placeholder=""
                                                                    placeholder="price" onkeyup="calculation()" readonly
                                                                    onclick="calculation()"
                                                                    class="form-control-sm form-control price price_per_u0" />


                                                                <input type="hidden" name="array_tax_percentage[]"
                                                                    id="arr_tax_amt0" class="array_tax_amount " />
                                                            </td>

                                                            {{-- <td><input type="number" name="array_taxeble_amount[]"
                                                                    onkeyup="calculation()" onclick="calculation()"
                                                                    placeholder="taxeble_amount"
                                                                    class="form-control-sm form-control array_taxeble_amount" />
                                                            </td> --}}
                                                            <td><input type="number" name="array_total_amount[]"
                                                                    onkeyup="calculation()" onclick="calculation()"
                                                                    readonly required placeholder="amount"
                                                                    class="form-control-sm form-control array_total_amount arr_total_amt0" />
                                                            </td>


                                                            <td><button type="button" name="add" id="add"
                                                                    class="btn btn-success btn-sm"><i class="fa fa-plus"
                                                                        aria-hidden="true"></i>
                                                                </button>
                                                            </td>

                                                        </tr>
                                                    </tbody>


                                                </table>
                                                <div class="row">
                                                    <div class="col-sm-7"></div>
                                                    <div class="col-sm-5">
                                                        <table class="table table-striped table-sm">
                                                            <tbody>



                                                                <tr>
                                                                    <td class="bold">Order Amount</td>
                                                                    <td>
                                                                        <input type="hidden" name="taxeble_amount"
                                                                            id="taxeble_amount"
                                                                            placeholder="taxeble_amount"
                                                                            class="form-control-sm form-control" /> </th>
                                                                        ₹ <span id="taxeble_amount_label"> 0.00 </span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="bold">Order Tax</td>
                                                                    <td>
                                                                        <input readonly type="hidden" name="total_tax"
                                                                            id="total_tax" placeholder="total tax"
                                                                            class="form-control-sm form-control" />
                                                                        ₹ <span id="total_tax_lable"> 0.00 </span>( <span
                                                                            id="tax_percentage"></span> %)
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="bold"><span id=discount-span>Apply
                                                                        </span>Discount
                                                                        <button type="button" onclick="discount_get()"
                                                                            class="btn btn-link btn-sm ps-0"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#discount-sec"> <i
                                                                                class="bx bx-edit"></i></button>
                                                                    </td>
                                                                    <td>
                                                                        <input readonly type="hidden" name="discount"
                                                                            id="discount" placeholder="discount"
                                                                            class="form-control-sm form-control" />
                                                                        ₹ <span id="total_discount"> 0.00 </span>( <span
                                                                            id="discount_percentage"></span> %)
                                                                    </td>
                                                                </tr>
                                                                {{--   <tr>
                                                                    <td class="bold">Shipping</td>
                                                                    <td>₹ 0.00</td>
                                                                </tr> --}}
                                                                <tr>
                                                                    <td><span class="font-weight-bold">Grand Total</span>
                                                                    </td>
                                                                    <td>
                                                                        <input type="hidden" name="total_amount"
                                                                            id="total_amount" placeholder="amount"
                                                                            class="form-control-sm form-control" />
                                                                        ₹<span class="font-weight-bold"
                                                                            id="total_amount_label">
                                                                            00.00</span>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card p-4">
                                                <div class="row">



                                                    {{--  <div class="col-sm-4 ">
                                                        <div class="form-group">
                                                            <label for="shiping_charge" class="required">Shiping
                                                                charage</label>
                                                            <input id="shiping_charge" name="shiping_charge" 
                                                                type="text" class="form-control"
                                                                placeholder="Enter discount amount" name="shiping_charge">
                                                        </div>
                                                    </div> --}}
                                                </div>
                                            </div>
                                            <!-- /.card-body -->
                                            <input type="hidden" name="mode_status" id="mode_status" value="">
                                            <div class="col-sm-6 mt-3 text-center">
                                                <button onclick="addsale('unpaid')" type="button"
                                                    class="btn btn-primary mt-2" data-bs-toggle="modal"
                                                    data-bs-target="#invoice">Add
                                                    {{ $page }}</button>
                                            </div>
                                            <div class="col-sm-6 mt-3 text-center">
                                                <button onclick="addsale('draft')" type="button"
                                                    class="btn btn-primary mt-2" >
                                                    Draft
                                                    {{ $page }}</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endslot
</x-layout>

 {{-- ================= MODAL COUPON ================ --}}

 {{-- <div class="modal fade" id="discount-sec" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class=" datatable table table-striped table-bordered ">
                    <thead>
                        <tr class="light">
                            <th>Sl No</th>
                            <th>Name</th>
                            <th>Discount %</th>
                            <th>Description</th>
                            <th>Coupon Code</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                       
                    <tbody id="discount_coupon_field">
                      
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div> --}}

<div class="modal fade" id="discount-sec" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="discount_coupon_field">
                
            </div>
        </div>
    </div>
</div>
</div>

{{-- ================== END MODAL ============== --}}
{{--===================MODAL INVOICE ===========---}}

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

 {{----============= END MODAL ======================== --}}       
<script>
    $(document).ready(function() {
        var i = 1;


        $('#add').click(function() {

            i++;
            j = i - 1;
            $('#dynamic_field').append('<tr id="row' + i +
                '" class="dynamic-added" ><td><input type="text" id="slno' + i + '" value="' + i +
                '"readonly class="form-control-sm form-control" style="border:none;" />  </td>' +
                '<td width="18%"><select ' +
                'onchange="price_get(this.value,' + i + ')"' +
                '" name="products[]" id="product' + i +
                '" placeholder="Search products.."  class="form-control products selectpicker  " data-live-search="true" > ' +
                '</select>'+
                '<small class="availbal_qty' + i + '"></small>' +
                '</td>'+
                //'<datalist id="product' + i + '"></datalist> <small class="availbal_qty'+i+'"></small>' +
                '<td><input   onkeyup="qtyCal(this.value)" onclick="qtyCal(this.value)"   type="number" name="request_qty[]" placeholder="Qty" class="form-control-sm form-control request_qty req_q' +
                i + ' " onkeyup="calculation()" onclick="calculation()" /></td>' +
                '<td><input type="number" readonly  name="price[]" placeholder="price"  class="form-control-sm form-control price price_per_u' +
                i + ' " onkeyup="calculation()" onclick="calculation()" /> ' +
                '<input type="hidden"   name="array_tax_percentage[]" id="arr_tax_amt' + i +
                '" class="array_tax_amount "  /> </td>' +
                // ' <td><input type="number" name="array_taxeble_amount[]"placeholder="taxeble_amount" class="form-control-sm form-control array_taxeble_amount " onkeyup="calculation()" onclick="calculation()" /></td>' +
                ' <td><input type="number" readonly name="array_total_amount[]" placeholder="amount" class="form-control-sm form-control array_total_amount arr_total_amt' +
                i + ' " onkeyup="calculation()" onclick="calculation()" /> </td>' +
                '<td><button type="button" onclick="qtyCal()" name="remove" id="' + i +
                '" class="btn btn-danger btn-sm btn_remove">X</button></td></tr>');
            product(i);
        });

        $(document).on('click', '.btn_remove', function() {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
            qtyCal();
        });

        $(document).on('change', '#customer_id', function() {
            var customer_id = $(this).val();
           // editForm('{{ route('sale.get_cus.invoice') }}/' + customer_id, 'tax_invoice');
            target_id = 'tax_invoice';
            var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        
                            document.getElementById(target_id).innerHTML = this.responseText;
                             $('#invoice').modal('show');
                    
                    }

                    if (this.status == 404) {
                            console.log('no')
                                           
                    }  
                };
                
                //var routeUrl = '{{ route('sale.get_cus.invoice', ['customerid' => ':customer_id']) }}';
                //routeUrl = routeUrl.replace(':customer_id', encodeURIComponent(customer_id));
                //var routeUrl = '{{ route('sale.get_cus.invoice', ['customerid' => ':customer_id']) }}';
           xhttp.open('GET',  "{{ route('sale.get_cus.invoice') }}/" + customer_id, true);
            xhttp.send();
            if ($('#storage_site_id').val() == '') {
                alert("Please select warehouse");
            }
        });

        $(document).on('change', '#publisher_id', function() {
            if ($('#customer_id').val() != '') {

                i = 1;
                document.getElementsByClassName('products')[0].value = '';
                document.getElementsByClassName('request_qty')[0].value = '';
                document.getElementsByClassName('price')[0].value = '';
                document.getElementsByClassName('array_tax_amount')[0].value = '';
                document.getElementsByClassName('array_total_amount')[0].value = '';
                document.getElementsByClassName('availbal_qty0')[0].innerText = '';


                const elements = document.getElementsByClassName('dynamic-added');
                while (elements.length > 0) {
                    elements[0].remove();
                }

                document.getElementById('discount').value = '';
                document.getElementById('total_discount').innerText = '';
                document.getElementById('discount_percentage').innerText = '';

                document.getElementById('total_tax').value = '';
                document.getElementById('taxeble_amount').value = '';
                document.getElementById('total_amount').value = '';
                document.getElementById('total_amount_label').innerText = '';

                document.getElementById('discount-span').innerText = 'Apply';
                document.getElementById('total_tax_lable').innerText = '';
                document.getElementById('taxeble_amount_label').innerText = '';
                document.getElementById('tax_percentage').innerText = '';

                product(0);
            } else {
                alert("Please Select Customer")
            }

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

    function qtyCal() {
        document.getElementById('discount').value = '';
        document.getElementById('total_discount').innerText = '';
        document.getElementById('discount_percentage').innerText = '';

        const request_qty = document.getElementsByClassName('request_qty');
        const price = document.getElementsByClassName('price');
        // var array_taxeble_amount = document.getElementsByClassName('array_taxeble_amount');
        var array_total_amount = document.getElementsByClassName('array_total_amount');
        var array_tax_amount = document.getElementsByClassName('array_tax_amount');
        for (i = 0; i < request_qty.length; i++) {
            // array_taxeble_amount[i].value = Number(request_qty[i].value) * Number(price[i].value).toFixed(2);
            total_amount_without_tax = Number(request_qty[i].value) * Number(price[i].value).toFixed(2);
            // array_total_amount[i].value = total_amount_without_tax + ((total_amount_without_tax / 100) * Number(
            //     array_tax_amount[i].value))
            array_total_amount[i].value = total_amount_without_tax;
        }
        calculation();
    }



    function calculation() {
        const array_tax_amount = document.getElementsByClassName('array_tax_amount');
        // const array_taxeble_amount = document.getElementsByClassName('array_taxeble_amount');
        const array_total_amount = document.getElementsByClassName('array_total_amount');

        // for seting the value into the total amount
        const total_tax = document.getElementById('total_tax');
        // const taxeble_amount = document.getElementById('taxeble_amount');
        const total_amount = document.getElementById('total_amount');
        // updating the amount
        var total_tax_amount = 0;
        // var total_taxeble_amount = 0;
        var total_total_amount = 0;

        for (i = 0; i < array_total_amount.length; i++) {
            total_tax_amount = total_tax_amount + Number(array_tax_amount[i].value);
            // total_taxeble_amount = total_taxeble_amount + Number(array_taxeble_amount[i].value);
            total_total_amount = total_total_amount + Number(array_total_amount[i].value);
        }

        total_tax.value = ((total_total_amount / 100) * Number(Number(total_tax_amount) / Number(array_tax_amount
            .length)));
        taxeble_amount.value = total_total_amount;
        total_amount.value = total_total_amount + Number(total_tax.value);
        getHidden();

    }


    function getHidden() {
        document.getElementById('total_tax_lable').innerText = document.getElementById('total_tax').value
        document.getElementById('total_amount_label').innerText = document.getElementById('total_amount').value
        document.getElementById('taxeble_amount_label').innerText = document.getElementById('taxeble_amount').value
        const array_tax_amount = document.getElementsByClassName('array_tax_amount');
        var total_tax_amount = 0;
        for (i = 0; i < array_tax_amount.length; i++) {
            total_tax_amount = total_tax_amount + Number(array_tax_amount[i].value);
        }
        const tax_percentage = document.getElementById('tax_percentage');
        tax_percentage.innerText = (Number(Number(total_tax_amount) / Number(array_tax_amount.length))).toFixed(2)

    }

    // fetch data behalf of price

    function product(prosition) {
        if ($('#publisher_id').val() != '') {
            //selectDrop('form_data', '{{ route('sale.search') }}/' + product_id, 'product' + prosition, )

            // getting the all from form
            var form = document.getElementById('form_data');
            var method = "POST";
            var formdata = new FormData(form);
            var formElements_button = Array.from(form.elements).pop();
            preloader(formElements_button);
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);

                    $('#product' + prosition).empty();
                    data = JSON.parse(this.responseText);
                    // Populate the Book dropdown with new options
                    if(data.length > 0) {
                    $.each(data, function(key, value) {
                        console.log(value);
                        $('#product' + prosition).append('<option value="' + value + '">' + value + '</option>');
                    });

                    // Refresh the selectpicker to reflect the changes
                    $('#product' + prosition).selectpicker('refresh');

                    stopPreloader(formElements_button);
                 } else {
                    alert("No product available");
                 }
                }
                method;
            };
            xhttp.open(method, '{{ route('sale.search') }}', true);
            xhttp.send(formdata);
        } else {
            alert("Please Select Publisher");
        }

    }

    function price_get(product_id, prosition) {
        var xhttp = new XMLHttpRequest();
        formdata = new FormData(document.getElementById('form_data'));
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                data = JSON.parse(this.responseText)
                console.log(data);
                var positionIndex = prosition;

                // Update the elements with the specified class names
                document.getElementsByClassName('req_q' + positionIndex)[0].value = 1;
                document.getElementsByClassName('price_per_u' + positionIndex)[0].value = data.price;
                document.getElementsByClassName('arr_total_amt' + positionIndex)[0].value = data.price;
                document.getElementById('arr_tax_amt' + positionIndex).value = data.gst.tax;
                document.getElementsByClassName('availbal_qty' + positionIndex)[0].innerText = "Avl Qty  :" + data.stock.qty
                qtyCal();
            }
        };
        xhttp.open('POST', "{{ route('sale.product.price') }}/" + product_id, true);
        xhttp.send(formdata);

    }

    function discount_get() {
        $('#discount_coupon_field').html('');
        const chk_dis = document.getElementById('discount').value;
        console.log(chk_dis);
        if (chk_dis == '' || chk_dis <= null) {

        var xhttp = new XMLHttpRequest();
        formdata = new FormData(document.getElementById('form_data'));
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                if (this.responseText) {
                
                    $('#discount_coupon_field').html(this.responseText);
                } else {
                    $('#discount_coupon_field').html('No Coupon Available For This Perchase Price');

                }
                
            }
        };
        xhttp.open('POST', "{{ route('sale.discount.totalamt') }}", true);
        xhttp.send(formdata);

    } else {
        alert('Discount already applied')
    }
    }

   /*  function discount_get() {
        $('#discount_coupon_field').html('');
        const chk_dis = document.getElementById('discount').value;
        console.log(chk_dis);
        if (chk_dis == '' || chk_dis == null) {
        var xhttp = new XMLHttpRequest();
        formdata = new FormData(document.getElementById('form_data'));
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                data = JSON.parse(this.responseText)
                if (data != null) {
                console.log(data.discount_data[0]);
                var st = '';
                $.each(data.discount_data, function( key, value ) {
                    console.log('caste: ' + value.discount + ' | id: ' +value.id);
                    st +='<tr> <td></td>  <td>' + value.name + '</td>  <td>'+ value.discount + '</td>'+ 
                            '<td>' + value.description + '</td> <td>'+ value.coupon_code +'</td>'+
                            '<td><button type="button" class="btn btn-primary" onclick="apply_discount('+ data.disamount +','+ data.dispercent +')")>'+
                            'Apply </button> </td>  </tr>';
                    });
                    $('#discount_coupon_field').html(st);
                } else {
                    $('#discount_coupon_field').html('No Coupon Available For This Perchase Price');

                }
            };
            xhttp.open('POST', "{{ route('sale.discount.totalamt') }}", true);
            xhttp.send(formdata);


    } else {
        alert('Discount already applied')
    }
    } */

    function apply_discount (dis_amt, dis_per) {
        // alert(dis_amt+"========"+dis_per);
        
        document.getElementById('discount').value = dis_amt;
        document.getElementById('total_discount').innerText = dis_amt;
        document.getElementById('discount_percentage').innerText = dis_per;

        total_amt = document.getElementById('total_amount').value;
        document.getElementById('total_amount').value = Number(total_amt) - Number(dis_amt);
        document.getElementById('total_amount_label').innerText = document.getElementById('total_amount').value;

        document.getElementById('discount-span').innerText = 'Applied ';

        $('#discount-sec').modal('hide');
    }


   

    function addsale(mode) {
        document.getElementById('mode_status').value = mode;
        if (mode == 'unpaid') {
        
                var invoice_no1 = document.getElementById('invoice_no').value;
                //selectDrop('form_data_pos','{{ route('pos.cartstore') }}', 'tax_invoice');

                var form = document.getElementById('form_data');
                var url_name = form.action;
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
            xhttp.open(method, url_name, true);
            xhttp.send(formdata);
            $('#invoice').modal('show');

        }

        if (mode == 'draft') {
            ajaxCall('form_data', '{{ route('sale.index') }}');
        }

    }
</script>

<!-- // model -->
