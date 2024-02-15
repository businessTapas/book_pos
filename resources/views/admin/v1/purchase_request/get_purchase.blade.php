<div class="row">
    @csrf
    <div class="col-sm-4">
        <div class="form-group">
            <label for="to_store" class="required">Choose Store</label>
            <select  id="to_store" required class="form-control  " data-live-search="true"
                placeholder="Enter  Supplier " name="to_store">
                @foreach ($stores as $store)
                    <option {{ $store->id == $data->to_store ? 'selected' : '' }} value="{{ $store->id }}">{{ $store->store_name }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label for="supplier_id" class="required">Supplier</label>
            <select id="supplier_id" required class="form-control" placeholder="Enter  Supplier " name="supplier_id">
                @foreach ($suppliers as $supplier)
                    <option {{ $supplier->id == $data->supplier_id ? 'selected' : '' }} value="{{ $supplier->id }}">
                        {{ $supplier->name }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label for="po_no" class="required">Purchase No</label>
            <input readonly id="po_no" name="po_no" required type="text" class="form-control" readonly
                value="PO{{ rand(111111111, 9999999999) }}" placeholder="Enter Purchase no">
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label for="transport_charge" class="required">transport_charge</label>
            <input readonly id="transport_charge" required type="number" value="{{ $data->transport_charge }}"
                class="form-control" placeholder="transport_charge" name="transport_charge">
        </div>
    </div>

    <div class="col-sm-4">
        <div class="form-group">
            <label for="po_date" class="required">Purchase Date</label>
            <input readonly value="{{ date('Y-m-d') }}" id="po_date" required value="{{ $data->requisition_date }}"
                type="date" class="form-control" readonly placeholder="Enter Purchase no" name="po_date">
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label for="expected_delivery_date" class="required">expected_delivery_date</label>
            <input readonly value="{{ date('Y-m-d') }}" id="expected_delivery_date" required
                value="{{ $data->expected_delivery_date }}" type="date" class="form-control"
                placeholder="Enter Purchase no" name="expected_delivery_date">
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label for="status" class="required">status</label>
            <select id="status" name="status" required class="form-control selectpicker" data-live-search="true"
                name="status">
                <option disabled> - Select Status - </option>
                <option {{ $data->status == 'pending' ? 'selected' : '' }} value="pending"> Pending</option>
                <option {{ $data->status == 'rejected' ? 'selected' : '' }} value="rejected"> Rejected</option>
                <option {{ $data->status == 'approved' ? 'selected' : '' }} value="approved"> Approved</option>
            </select>
        </div>
    </div>

    <div class="col-sm-12">
        <div class="form-group">
            <label class="optional"> transport_details</label>
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
        <table class="table table-bordered " id="dynamic_field" style="overflow-y:auto;">
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
                    <th>cGst</th>
                    <th>sGst</th>
                    <th>iGst</th>
                    <th>Tax Amount</th>
                    <th>Taxeble Amount</th>
                    <th>Total Amount</th>
                    {{-- <th>Actions</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($data->details as $p)
                    <tr id="row{{ $loop->index + 1 }}">
                        <td width="2%"><input readonly type="text" id="slno1" value="{{ $loop->index + 1 }}" readonly
                                class="form-control " style="border:none;" /></td>
                        <td width="18%"><select  name="products[]"placeholder="Search products.."
                                class="form-control form-control-sm  ">
                                <option disabled> -Search Products-
                                </option>
                                @foreach ($products as $product)
                                    <option {{ $product->id == $p->product_id ? 'selected' : '' }}
                                        value="{{ $product->id }}">
                                        {{ $product->title }}</option>
                                @endforeach
                            </select>
                        </td>

                        <td><input readonly type="number" name="request_qty[]" value="{{ $p->request_qty }}"
                                placeholder="Request Qty" class="form-control-sm form-control" /></td>
                        <td><input readonly type="number" name="price[]" value="{{ $p->price }}" placeholder="price"
                                class="form-control-sm form-control" /></td>
                        {{-- <td><input readonly type="number" name="purchase_price[]" value="{{ $p->purchase_price }}"
                                placeholder="" class="form-control-sm form-control" />
                        </td>
                        <td><input readonly type="number" name="sale_price[]" value="{{ $p->sale_price }}"
                                placeholder="sale_price" class="form-control-sm form-control" />
                        </td> --}}
                        {{-- <td><input readonly type="number" name="batch_no[]" value="{{ $p->batch_no }}"
                                placeholder="batch_no" class="form-control-sm form-control" />
                        </td> --}}

                        <td><input readonly onkeyup="cgstCal(this.value)" onclick="cgstCal(this.value)" type="number"
                                name="array_cgst[]" value="{{ $p->cgst }}" placeholder="array_cgst"
                                class="form-control-sm form-control cgst" />
                        </td>
                        <td><input readonly type="number" name="array_igst[]" value="{{ $p->igst }}"
                                placeholder="array_igst" class="form-control-sm form-control" />
                        </td>
                        <td><input readonly type="number" name="array_sgst[]" value="{{ $p->sgst }}"
                                placeholder="array_sgst" class="form-control-sm form-control" />
                        </td>
                        <td><input readonly type="number" name="array_tax_amount[]" value="{{ $p->tax_amount }}"
                                placeholder="tax_amount" class="form-control-sm form-control" />
                        </td>

                        <td><input readonly type="number" name="array_taxeble_amount[]" value="{{ $p->taxeble_amount }}"
                                placeholder="taxeble_amount" class="form-control-sm form-control" />
                        </td>
                        <td><input readonly type="number" name="array_total_amount[]" value="{{ $p->total_amount }}"
                                placeholder="total_amount" class="form-control-sm form-control" />
                        </td>


                        {{-- <td>
                            @if ($loop->index == 0)
                                <button type="button" name="add" id="add"
                                    class="btn btn-success btn-sm"><i class="fa fa-plus" aria-hidden="true"></i>
                                </button>
                            @else
                                <button type="button" name="remove" id="{{ $loop->index + 1 }}"
                                    class="btn btn-danger btn-sm btn_remove">X</button>
                            @endif
                        </td> --}}
                        </td>

                    </tr>
                @endforeach

            </tbody>

            <tfoot>

                <tr>
                    <th>Total</th>
                    <th></th>
                    <th></th>

                    <th></th>
                    <th><input readonly type="number" name="cgst" placeholder="total_cgst" value="{{ $data->cgst }}"
                            class="form-control-sm form-control" /> </th>
                    </th>
                    <th><input readonly type="number" name="sgst" value="{{ $data->sgst }}" placeholder="total_sgst"
                            class="form-control-sm form-control" /> </th>
                    </th>
                    <th><input readonly type="number" name="igst" value="{{ $data->igst }}" placeholder="total_igst"
                            class="form-control-sm form-control" /> </th>
                    </th>
                    <th><input readonly type="number" name="tax_amount" value="{{ $data->tax_amount }}"
                            placeholder="tax_amount" class="form-control-sm form-control" /> </th>
                    </th>
                    <th><input readonly type="number" name="taxeble_amount" value="{{ $data->taxeble_amount }}"
                            placeholder="taxeble_amount" class="form-control-sm form-control" /> </th>
                    </th>
                    <th><input readonly type="number" name="total_amount" value="{{ $data->total_amount }}"
                            placeholder="total_amount" class="form-control-sm form-control" /> </th>
                    </th>
                    <th></th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.card-body -->
    <div class="col-sm-12 mt-3 text-center">
        <button onclick="ajaxCall('form_data')" type="button" class="btn btn-primary mt-2">Create
            {{ $page }}</button>
    </div>
</div>

<script>
    function cgstCal(value1) {
        // from where getting value
        // const cgst_cal = document.querySelector('cgst');
        // send value
        // var cgst_total = document.getElementByName('cgst').value;
        console.log("Wasif");
        // console.log(cgst_total);

        // cgst_total = value1;
    }

    function callme() {
        console.log("Wasif");
    }
</script>
