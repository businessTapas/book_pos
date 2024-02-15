<div class="row">
    @csrf

    @if (isRetail())
        <div class="col-sm-4">
            <div class="form-group">
                <label for="to_store" class="required"> Store Name</label>
                <select id="to_store" required class="form-control " data-live-search="true" placeholder="Enter  Supplier "
                    name="to_store">
                    <option value="{{ $data->store->id }}">{{ $data->store->store_name }}
                    </option>
                </select>
            </div>
        </div>
    @endif
    @if (isCentral())
        <div class="col-sm-4">
            <div class="form-group">
                <label for="supplier_id" class="required">Supplier Name</label>
                <select id="supplier_id" required class="form-control" placeholder="Enter  Supplier "
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
            <label for="dispatch_no" class="required">Dispatch No</label>
            <input readonly id="dispatch_no" name="dispatch_no" required type="text" class="form-control" readonly
                value="{{ $data->dispatch_no }}" placeholder="Enter Purchase no">
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label for="grn_no" class="required">GRN No</label>
            <input readonly id="grn_no" name="grn_no" required type="text" class="form-control" readonly
                value="GRN{{ rand(1000000000, 9999999999) }}" placeholder="Enter Purchase no">
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label for="po_no" class="required">Purchase order No</label>
            <input readonly id="po_no" name="po_no" required type="text" class="form-control" readonly
                value="{{ $data->po_no }}" placeholder="Enter Purchase no">
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label for="dispatch_date" class="required">Dispatch Date</label>
            <input id="dispatch_date" required value="{{ $data->dispatch_date }}" type="date" class="form-control"
                readonly placeholder="Enter Purchase no" name="dispatch_date">
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
                readonly class="form-control" placeholder="Enter Purchase no" name="expected_delivery_date">
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label for="recieved_date" class="required">Received Date</label>
            <input id="recieved_date" required value="{{ date('Y-m-d') }}" type="date" class="form-control"
                placeholder="Enter Purchase no" name="recieved_date">
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
                    <th>Purchase Price</th>
                    <th>Sale Price</th>
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

                @php
                    $storage_sites = \App\Models\StorageSite::where('deleted_at', null)->get();
                    $storage_locations = \App\Models\StorageLocation::where('deleted_at', null)->get();
                    $racks = \App\Models\Rack::where('deleted_at', null)->get();

                @endphp

                @foreach ($data->details as $p)
                    @php

                        $inventry_stock = \App\Models\MasterStockInventery::where('product_id', $p->product_id)
                            ->where('store_id', auth()->user()->store_id)
                            // ->where('qty', '>=', $p->request_qty)
                            ->first();
                    @endphp

                    @if (empty($inventry_stock))
                        <div class="alert alert-danger" role="alert">
                            You Don't have stock for dispatched please check you inventry
                        </div>
                    @break
                @endif




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
                                <option {{ $sites->id == $inventry_stock->site_id ? 'selected' : '' }}
                                    value="{{ $sites->id ?? '' }}">
                                    {{ $sites->name ?? '' }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td width="18%"><select name="storage_location_id[]"placeholder="Search products.."
                            class="form-control form-control-sm  ">
                            <option disabled> -Search Locations-
                            </option>
                            @foreach ($storage_locations as $location)
                                <option
                                    {{ $location->id == $inventry_stock->storage_location_id ? 'selected' : '' }}
                                    value="{{ $location->id ?? '' }}">
                                    {{ $location->name ?? '' }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td width="18%"><select name="rack_id[]"placeholder="Search products.."
                            class="form-control form-control-sm  ">
                            <option disabled> -Search Racks-
                            </option>
                            @foreach ($racks as $rack)
                                <option {{ $rack->id == $rack->rack_id ? 'selected' : '' }}
                                    value="{{ $rack->id ?? '' }}">
                                    {{ $rack->name ?? '' }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td width="100px"><input type="text" name="batch_no[]"
                            value="{{ $inventry_stock->batch_no }}" placeholder="batch_no"
                            class="form-control-sm form-control" />
                    </td>
                    <td width="100px"><input type="number" name="request_qty[]" value="{{ $p->request_qty }}"
                            placeholder="Request Qty" class="form-control-sm form-control" /></td>
                    <td width="100px"><input readonly type="number" name="price[]"
                            value="{{ $p->price }}" placeholder="price"
                            class="form-control-sm form-control" /></td>
                    {{-- <td width="100px"><input type="number" required name="purchase_price[]"
                            value="{{ $p->purchase_price }}" placeholder=""
                            class="form-control-sm form-control" />
                    </td>
                    <td width="100px"><input required type="number" name="sale_price[]"
                            value="{{ $p->sale_price }}" placeholder="sale_price"
                            class="form-control-sm form-control" />
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
                <th></th>
                <th></th>
                {{-- <th><input readonly type="number" id="purchase_price" name="purchase_price" placeholder="total_purchase_price"
                        value="{{ $data->purchase_price }}" class="form-control-sm form-control" /> </th>
                <th><input readonly type="number" id="sale_price" name="sale_price" placeholder="total_sale_price"
                        value="{{ $data->sale_price }}" class="form-control-sm form-control" /> </th> --}}
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
                <th><input type="number" name="tax_amount" id="tax_amount" value="{{ $data->tax_amount }}"
                        placeholder="tax_amount" class="form-control-sm form-control" /> </th>
                </th>
                <th><input type="number" name="taxeble_amount" id="taxeble_amount"
                        value="{{ $data->taxeble_amount }}" placeholder="taxeble_amount"
                        class="form-control-sm form-control" /> </th>
                </th>
                <th><input type="number" name="total_amount" id="total_amount"
                        value="{{ $data->total_amount }}" placeholder="total_amount"
                        class="form-control-sm form-control" /> </th>
                </th>
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
