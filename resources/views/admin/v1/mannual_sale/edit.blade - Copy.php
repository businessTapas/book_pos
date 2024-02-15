<x-layout>
    @slot('title', $data['page'])
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
                                        <h4 class="card-title">{{ $data['page'] }} Edit</h4>
                                    </div>
                                    <a class="btn btn-primary add-list btn-sm text-white"
                                        href="{{ route('requisition.index') }}"><i class="las la-plus mr-3"></i>Back to
                                        {{ $data['page'] }} List</a>
                                </div>
                                <!-- Modal body -->

                                <div class="card-body">
                                    <form id="form_update" action="{{ route('sale.update', $saledata->id) }}"
                                        method="POST" autocomplete="off">
                                        <div class="row">
                                            @csrf
                                            @method('PUT')

                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="to_store" class="required">Choose Store</label>
                                                        <select id="to_store" required class="form-control selectpicker "
                                                            data-live-search="true" placeholder="Enter  Supplier "
                                                            name="to_store">
                                                                <option value="{{ $saledata->store->id }}">{{ $saledata->store->store_name }}
                                                                </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="storage_site_id" class="required">Wherhouse</label>
                                                        <select id="storage_site_id" required
                                                            class="form-control selectpicker  " data-live-search="true"
                                                            placeholder=" Select Wherhouse " name="storage_site_id">
                                                            @foreach ($data['storage_sites'] as $site)
                                                                <option {{ $site->id == $saledata->storage_site_id  ? 'selected' : '' }}
                                                                value="{{ $site->id }}">{{ $site->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="storage_site_id" class="required">Customer</label>
                                                        <select id="customer_id" required class="form-control selectpicker  "
                                                            data-live-search="true" placeholder="Enter  Customer "
                                                            name="customer_id">
                                                                <option value="{{ $saledata->customer->id }}">{{ $saledata->customer->name }}
                                                                    (+91 {{ $saledata->customer->phone }})
                                                                </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="supplier_id" class="required">Supplier</label>
                                                        <select id="supplier_id" required class="form-control "
                                                            data-live-search="true" placeholder="Enter  Supplier "
                                                            name="supplier_id">

                                                            @foreach ($data['suppliers'] as $supplier)
                                                                <option
                                                                    {{ $supplier->id == $saledata->publisher_id ? 'selected' : '' }}
                                                                    value="{{ $supplier->id }}">{{ $supplier->name }}
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
                                                            value="{{ $saledata->invoice_no }}"
                                                            placeholder="Enter Purchase no" name="po_no">
                                                    </div>
                                                </div>


                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label class="optional"> Description</label>
                                                        <textarea type="text" value="{{$saledata->description}}" class="form-control" placeholder="Enter name" name="description"></textarea>
                                                    </div>
                                                </div>
                                            <hr>
                                            <div class="card-body table-responsive">
                                                <table class="table table-bordered " id="dynamic_field"
                                                    style="overflow-y:auto;">
                                                    <thead>
                                                        <tr>
                                                            <th data-field="S.NO" data-sortable="true" rowspan="2">
                                                                S.NO
                                                            </th>
                                                            <th>Products </th>
                                                            <th>Qantity</th>
                                                            <th>Price </th>
                                                            {{-- <th>Purchase Price</th>
                                                            <th>Sale Price</th> --}}
                                                            {{-- <th>Batch No</th> --}}
                                                            {{-- <th>cGst</th>
                                                            <th>sGst</th>
                                                            <th>iGst</th>
                                                            <th>Tax Amount</th> --}}
                                                            <th>Taxeble Amount</th>
                                                            <th>Total Amount</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($saledata->saledetails as $p)
                                                            <tr id="row{{ $loop->index + 1 }}">
                                                                <td width="2%"><input type="text" id="slno1"
                                                                        value="{{ $loop->index + 1 }}" readonly
                                                                        class="form-control " style="border:none;" /></td>
                                                                <td width="18%">
                                                                    <select name="products[]"
                                                                        onchange="product(this.value,0)"
                                                                        class="form-control form-control-sm selectpicker "
                                                                        data-live-search="true">
                                                                            <option
                                                                                value="{{ $p->product->id }}">
                                                                                {{ $p->product->title }}</option>
                                                                    </select> </td>

                                                                <td><input onkeyup="qtyCal()" onclick="qtyCal()"
                                                                        type="number" name="request_qty[]"
                                                                        value="{{ $p->qty }}"
                                                                        placeholder="Request Qty"
                                                                        class="form-control-sm form-control request_qty" />
                                                                </td>
                                                                <td><input onkeyup="qtyCal()" onclick="qtyCal()"
                                                                        type="number" name="price[]"
                                                                        value="{{ $p->price }}" placeholder="price"
                                                                        class="form-control-sm form-control price" /></td>
                                                                {{-- <td><input onkeyup="qtyCal()" onclick="qtyCal()"
                                                                        type="number" name="purchase_price[]"
                                                                        value="{{ $p->purchase_price }}" placeholder=""
                                                                        class="form-control-sm form-control purchase_price" />
                                                                </td>
                                                                <td><input onkeyup="qtyCal()" onclick="qtyCal()"
                                                                        type="number" name="sale_price[]"
                                                                        value="{{ $p->sale_price }}"
                                                                        placeholder="sale_price"
                                                                        class="form-control-sm form-control sale_price" />
                                                                </td> --}}
                                                                {{-- <td><input onkeyup="qtyCal()" onclick="qtyCal()"
                                                                        type="number" name="batch_no[]"
                                                                        value="{{ $p->batch_no }}"
                                                                        placeholder="batch_no"
                                                                        class="form-control-sm form-control batch_no" />
                                                                </td> --}}

                                                                {{-- <td><input onkeyup="qtyCal()" onclick="qtyCal()"
                                                                        type="number" name="array_cgst[]"
                                                                        value="{{ $p->cgst }}"
                                                                        placeholder="array_cgst"
                                                                        class="form-control-sm form-control array_cgst" />
                                                                </td>
                                                                <td><input onkeyup="qtyCal()" onclick="qtyCal()"
                                                                        type="number" name="array_igst[]"
                                                                        value="{{ $p->igst }}"
                                                                        placeholder="array_igst"
                                                                        class="form-control-sm form-control array_igst" />
                                                                </td>
                                                                <td><input onkeyup="qtyCal()" onclick="qtyCal()"
                                                                        type="number" name="array_sgst[]"
                                                                        value="{{ $p->sgst }}"
                                                                        placeholder="array_sgst"
                                                                        class="form-control-sm form-control array_sgst" />
                                                                </td>
                                                                <td><input onkeyup="qtyCal()" onclick="qtyCal()"
                                                                        type="number" name="array_tax_amount[]"
                                                                        value="{{ $p->tax_amount }}"
                                                                        placeholder="tax_amount"
                                                                        class="form-control-sm form-control array_tax_amount" />
                                                                </td> --}}

                                                                <td><input onkeyup="qtyCal()" onclick="qtyCal()"
                                                                        type="number" name="array_taxeble_amount[]"
                                                                        value="{{ $p->taxeble_amount }}"
                                                                        placeholder="taxeble_amount"
                                                                        class="form-control-sm form-control array_taxeble_amount" />
                                                                </td>
                                                                <td><input onkeyup="qtyCal()" onclick="qtyCal()"
                                                                        type="number" name="array_total_amount[]"
                                                                        value="{{ $p->total_amount }}"
                                                                        placeholder="total_amount"
                                                                        class="form-control-sm form-control array_total_amount" />
                                                                </td>


                                                                <td>
                                                                    @if ($loop->index == 0)
                                                                        <button type="button" name="add"
                                                                            id="add"
                                                                            class="btn btn-success btn-sm"><i
                                                                                class="fa fa-plus" aria-hidden="true"></i>
                                                                        </button>
                                                                    @else
                                                                        <button type="button" name="remove"
                                                                            id="{{ $loop->index + 1 }}"
                                                                            class="btn btn-danger btn-sm btn_remove">X</button>
                                                                    @endif
                                                                </td>
                                                                </td>

                                                            </tr>
                                                        @endforeach

                                                    </tbody>

                                                    <tfoot>

                                                        <tr>
                                                            <td class="bold">Order Amount</td>
                                                            <td>
                                                                <input type="hidden" name="taxeble_amount"
                                                                    id="taxeble_amount" value="{{$saledata->sub_total}}"
                                                                    placeholder="taxeble_amount"
                                                                    class="form-control-sm form-control" /> </th>
                                                                ₹ <span id="taxeble_amount_label"> {{$saledata->sub_total}} </span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="bold">Order Tax</td>
                                                            <td>
                                                                <input readonly type="hidden" name="total_tax"
                                                                    id="total_tax"  value="{{$saledata->total_tax}}" 
                                                                    placeholder="total tax" class="form-control-sm form-control" />
                                                                ₹ <span id="total_tax_lable"> {{$saledata->total_tax}} </span>( <span
                                                                    id="tax_percentage"></span> %)
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="bold"><span id=discount-span>Apply </span>Discount
                                                                <button type="button" onclick="discount_get()" class="btn btn-link btn-sm ps-0"
            data-bs-toggle="modal" data-bs-target="#discount-sec"> <i class="bx bx-edit"></i></button>
                                                            </td>
                                                            <td>
                                                                <input readonly type="hidden" name="discount"
                                                                id="discount" placeholder="discount"
                                                                value="{{$saledata->discount}}" class="form-control-sm form-control" />
                                                            ₹ <span id="total_discount"> {{$saledata->discount}} </span>( <span
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
                                                                    value="{{$saledata->total}}" class="form-control-sm form-control" />
                                                                ₹<span class="font-weight-bold"
                                                                    id="total_amount_label">
                                                                    {{$saledata->total}}</span>
                                                            </td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                            <!-- /.card-body -->
                                            <div class="col-sm-12 mt-3 text-center">
                                                <button onclick="ajaxCall('form_update')" type="button"
                                                    class="btn btn-primary mt-2">Update
                                                    {{ $data['page'] }}</button>
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

<script>
    $(document).ready(function() {
        var i = {{ count($saledata->saledetails) }};

        $('#add').click(function() {
            i++;
            j = i - 1;

            $('#dynamic_field').append('<tr id="row' + i +
                '" class="dynamic-added" ><td><input type="text" id="slno' + i + '" value="' + i +
                '"readonly class="form-control-sm form-control" style="border:none;" /></td>' +
                '<td><select  onchange="product(this.value,' + j +
                 ')" name="products[]"placeholder="Search products.." class="form-control form-control-sm  " data-live-search="true">  <option selected disabled> -Search Products-   </option>  </select></td>' +
                '<td><input onkeyup="qtyCal()" onclick="qtyCal()"    type="number" name="request_qty[]" placeholder="Request Qty" class="form-control-sm form-control request_qty" /></td>' +
                '<td><input onkeyup="qtyCal()" onclick="qtyCal()"    type="number" name="price[]" placeholder="price" class="form-control-sm form-control price" /></td>' +
                // '<td><input onkeyup="qtyCal()" onclick="qtyCal()"    type="number" name="purchase_price[]" placeholder="" class="form-control-sm form-control purchase_price" /> </td>' +
                // '<td><input onkeyup="qtyCal()" onclick="qtyCal()"    type="number" name="sale_price[]" placeholder="sale_price"  class="form-control-sm form-control sale_price" /> </td>' +
                // '<td><input onkeyup="qtyCal()" onclick="qtyCal()"    type="number" name="batch_no[]" placeholder="batch_no" class="form-control-sm form-control batch_no" />  </td>' +
                // '<td width="5%"><select name="gst[]" placeholder="gst" class="form-control-sm form-control "> <option value="5">@5%</option> <option value="12">@12%</option> <option value="18">@18%</option>  <option value="28">@28%</option>   </select>  </td>' +
                // '<td><input onkeyup="qtyCal()" onclick="qtyCal()"    type="number" name="array_cgst[]" placeholder="array_cgst" class="form-control-sm form-control array_cgst" /></td>' +
                // '<td><input onkeyup="qtyCal()" onclick="qtyCal()"    type="number" name="array_igst[]" placeholder="array_igst" class="form-control-sm form-control array_igst" />  </td>' +
                // '<td><input onkeyup="qtyCal()" onclick="qtyCal()"    type="number" name="array_sgst[]" placeholder="array_sgst" class="form-control-sm form-control array_sgst" /> </td>' +
                // '<td><input onkeyup="qtyCal()" onclick="qtyCal()"    type="number" name="array_tax_amount[]" placeholder="tax_amount"  class="form-control-sm form-control array_tax_amount" /> </td>' +
                ' <td><input onkeyup="qtyCal()" onclick="qtyCal()"    type="number" name="array_taxeble_amount[]"placeholder="taxeble_amount" class="form-control-sm form-control array_taxeble_amount" /></td>' +
                ' <td><input onkeyup="qtyCal()" onclick="qtyCal()"    type="number" name="array_total_amount[]"placeholder="total_amount" class="form-control-sm form-control array_total_amount" /> </td>' +
                '<td><button type="button" name="remove" id="' + i +
                '" class="btn btn-danger btn-sm btn_remove">X</button></td></tr>');
        });

        $(document).on('click', '.btn_remove', function() {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
        });


    });

    function qtyCal() {
        const request_qty = document.getElementsByClassName('request_qty');
        const price = document.getElementsByClassName('price');
        var array_taxeble_amount = document.getElementsByClassName('array_taxeble_amount');
        var array_total_amount = document.getElementsByClassName('array_total_amount');
        for (i = 0; i < request_qty.length; i++) {
            array_taxeble_amount[i].value = (Number(request_qty[i].value) * Number(price[i].value)).toFixed(2);
            array_total_amount[i].value = (Number(request_qty[i].value) * Number(price[i].value)).toFixed(2);
        }
        calculation();
    }



    function calculation() {
        // const array_tax_amount = document.getElementsByClassName('array_tax_amount');
        const array_taxeble_amount = document.getElementsByClassName('array_taxeble_amount');
        const array_total_amount = document.getElementsByClassName('array_total_amount');

        // for seting the value into the total amount
        // const tax_amount = document.getElementById('tax_amount');
        const taxeble_amount = document.getElementById('taxeble_amount');
        const total_amount = document.getElementById('total_amount');
        // updating the amount
        // var total_tax_amount = 0;
        var total_taxeble_amount = 0;
        var total_total_amount = 0;

        for (i = 0; i < array_taxeble_amount.length; i++) {
            // total_tax_amount = total_tax_amount + Number(array_tax_amount[i].value);
            total_taxeble_amount = total_taxeble_amount + Number(array_taxeble_amount[i].value);
            total_total_amount = total_total_amount + Number(array_total_amount[i].value);
        }

        // tax_amount.value = total_tax_amount;
        taxeble_amount.value = total_taxeble_amount;
        total_amount.value = total_total_amount;

    }

    // fetch data behalf of price
/* 
    function product(product_id, prosition) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                data = JSON.parse(this.responseText)
                console.log(data);
                document.getElementsByClassName('price')[prosition].value = data.price
            }
        };
        xhttp.open('GET', "{{ route('requisition.product.price') }}/" + product_id, true);
        xhttp.send();

    } */

    function product(product_id, prosition) {
        if($('#publisher_id').val() !='') {
        selectDrop('form_data', '{{ route('sale.search') }}/' + product_id, 'product' + prosition, )
        } else {
            alert("Please Select Publisher")
        }

    }

    function price_get(product_id, prosition) {
        var xhttp = new XMLHttpRequest();
        formdata = new FormData(document.getElementById('form_data'));
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                data = JSON.parse(this.responseText)
                console.log(data);
                document.getElementsByClassName('price')[prosition].value = data.price
                document.getElementsByClassName('array_tax_amount')[prosition].value = data.gst.tax
                document.getElementsByClassName('availbal_qty')[prosition].innerText = "Avl Qty  :"+data.stock.qty
            }
        };
        xhttp.open('POST', "{{ route('sale.product.price') }}/" + product_id, true);
        xhttp.send(formdata);
    }
</script>

<!-- // model -->
