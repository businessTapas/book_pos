<div class="row">
    @csrf
    @if (isCentral())
        <div class="col-sm-4">
            <div class="form-group">
                <label for="to_store" class="required">From Store</label>
                <select id="to_store" name="to_store" required class="form-control  " data-live-search="true"
                    placeholder="Enter  Supplier ">
                    <option value="{{ $data->to_store }}">
                        {{ $data->store2->store_name }}
                    </option>
                </select>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="form-group">
                <label for="store_id" class="required">To Store</label>
                <select id="store_id" name="store_id" required class="form-control  " data-live-search="true"
                    placeholder="Enter  Supplier ">
                    <option value="{{ $data->store_id }}">
                        {{ $data->store->store_name }}
                    </option>
                </select>
            </div>
        </div>
    @endif
    @if (isPublisher())
        <div class="col-sm-4">
            <div class="form-group">
                <label for="store_id" class="required">From Store</label>
                <select id="store_id" required class="form-control  " data-live-search="true"
                    placeholder="Enter  Supplier ">
                    <option value="{{ $data->store_id }}">
                        {{ $data->store->store_name }}
                    </option>
                </select>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="supplier_id" class="required">Supplier</label>
                <select id="supplier_id" required class="form-control " data-live-search="true"
                    placeholder="Enter  Supplier " name="supplier_id">
                    <option value="{{ $data->supplier->id }}">
                        {{ $data->supplier->name }}
                    </option>
                </select>
            </div>
        </div>
    @endif
    @if (isPublisher())
        <input type="hidden" name="store_id" value="{{ $data->store_id }}">
        <input type="hidden" name="to_store" value="{{ $data->to_store }}">
        <input type="hidden" name="supplier_id" value="{{ $data->supplier_id }}">
    @endif

    <div class="col-sm-4">
        <div class="form-group">
            <label for="dispatch_no" class="required">Dispatch No</label>
            <input readonly id="dispatch_no" name="dispatch_no" required type="text" class="form-control" readonly
                value="DO{{ rand(111111111, 9999999999) }}" placeholder="Enter Purchase no">
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label for="dispatch_date" class="required">Dispatch Date</label>
            <input value="{{ date('Y-m-d') }}" id="dispatch_date" required value="{{ $data->requisition_date }}"
                type="date" class="form-control" readonly placeholder="Enter Purchase no" name="dispatch_date">
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label for="transport_charge" class="required">transport_charge</label>
            <input id="transport_charge" required type="number" value="{{ $data->transport_charge }}"
                class="form-control" placeholder="transport_charge" name="transport_charge">
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label for="expected_delivery_date" class="required">expected_delivery_date</label>
            <input id="expected_delivery_date" required value="{{ $data->expected_delivery_date }}" type="date"
                class="form-control" placeholder="Enter Purchase no" name="expected_delivery_date">
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
                    <th>Storage Site</th>
                    <th>Storage Location</th>
                    <th>Rack</th>
                    <th>Batch No</th>
                    <th>Qantity</th>
                    <th>Price </th>
                    {{-- <th>Purchase Price</th>
                    <th>Sale Price</th> --}}
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

                        $inventry_stock = \App\Models\MasterStockInventery::where('product_id', $p->product_id)
                            ->where('store_id', auth()->user()->store_id)
                            // ->where('qty', '>=', $p->request_qty)
                            ->first();
                        $inventry = \App\Models\MasterStockInventery::where('product_id', $p->product_id)
                            ->where('store_id', auth()->user()->store_id)
                            // ->where('qty', '>=', $p->request_qty)
                            ->sum('qty');
                    @endphp

                    @if (empty($inventry_stock))
                        <div class="alert alert-danger" role="alert">
                            You Don't have stock for dispatched please check you inventry
                        </div>
                    @break
                @endif
                @php
                    $storage_sites = \App\Models\StorageSite::where('deleted_at', null)
                        ->where('id', $inventry_stock->storage_site_id)
                        ->get();
                    $storage_locations = \App\Models\StorageLocation::where('deleted_at', null)
                        ->where('id', $inventry_stock->storage_location_id)
                        ->get();
                    $racks = \App\Models\Rack::where('deleted_at', null)
                        ->where('id', $inventry_stock->rack_id)
                        ->get();

                @endphp



                <tr id="row{{ $loop->index + 1 }}">
                    <td width="2%"><input readonly type="text" id="slno1"
                            value="{{ $loop->index + 1 }}" readonly class="form-control "
                            style="border:none;" /></td>
                    <td width="18%"><select name="products[]"placeholder="Search products.."
                            class="form-control form-control-sm  ">
                            <option value="{{ $p->product->id }}">
                                {{ $p->product->title }}</option>
                        </select>
                    </td>
                    <td width="18%"><select name="storage_site_id[]"placeholder="Search products.."
                            class="form-control form-control-sm  ">
                            <option disabled> -Search Storage Site-
                            </option>
                            @foreach ($storage_sites as $sites)
                                <option value="{{ $sites->id ?? '' }}">
                                    {{ $sites->name ?? '' }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td width="18%"><select name="storage_location_id[]"placeholder="Search products.."
                            class="form-control form-control-sm  ">
                            <option disabled> -Search Locations-
                            </option>
                            @foreach ($storage_locations as $location)
                                <option value="{{ $location->id ?? '' }}">
                                    {{ $location->name ?? '' }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td width="18%"><select name="rack_id[]"placeholder="Search products.."
                            class="form-control form-control-sm  ">
                            <option disabled> -Search Racks-
                            </option>
                            @foreach ($racks as $rack)
                                <option value="{{ $rack->id ?? '' }}">
                                    {{ $rack->name ?? '' }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td width="100px"><input type="text" name="batch_no[]"
                            value="{{ $inventry_stock->batch_no }}" placeholder="batch_no"
                            class="form-control-sm form-control" />
                    </td>

                    <td width="100px">
                        <small class="text-success">Availbal Qty -
                            {{ $inventry ?? 0 }}</small>
                        <input type="hidden" value="{{ $inventry ?? 0 }}" id="avail_qty{{ $p->id }}">
                        <input readonly type="number" name="request_qty[]" value="{{ $p->request_qty }}"
                            onkeyup="checkQty(this,'avail_qty{{ $p->id }}')" placeholder="Request Qty"
                            class="form-control-sm form-control" />
                        <small class="text-danger" id="error_avail_qty{{ $p->id }}"></small>
                    </td>
                    <td width="100px"><input readonly type="number" name="price[]"
                            value="{{ $p->price }}" placeholder="price"
                            class="form-control-sm form-control" /></td>
                    {{-- <td width="100px"><input readonly  type="number" name="purchase_price[]"
                                value="{{ $p->purchase_price }}" placeholder=""
                                class="form-control-sm form-control" />
                        </td>
                        <td width="100px"><input readonly  type="number" name="sale_price[]" value="{{ $p->sale_price }}"
                                placeholder="sale_price" class="form-control-sm form-control" />
                        </td> --}}


                    @if ($data->store->district->state == $data->store2->district->state)
                        <td><input readonly type="number" name="array_igst[]" value="{{ $p->igst }}"
                                placeholder="array_igst" class="form-control-sm form-control" />
                        </td>
                    @else
                        <td><input readonly onkeyup="cgstCal(this.value)" onclick="cgstCal(this.value)"
                                type="number" name="array_cgst[]" value="{{ $p->cgst }}"
                                placeholder="array_cgst" class="form-control-sm form-control cgst" />
                        </td>
                        <td><input readonly type="number" name="array_sgst[]" value="{{ $p->sgst }}"
                                placeholder="array_sgst" class="form-control-sm form-control" />
                        </td>
                    @endif
                    <td><input readonly type="number" name="array_tax_amount[]" value="{{ $p->tax_amount }}"
                            placeholder="tax_amount" class="form-control-sm form-control" />
                    </td>

                    <td><input readonly type="number" name="array_taxeble_amount[]"
                            value="{{ $p->taxeble_amount }}" placeholder="taxeble_amount"
                            class="form-control-sm form-control" />
                    </td>
                    <td><input readonly type="number" name="array_total_amount[]"
                            value="{{ $p->total_amount }}" placeholder="total_amount"
                            class="form-control-sm form-control" />
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
                <th></th>
                <th>Total</th>

                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                @if ($data->store->district->state == $data->store2->district->state)
                    <th><input readonly type="number" name="igst" value="{{ $data->igst }}"
                            placeholder="total_igst" class="form-control-sm form-control" /> </th>
                    </th>
                @else
                    <th><input readonly type="number" name="cgst" placeholder="total_cgst"
                            value="{{ $data->cgst }}" class="form-control-sm form-control" /> </th>
                    </th>

                    <th><input readonly type="number" name="sgst" value="{{ $data->sgst }}"
                            placeholder="total_sgst" class="form-control-sm form-control" /> </th>
                    </th>
                @endif
                <th><input readonly type="number" name="tax_amount" value="{{ $data->tax_amount }}"
                        placeholder="tax_amount" class="form-control-sm form-control" /> </th>
                </th>
                <th><input readonly type="number" name="taxeble_amount" value="{{ $data->taxeble_amount }}"
                        placeholder="taxeble_amount" class="form-control-sm form-control" /> </th>
                </th>
                <th><input readonly type="number" name="total_amount" value="{{ $data->total_amount }}"
                        placeholder="total_amount" class="form-control-sm form-control" /> </th>
                </th>
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

<style>
table input {
    width: 100px !important;
}

table select {
    width: 180px !important;
}
</style>

<script>
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
