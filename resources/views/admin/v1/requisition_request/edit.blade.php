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
                                        <h4 class="card-title">{{ $page }} Edit</h4>
                                    </div>
                                    <a class="btn btn-primary add-list btn-sm text-white"
                                        href="{{ route('requisition.index') }}"><i class="las la-plus mr-3"></i>Back to
                                        {{ $page }} List</a>
                                </div>
                                <!-- Modal body -->


                                <div class="card-body">
                                    <form id="form_update" action="{{ route('requisition-request.update', $data->id) }}"
                                        method="POST">
                                        <div class="row">
                                            @csrf
                                            @method('PUT')
                                            @if (isCentral())
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="store_id" class="required">From Store</label>
                                                        <select id="store_id" required class="form-control  "
                                                            data-live-search="true" placeholder="Enter  Supplier ">
                                                            <option value="{{ $data->store_id }}">
                                                                {{ $data->store->store_name }}
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="to_store" class="required">To Store</label>
                                                        <select id="to_store" required class="form-control  "
                                                            data-live-search="true" placeholder="Enter  Supplier ">
                                                            <option value="{{ $data->store_id }}">
                                                                {{ $data->store2->store_name }}
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            @endif
                                            @if (isPublisher())
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="store_id" class="required">From Store</label>
                                                        <select id="store_id" required class="form-control  "
                                                            data-live-search="true" placeholder="Enter  Supplier ">
                                                            <option value="{{ $data->store_id }}">
                                                                {{ $data->store->store_name }}
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
                                                            <option value="{{ $data->supplier->id }}">
                                                                {{ $data->supplier->name }}
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            @endif
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="requisition_no" class="required">requisition No</label>
                                                    <input id="requisition_no" name="requisition_no" required type="text"
                                                        class="form-control" readonly value="{{ $data->requisition_no }}"
                                                        placeholder="Enter Purchase no" name="requisition_no">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="transport_charge" class="required">transport_charge</label>
                                                    <input id="transport_charge" required type="number"
                                                        value="{{ $data->transport_charge }}" class="form-control"
                                                        placeholder="transport_charge" name="transport_charge">
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="requisition_date" class="required">requisition_date</label>
                                                    <input value="{{ date('Y-m-d') }}" id="requisition_date" required
                                                        value="{{ $data->requisition_date }}" type="date"
                                                        class="form-control" readonly placeholder="Enter Purchase no"
                                                        name="requisition_date">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="expected_delivery_date"
                                                        class="required">expected_delivery_date</label>
                                                    <input value="{{ date('Y-m-d') }}" id="expected_delivery_date" required
                                                        value="{{ $data->expected_delivery_date }}" type="date"
                                                        class="form-control" placeholder="Enter Purchase no"
                                                        name="expected_delivery_date">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="status" class="required">status</label>
                                                    <select id="status" name="status" required
                                                        class="form-control selectpicker" data-live-search="true"
                                                        name="status">
                                                        <option disabled> - Select Status - </option>
                                                        <option {{ $data->status == 'pending' ? 'selected' : '' }}
                                                            value="pending"> Pending</option>
                                                        <option {{ $data->status == 'rejected' ? 'selected' : '' }}
                                                            value="rejected"> Rejected</option>
                                                        <option {{ $data->status == 'approved' ? 'selected' : '' }}
                                                            value="approved"> Approved </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="required"> transport_details</label>
                                                    <textarea type="text" class="form-control" placeholder="transport_details" name="transport_details">{{ $data->transport_details }}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="optional"> Description</label>
                                                    <textarea type="text" class="form-control" placeholder="Enter name" name="description">{{ $data->description }}</textarea>
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
                                                            @if ($data->store->district->state == $data->store2->district->state)
                                                                <th>iGst</th>
                                                            @else
                                                                <th>cGst</th>
                                                                <th>sGst</th>
                                                            @endif
                                                            <th>Tax Amount</th>
                                                            <th>Taxeble Amount</th>
                                                            <th>Total Amount</th>
                                                            {{-- <th>Actions</th> --}}
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($data->details as $p)
                                                            @php
                                                                $inventry = \App\Models\MasterStockInventery::where('product_id', $p->product_id)
                                                                    ->where('store_id', auth()->user()->store_id)
                                                                    ->sum('qty');
                                                            @endphp

                                                            <tr id="row{{ $loop->index + 1 }}">
                                                                <td width="2%"><input type="text" id="slno1"
                                                                        value="{{ $loop->index + 1 }}" readonly
                                                                        class="form-control " style="border:none;" /></td>
                                                                <td width="18%"><select
                                                                        name="products[]"placeholder="Search products.."
                                                                        onchange="product(this.value,0)"
                                                                        class="form-control form-control-sm selectpicker "
                                                                        data-live-search="true">
                                                                        <option disabled> -Search Products-</option>
                                                                        @foreach ($products as $product)
                                                                            store_id
                                                                            <option
                                                                                {{ $product->id == $p->product_id ? 'selected' : '' }}
                                                                                value="{{ $product->id }}">
                                                                                {{ $product->title }}</option>
                                                                        @endforeach
                                                                    </select> </td>

                                                                <td>
                                                                    <small class="text-success">Availbal Qty -
                                                                        {{ $inventry ?? 0 }}</small>
                                                                    <input type="hidden" value="{{ $inventry ?? 0 }}"
                                                                        id="avail_qty{{ $p->id }}">
                                                                    <input
                                                                        onkeyup="qtyCal(),checkQty(this,'avail_qty{{ $p->id }}')"
                                                                        onclick="qtyCal()" type="number"
                                                                        name="request_qty[]"
                                                                        value="{{ $p->request_qty }}"
                                                                        placeholder="Request Qty"
                                                                        class="form-control-sm form-control request_qty" />
                                                                    <small class="text-danger"
                                                                        id="error_avail_qty{{ $p->id }}"></small>
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
                                                                @if ($data->store->district->state == $data->store2->district->state)
                                                                    <td><input onkeyup="qtyCal()" onclick="qtyCal()"
                                                                            type="number" name="array_igst[]"
                                                                            value="{{ $p->igst ?? ($p->product->gst->tax * $p->price) / 100 }}"
                                                                            placeholder="array_igst"
                                                                            class="form-control-sm form-control array_igst" />
                                                                    </td>
                                                                @else
                                                                    <td><input onkeyup="qtyCal()" onclick="qtyCal()"
                                                                            type="number" name="array_cgst[]"
                                                                            value="{{ $p->cgst ?? ($p->product->gst->tax * $p->price) / 200 }}"
                                                                            placeholder="array_cgst"
                                                                            class="form-control-sm form-control array_cgst" />
                                                                    </td>

                                                                    <td><input onkeyup="qtyCal()" onclick="qtyCal()"
                                                                            type="number" name="array_sgst[]"
                                                                            value="{{ $p->sgst ?? ($p->product->gst->tax * $p->price) / 200 }}"
                                                                            placeholder="array_sgst"
                                                                            class="form-control-sm form-control array_sgst" />
                                                                    </td>
                                                                @endif
                                                                <input type="hidden" class="tax"
                                                                    value="{{ $p->product->gst->tax }}">
                                                                <td><input onkeyup="qtyCal()" onclick="qtyCal()"
                                                                        type="number" name="array_tax_amount[]"
                                                                        value="" placeholder="tax_amount"
                                                                        class="form-control-sm form-control array_tax_amount" />
                                                                </td>

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


                                                                {{-- <td>
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
                                                                </td> --}}
                                                                </td>

                                                            </tr>
                                                        @endforeach

                                                    </tbody>

                                                    <tfoot>

                                                        <tr>
                                                            <th></th>
                                                            <th>Total</th>
                                                            <th></th>

                                                            <th></th>
                                                            @if ($data->store->district->state == $data->store2->district->state)
                                                                <th><input type="number" name="igst" id="igst"
                                                                        value="{{ $data->igst }}"
                                                                        placeholder="total_igst"
                                                                        class="form-control-sm form-control" /> </th>
                                                                </th>
                                                            @else
                                                                <th><input type="number" name="cgst"
                                                                        placeholder="total_cgst" id="cgst"
                                                                        value="{{ $data->cgst }}"
                                                                        class="form-control-sm form-control" /> </th>
                                                                </th>
                                                                <th><input type="number" name="sgst" id="sgst"
                                                                        value="{{ $data->sgst }}"
                                                                        placeholder="total_sgst"
                                                                        class="form-control-sm form-control" /> </th>
                                                                </th>
                                                            @endif
                                                            <th><input type="number" name="tax_amount" id="tax_amount"
                                                                    value="{{ $data->tax_amount }}"
                                                                    placeholder="tax_amount"
                                                                    class="form-control-sm form-control" /> </th>
                                                            </th>
                                                            <th><input type="number" name="taxeble_amount"
                                                                    id="taxeble_amount"
                                                                    value="{{ $data->taxeble_amount }}"
                                                                    placeholder="taxeble_amount"
                                                                    class="form-control-sm form-control" /> </th>
                                                            </th>
                                                            <th><input type="number" name="total_amount"
                                                                    id="total_amount" value="{{ $data->total_amount }}"
                                                                    placeholder="total_amount"
                                                                    class="form-control-sm form-control" /> </th>
                                                            </th>
                                                            <th></th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                            <!-- /.card-body -->
                                            <div class="col-sm-12 mt-3 text-center">
                                                <button onclick="ajaxCall('form_update')" type="button"
                                                    class="btn btn-primary mt-2">Update
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

