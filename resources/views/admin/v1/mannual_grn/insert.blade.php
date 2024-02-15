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
                                    <a class="btn btn-primary add-list btn-sm text-white"
                                        href="{{ route('mannual-grn.index') }}"><i class="las la-plus mr-3"></i>Back to
                                        mannual-grn List</a>
                                </div>
                                <!-- Modal body -->
                                <div class="card-body">
                                    <form id="form_data" action="{{ route('mannual-grn.store') }}" method="POST">
                                        <div class="row">
                                            @csrf
                                            @if (isRetail())
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="to_store" class="required">Choose Store</label>
                                                        <select id="to_store" required class="form-control selectpicker "
                                                            data-live-search="true" placeholder="Enter  Supplier "
                                                            name="to_store">
                                                            <option selected disabled> - Select Store - </option>
                                                            @foreach ($stores as $store)
                                                                <option value="{{ $store->id }}">{{ $store->store_name }}
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
                                                                <option value="{{ $supplier->id }}">{{ $supplier->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            @endif
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="grn_no" class="required">grn_no</label>
                                                    <input id="grn_no" required type="text" class="form-control"
                                                        readonly value="{{ 'GRN' . rand(1000000000, 9999999999) }}"
                                                        placeholder="Enter Purchase no" name="grn_no">
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
                                                            <th>Storage Site</th>
                                                            <th>Storage Location</th>
                                                            <th>Rack</th>
                                                            <th>Batch No</th>
                                                            <th>Qantity</th>
                                                            <th>Price</th>
                                                            <th>Sale_Price</th>
                                                            {{-- <th>Tax Amount</th> --}}
                                                            <th>Total Amount</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                            $storage_sites = \App\Models\StorageSite::where('deleted_at', null)
                                                                ->where('store_id', loginStore()->id)
                                                                ->get();
                                                            // $storage_locations = \App\Models\StorageLocation::where('deleted_at', null)->get();
                                                            // $racks = \App\Models\Rack::where('deleted_at', null)->get();

                                                        @endphp
                                                        <tr>
                                                            <td width=""><input type="text" id="slno1"
                                                                    value="1" readonly class="form-control "
                                                                    style="border:none;" /></td>
                                                            <td width=""><select onchange="product(this.value,0)"
                                                                    name="products[]"placeholder="Search products.."
                                                                    class="form-control form-control-sm selectpicker "
                                                                    data-live-search="true">
                                                                    <option selected disabled> -Search Products-
                                                                    </option>
                                                                    @foreach ($products as $product)
                                                                        <option value="{{ $product->id }}">
                                                                            {{ $product->title }}</option>
                                                                    @endforeach
                                                                </select> </td>



                                                            <td width=""><select id="storage_site_id0"
                                                                    name="storage_site_id[]"placeholder="Search products.."
                                                                    class="form-control form-control-sm  " onchange=" get_storage_location(this.value,0)">
                                                                    <option > -Search Storage Site-
                                                                    </option>
                                                                    @foreach ($storage_sites as $sites)
                                                                        <option value="{{ $sites->id ?? '' }}">
                                                                            {{ $sites->name ?? '' }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                            <td width=""><select id="storage_location_id0"
                                                                    name="storage_location_id[]"placeholder="Search products.."
                                                                    class="form-control form-control-sm  " onchange="get_rack(this.value,0)">
                                                                    <option disabled> -Search Locations-
                                                                    </option>
                                                                    {{-- @foreach ($storage_locations as $location)
                                                                        <option value="{{ $location->id ?? '' }}">
                                                                            {{ $location->name ?? '' }}</option>
                                                                    @endforeach --}}
                                                                </select>
                                                            </td>
                                                            <td width=""><select id="rack_id0"
                                                                    name="rack_id[]"placeholder="Search products.."
                                                                    class="form-control form-control-sm  ">
                                                                    <option> -Search Racks-
                                                                    </option>
                                                                    {{-- @foreach ($racks as $rack)
                                                                        <option value="{{ $rack->id ?? '' }}">
                                                                            {{ $rack->name ?? '' }}</option>
                                                                    @endforeach --}}
                                                                </select>
                                                            </td>
                                                            <td width=""><input type="text" name="batch_no[]"
                                                                    value="" placeholder="batch_no"
                                                                    class="form-control-sm form-control" />
                                                            </td>
                                                            <td><input type="number" name="request_qty[]"
                                                                    onkeyup="qtyCal()" onclick="qtyCal()"
                                                                    placeholder="Request Qty"
                                                                    class="form-control-sm form-control request_qty" />
                                                            </td>
                                                            <td><input type="number" name="price[]" placeholder=""
                                                                    placeholder="price" 
                                                                    onkeyup="calculation()" onclick="calculation()"
                                                                    class="form-control-sm form-control price" />
                                                            </td>
                                                            <td><input type="number" name="sale_price[]" 
                                                                placeholder="sale_price" onkeyup="qtyCal()"
                                                                onclick="qtyCal()"
                                                                class="form-control-sm form-control sale_price" />
                                                        </td>
                                                            {{-- <td><input type="number" name="array_taxeble_amount[]"
                                                                    onkeyup="calculation()" onclick="calculation()"
                                                                    placeholder="taxeble_amount"
                                                                    class="form-control-sm form-control array_taxeble_amount" /> --}}
                                                            </td>
                                                            <td><input type="number" name="array_total_amount[]"
                                                                    onkeyup="calculation()" onclick="calculation()"
                                                                    required placeholder="total_amount"
                                                                    class="form-control-sm form-control array_total_amount" />
                                                            </td>


                                                            <td><button type="button" name="add" id="add"
                                                                    class="btn btn-success btn-sm"><i class="fa fa-plus"
                                                                        aria-hidden="true"></i>
                                                                </button>
                                                            </td>

                                                        </tr>
                                                    </tbody>

                                                    <tfoot>

                                                        <tr>
                                                            <th data-field="S.NO" data-sortable="true" rowspan="2">
                                                                
                                                            </th>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>

                                                            {{-- <th><input type="number" name="tax_amount" id="tax_amount"
                                                                    placeholder="total tax"
                                                                    class="form-control-sm form-control" /> </th>
                                                            </th> --}}
                                                            {{-- <th><input type="number" name="taxeble_amount"
                                                                    id="taxeble_amount" placeholder="taxeble_amount"
                                                                    class="form-control-sm form-control" /> </th> --}}
                                                            </th>
                                                            <th><input type="number" name="total_amount"
                                                                    id="total_amount" placeholder="total_amount"
                                                                    class="form-control-sm form-control" /> </th>
                                                            </th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                            <!-- /.card-body -->
                                            <div class="col-sm-12 mt-3 text-center">
                                                <button onclick="ajaxCall('form_data','{{route('mannual-grn.index')}}')" type="button"
                                                    class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i class="uil uil-check me-2"></i>Add
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
        var i = 1;


        $('#add').click(function() {


            i++;
            j = i - 1;
            $('#dynamic_field').append('<tr id="row' + i +
                '" class="dynamic-added" ><td><input type="text" id="slno' + i + '" value="' + i +
                '"readonly class="form-control-sm form-control" style="border:none;" /></td>' +
                '<td><select onchange="product(this.value,' + j +
                ')"  name="products[]"placeholder="Search products.." class="form-control form-control-sm  " data-live-search="true">  <option selected disabled> -Search Products-   </option> @foreach ($products as $product) <option value="{{ $product->id }}">  {{ $product->title }}</option>   @endforeach </select></td>' +
                '<td width="10%"><select id="storage_site_id' + i + '" name="storage_site_id[]"placeholder="Search products.."class="form-control form-control-sm  " onchange=" get_storage_location(this.value,' + i +')">' +
                '<option> -Search Storage Site- </option> @foreach ($storage_sites as $sites) <option value="{{ $sites->id ?? '' }}">   {{ $sites->name ?? '' }}</option>' +
                '@endforeach </select> </td>' +
                '<td width="10%"><select id="storage_location_id' + i + '" name="storage_location_id[]"placeholder="Search products.." class="form-control form-control-sm  " onchange="get_rack(this.value,' + i +')"> <option disabled> -Search Locations-' +
                '</option> </select>' +
                '</td>' +
                '<td width="10%"><select id="rack_id' + i + '" name="rack_id[]"placeholder="Search products.."  class="form-control form-control-sm  ">' +
                '<option disabled> -Search Racks- </option> </select>' +
                '</td>' +
                '<td width="100px"><input type="text" name="batch_no[]" value="" placeholder="batch_no" class="form-control-sm form-control" />' +
                '</td>' +
                '<td><input   onkeyup="qtyCal(this.value)" onclick="qtyCal(this.value)"   type="number" name="request_qty[]" placeholder="Request Qty" class="form-control-sm form-control request_qty" onkeyup="calculation()" onclick="calculation()" /></td>' +
                '<td><input type="number"  name="price[]" placeholder="price"  class="form-control-sm form-control price" onkeyup="calculation()" onclick="calculation()" /> </td>' +
                '<td><input type="number" name="sale_price[]" placeholder="sale_price" onkeyup="qtyCal()" onclick="qtyCal()" class="form-control-sm form-control sale_price" /></td>'+
                // '<td><input type="number" name="array_tax_amount[]" placeholder="tax_amount"  class="form-control-sm form-control array_tax_amount " onkeyup="calculation()" onclick="calculation()" /> </td>' +
                // ' <td><input type="number" name="array_taxeble_amount[]"placeholder="taxeble_amount" class="form-control-sm form-control array_taxeble_amount " onkeyup="calculation()" onclick="calculation()" /></td>' +
                ' <td><input type="number" name="array_total_amount[]" placeholder="total_amount" class="form-control-sm form-control array_total_amount " onkeyup="calculation()" onclick="calculation()" /> </td>' +
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
        const price = document.getElementsByClassName('sale_price');
        // var array_taxeble_amount = document.getElementsByClassName('array_taxeble_amount');
        var array_total_amount = document.getElementsByClassName('array_total_amount');
        for (i = 0; i < array_total_amount.length; i++) {
            // array_taxeble_amount[i].value = Number(request_qty[i].value) * Number(price[i].value).toFixed(2);
            array_total_amount[i].value = Number(request_qty[i].value) * Number(price[i].value).toFixed(2);
            console.log(array_total_amount[i]);
        }

        calculation();
    }



    function calculation() {
        // const array_tax_amount = document.getElementsByClassName('array_tax_amount');
        // const array_taxeble_amount = document.getElementsByClassName('array_taxeble_amount');
        const array_total_amount = document.getElementsByClassName('array_total_amount');

        // for seting the value into the total amount
        // const tax_amount = document.getElementById('tax_amount');
        const taxeble_amount = document.getElementById('taxeble_amount');
        const total_amount = document.getElementById('total_amount');
        // updating the amount
        // var total_tax_amount = 0;
        var total_taxeble_amount = 0;
        var total_total_amount = 0;

        for (i = 0; i < array_total_amount.length; i++) {
            // total_tax_amount = total_tax_amount + Number(array_tax_amount[i].value);
            // total_taxeble_amount = total_taxeble_amount + Number(array_taxeble_amount[i].value);
            total_total_amount = total_total_amount + Number(array_total_amount[i].value);
        }

        // tax_amount.value = total_tax_amount;
        // taxeble_amount.value = total_taxeble_amount;
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

    function get_storage_location(site_id, position) {
        alert(site_id+'======'+position);
        var form = document.getElementById('form_data');
            var method = "POST";
            var formdata = new FormData(form);
            var formElements_button = Array.from(form.elements).pop();
            //preloader(formElements_button);
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);

                    $('#storage_location_id' + position).empty();
                    data = JSON.parse(this.responseText);
                    // Populate the Book dropdown with new options
                    var loc_str ='<option value=""> -Search Location- </option>';
                    if(data.length > 0) {
                    $.each(data, function(key, value) {
                        console.log(value);
                        loc_str +='<option value="' + value.id + '">' + value.name + '</option>';
                    });
                    $('#storage_location_id' + position).append(loc_str);

                    // Refresh the selectpicker to reflect the changes

                 } else {
                    alert("No location available");
                 }
                 //stopPreloader(formElements_button);
                }
                method;
            };
            xhttp.open(method, "{{ route('storagelocations.by.siteid') }}/" + site_id, true);
            xhttp.send(formdata);
    }

    function get_rack(loc_id,position) {
        var form = document.getElementById('form_data');
            var method = "POST";
            var formdata = new FormData(form);
            var formElements_button = Array.from(form.elements).pop();
            //preloader(formElements_button);
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);

                    $('#rack_id' + position).empty();
                    data = JSON.parse(this.responseText);
                    // Populate the Book dropdown with new options
                    if(data.length > 0) {
                    $.each(data, function(key, value) {
                        console.log(value);
                        $('#rack_id' + position).append('<option value="' + value.id + '">' + value.name + '</option>');
                    });

                    // Refresh the selectpicker to reflect the changes

                 } else {
                    alert("No rack available");
                 }
                 //stopPreloader(formElements_button);
                }
                method;
            };
            xhttp.open(method, "{{ route('rack.by.locationid') }}/" + loc_id, true);
            xhttp.send(formdata);
    }
</script>

<!-- // model -->
