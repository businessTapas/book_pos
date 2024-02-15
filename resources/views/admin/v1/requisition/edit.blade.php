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
                                    <form id="form_update" action="{{ route('requisition.update', $data->id) }}"
                                        method="POST">
                                        <div class="row">
                                            @csrf
                                            @method('PUT')




                                            @if (isRetail())
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="to_store" class="required">Choose Store</label>
                                                        <select id="to_store" required class="form-control selectpicker "
                                                            data-live-search="true" placeholder="Enter  Supplier "
                                                            name="to_store">
                                                            <option selected disabled> - Select Store - </option>
                                                            @foreach ($stores as $store)
                                                                <option   {{ $store->id == $data->to_store ? 'selected' : '' }} value="{{ $store->id }}">{{ $store->store_name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            @endif
                                            @if (isCentral())
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="supplier_id" class="required">Supplier</label>
                                                        <select id="supplier_id" required class="form-control "
                                                            data-live-search="true" placeholder="Enter  Supplier "
                                                            name="supplier_id">

                                                            @foreach ($suppliers as $supplier)
                                                                <option
                                                                    {{ $supplier->id == $data->supplier_id ? 'selected' : '' }}
                                                                    value="{{ $supplier->id }}">{{ $supplier->name }}
                                                                </option>
                                                            @endforeach
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
                                                    <label for="requisition_date" class="required">Requisition Date</label>
                                                    <input value="{{ date('Y-m-d') }}" id="requisition_date" required
                                                        value="{{ $data->requisition_date }}" type="date"
                                                        class="form-control" readonly placeholder="Enter Purchase no"
                                                        name="requisition_date">
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
                                                        @foreach ($data->details as $p)
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
                                                                            <option
                                                                                {{ $product->id == $p->product_id ? 'selected' : '' }}
                                                                                value="{{ $product->id }}">
                                                                                {{ $product->title }}</option>
                                                                        @endforeach
                                                                    </select> </td>

                                                                <td><input onkeyup="qtyCal()" onclick="qtyCal()"
                                                                        type="number" name="request_qty[]"
                                                                        value="{{ $p->request_qty }}"
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
                                                            <th></th>
                                                            <th>Total</th>
                                                            <th></th>

                                                            <th></th>
                                                            {{-- <th><input type="number" name="cgst"
                                                                    placeholder="total_cgst" id="cgst"
                                                                    value="{{ $data->cgst }}"
                                                                    class="form-control-sm form-control" /> </th>
                                                            </th>
                                                            <th><input type="number" name="sgst" id="sgst"
                                                                    value="{{ $data->sgst }}" placeholder="total_sgst"
                                                                    class="form-control-sm form-control" /> </th>
                                                            </th>
                                                            <th><input type="number" name="igst" id="igst"
                                                                    value="{{ $data->igst }}" placeholder="total_igst"
                                                                    class="form-control-sm form-control" /> </th>
                                                            </th>
                                                            <th><input type="number" name="tax_amount" id="tax_amount"
                                                                    value="{{ $data->tax_amount }}"
                                                                    placeholder="tax_amount"
                                                                    class="form-control-sm form-control" /> </th>
                                                            </th> --}}
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
</script>

<!-- // model -->