<script>
    $(document).ready(function() {
        var i = {{ count($data->details) }};

        $('#add').click(function() {
            i++;
            j = i - 1;

            $('#dynamic_field').append('<tr id="row' + i +
                '" class="dynamic-added" ><td><input type="text" id="slno' + i + '" value="' + i +
                '"readonly class="form-control-sm form-control" style="border:none;" /></td>' +
                '<td><select  onchange="product(this.value,' + j +
                ')" name="products[]"placeholder="Search products.." class="form-control form-control-sm  " data-live-search="true">  <option selected disabled> -Search Products-   </option> @foreach ($products as $product) <option value="{{ $product->id }}">  {{ $product->title }}</option>   @endforeach </select></td>' +
                '<td><input onkeyup="qtyCal()" onclick="qtyCal()"    type="number" name="request_qty[]" placeholder="Request Qty" class="form-control-sm form-control request_qty" /></td>' +
                '<td><input onkeyup="qtyCal()" onclick="qtyCal()"    type="number" name="price[]" placeholder="price" class="form-control-sm form-control price" /></td>' +
                // '<td><input onkeyup="qtyCal()" onclick="qtyCal()"    type="number" name="purchase_price[]" placeholder="" class="form-control-sm form-control purchase_price" /> </td>' +
                // '<td><input onkeyup="qtyCal()" onclick="qtyCal()"    type="number" name="sale_price[]" placeholder="sale_price"  class="form-control-sm form-control sale_price" /> </td>' +
                // '<td><input onkeyup="qtyCal()" onclick="qtyCal()"    type="number" name="batch_no[]" placeholder="batch_no" class="form-control-sm form-control batch_no" />  </td>' +
                // '<td width="5%"><select name="gst[]" placeholder="gst" class="form-control-sm form-control "> <option value="5">@5%</option> <option value="12">@12%</option> <option value="18">@18%</option>  <option value="28">@28%</option>   </select>  </td>' +
                '<td><input onkeyup="qtyCal()" onclick="qtyCal()"    type="number" name="array_cgst[]" placeholder="array_cgst" class="form-control-sm form-control array_cgst" /></td>' +
                '<td><input onkeyup="qtyCal()" onclick="qtyCal()"    type="number" name="array_igst[]" placeholder="array_igst" class="form-control-sm form-control array_igst" />  </td>' +
                '<td><input onkeyup="qtyCal()" onclick="qtyCal()"    type="number" name="array_sgst[]" placeholder="array_sgst" class="form-control-sm form-control array_sgst" /> </td>' +
                '<td><input onkeyup="qtyCal()" onclick="qtyCal()"    type="number" name="array_tax_amount[]" placeholder="tax_amount"  class="form-control-sm form-control array_tax_amount" /> </td>' +
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

    /**
     * calculate the all kind of tax according the tax percentage
     * as well as also the particular store located on the which state 
     * if both state are in same state the calculate the cgst and sgst accrodinly
     * 
     */


    function gstCal() {

        const request_qty = document.getElementsByClassName('request_qty');
        const price = document.getElementsByClassName('price');

        const array_cgst = document.getElementsByClassName('array_cgst');
        const array_sgst = document.getElementsByClassName('array_sgst');
        const array_igst = document.getElementsByClassName('array_igst');
        const tax = document.getElementsByClassName('tax');

        for (i = 0; i < request_qty.length; i++) {
            if (array_cgst.length > 0) {
                array_cgst[i].value = (((Number(request_qty[i].value) * Number(price[i].value)) / 200) * Number(tax[i].value)).toFixed(2)
            }
            if (array_sgst.length > 0) {
                array_sgst[i].value = (((Number(request_qty[i].value) * Number(price[i].value)) / 200) * Number(tax[i].value)).toFixed(2)
            }
            if (array_igst.length > 0) {
                array_igst[i].value = (((Number(request_qty[i].value) * Number(price[i].value)) / 100) * Number(tax[i].value)).toFixed(2)
            }
        }


    }


    function qtyCal() {
        gstCal();
        const request_qty = document.getElementsByClassName('request_qty');
        const price = document.getElementsByClassName('price');
        const array_taxeble_amount = document.getElementsByClassName('array_taxeble_amount');
        const array_total_amount = document.getElementsByClassName('array_total_amount');
        const array_cgst = document.getElementsByClassName('array_cgst');
        const array_sgst = document.getElementsByClassName('array_sgst');
        const array_igst = document.getElementsByClassName('array_igst');
        const array_tax_amount = document.getElementsByClassName('array_tax_amount');


        for (i = 0; i < request_qty.length; i++) {
            try {

                var total_tax = 0
                if (array_cgst.length > 0) {
                    total_tax = total_tax + Number(array_cgst[i].value);
                }
                if (array_sgst.length > 0) {
                    total_tax = total_tax + Number(array_sgst[i].value);
                }
                if (array_igst.length > 0) {
                    total_tax = total_tax + Number(array_igst[i].value);
                }
                array_taxeble_amount[i].value = Number(request_qty[i].value) * Number(price[i].value) + total_tax;
                array_total_amount[i].value = Number(request_qty[i].value) * Number(price[i].value) + total_tax;
                array_tax_amount[i].value = total_tax;
            } catch (error) {

            }
        }
        calculation();
    }



    function calculation() {
        const array_tax_amount = document.getElementsByClassName('array_tax_amount');
        const array_taxeble_amount = document.getElementsByClassName('array_taxeble_amount');
        const array_total_amount = document.getElementsByClassName('array_total_amount');
        const array_cgst = document.getElementsByClassName('array_cgst');
        const array_sgst = document.getElementsByClassName('array_sgst');
        const array_igst = document.getElementsByClassName('array_igst');
        // for seting the value into the total amount
        const tax_amount = document.getElementById('tax_amount');
        const taxeble_amount = document.getElementById('taxeble_amount');
        const total_amount = document.getElementById('total_amount');
        const cgst = document.getElementById('cgst');
        const igst = document.getElementById('igst');
        const sgst = document.getElementById('sgst');

        // updating the amount
        var total_tax_amount = 0;
        var total_taxeble_amount = 0;
        var total_total_amount = 0;
        var total_igst = 0;
        var total_sgst = 0;
        var total_cgst = 0;


        for (i = 0; i < array_taxeble_amount.length; i++) {
            total_tax_amount = total_tax_amount + Number(array_tax_amount[i].value);
            total_taxeble_amount = total_taxeble_amount + Number(array_taxeble_amount[i].value);
            total_total_amount = total_total_amount + Number(array_total_amount[i].value);
            if (array_cgst.length > 0) {
                total_cgst = total_cgst + Number(array_cgst[i].value);
            }
            if (array_igst.length > 0) {
                total_igst = total_igst + Number(array_igst[i].value);
            }
            if (array_sgst.length > 0) {
                total_sgst = total_sgst + Number(array_sgst[i].value);
            }
        }

        tax_amount.value = total_tax_amount.toFixed(2);
        taxeble_amount.value = total_taxeble_amount.toFixed(2);
        total_amount.value = total_total_amount.toFixed(2);
        if (array_cgst.length > 0) {
            cgst.value = total_cgst.toFixed(2);
        }
        if (array_igst.length > 0) {
            igst.value = total_igst.toFixed(2);
        }
        if (array_sgst.length > 0) {
            sgst.value = total_sgst.toFixed(2);
        }

    }
    // after load the document envent will be fire
    document.addEventListener("DOMContentLoaded", () => {
        qtyCal();
    });
    // fetch data behalf of price

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

    }

    function checkQty(data, id) {
        var idValue = document.getElementById(id).value
        if (Number(data.value) >= Number(idValue)) {
            document.getElementById('error_' + id).innerHTML = "Please enter qty below " + idValue
            data.value = idValue;
            data.style.borderColor = "red"
        } else {
            document.getElementById('error_' + id).innerHTML = ""
            data.style.borderColor = "green"
        }

    }
</script>

<!-- // model -->
