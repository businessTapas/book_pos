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
                                        href="{{ route('transfer.index') }}"><i class="las la-plus mr-3"></i>Back to
                                        {{ $page }} List</a>
                                </div>
                                <!-- Modal body -->
                                <div class="card-body">
                                    <form id="form_data" action="{{ route('transfer.store') }}" method="POST">
                                        <div class="row">
                                            @csrf
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="product_id" class="required">Select Product</label>
                                                    <select id="product_id" required class="form-control " onchange="ajaxGetBatchNo(this)"
                                                        data-live-search="true" placeholder="Enter From Warehouse "
                                                        name="product_id">
                                                        <option value=""> Select Product  </option>
                                                        @foreach ($product_data as $productData)
                                                            <option value="{{ $productData->product->id }}">{{ $productData->product->title }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="batch_no" class="required">Select Batch No</label>
                                                    <select id="batch_no" required class="form-control " onchange="ajaxGetFromWarehouse(this)"
                                                        data-live-search="true" placeholder="Enter From Warehouse "
                                                        name="batch_no">
                                                        <option value=""> Select Batch No  </option>
                                                       
                                                    </select>
                                                </div>
                                            </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="transfer_from_id" class="required">From Warehouse</label>
                                                        <select id="transfer_from_id" required class="form-control "
                                                            data-live-search="true" placeholder="Enter From Warehouse "
                                                            name="transfer_from_id">
                                                            <option value=""> Select Warehouse  </option>
                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="supplier_id" class="required">To Warehouse</label>
                                                        <select onchange="get_storage_location(this.value)"
                                                        id="storage_site_id" name="storage_site_id" 
                                                        placeholder="Search Storage Site.." class="form-control form-control-sm  ">
                                                        <option value=""> -Search Storage Site-
                                                        </option>

                                                            @foreach ($storage_site as $storageSite)
                                                                <option value="{{ $storageSite->id }}">{{ $storageSite->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label class="required">Storage Location</label>
                                                        <select onchange="get_rack(this.value)"
                                                            id="storage_location_id" name="storage_location_id" 
                                                            placeholder="Search Storage Location.." class="form-control form-control-sm  ">
                                                            <option value=""> -Search Locations-
                                                            </option>
                                                           
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label class="required">Rack</label>
                                                        <select
                                                            name="rack_id" id="rack_id" 
                                                            placeholder="Search Rack.." class="form-control form-control-sm  ">
                                                            <option value=""> -Search Racks-
                                                            </option>
                                                           
                                                        </select>
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
                                                            {{-- <th>Products </th> --}}
                                                            <th>Qantity</th>
                                                            <th>Price</th>
                                                            {{-- <th>Tax Amount</th> --}}
                                                            <th>Taxeble Amount</th>
                                                            <th>Total Amount</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td width="2%"><input type="text" id="slno1"
                                                                    value="1" readonly class="form-control "
                                                                    style="border:none;" /></td>
                                                           {{--  <td width="18%"><select onchange="product(this.value,0)"
                                                                    name="products[]"placeholder="Search products.."
                                                                    class="form-control form-control-sm selectpicker "
                                                                    data-live-search="true">
                                                                    <option selected disabled> -Search Products-
                                                                    </option>
                                                                    @foreach ($products as $product)
                                                                        <option value="{{ $product->id }}">
                                                                            {{ $product->title }}</option>
                                                                    @endforeach
                                                                </select> </td> --}}

                                                            <td><input type="number" name="request_qty"
                                                                min="1" onkeyup="qtyCal(this.value)"
                                                                    onclick="qtyCal(this.value)" placeholder="Request Qty"
                                                                    class="form-control-sm form-control request_qty" /></td>


                                                            <td><input type="number" name="price" placeholder=""
                                                                readonly placeholder="price" onkeyup="calculation()"
                                                                    onclick="calculation()"
                                                                    class="form-control-sm form-control price" />
                                                            </td>


                                                            {{-- <td><input type="number" name="array_tax_amount[]"
                                                                    onkeyup="calculation()" onclick="calculation()"
                                                                    placeholder="tax_amount"
                                                                    class="form-control-sm form-control array_tax_amount " />
                                                            </td> --}}


                                                            <td><input type="number" name="array_taxeble_amount"
                                                                    onkeyup="calculation()" onclick="calculation()"
                                                                    readonly placeholder="taxeble_amount"
                                                                    class="form-control-sm form-control array_taxeble_amount" />
                                                            </td>
                                                            <td><input type="number" name="array_total_amount"
                                                                    onkeyup="calculation()" onclick="calculation()" required
                                                                    readonly placeholder="total_amount"
                                                                    class="form-control-sm form-control array_total_amount" />
                                                            </td>


                                                            {{-- <td><button type="button" name="add" id="add"
                                                                    class="btn btn-success btn-sm"><i class="fa fa-plus"
                                                                        aria-hidden="true"></i>
                                                                </button>
                                                            </td> --}}

                                                        </tr>
                                                    </tbody>

                                                    <tfoot>

                                                        <tr>
                                                            <th data-field="S.NO" data-sortable="true" rowspan="2">
                                                                S.NO
                                                            </th>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>

                                                            
                                                            <th><input type="number" name="taxeble_amount"
                                                                    id="taxeble_amount" placeholder="taxeble_amount"
                                                                    class="form-control-sm form-control" /> </th>
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
                                                <button onclick="ajaxCall('form_data')" type="button"
                                                    class="btn btn-primary mt-2">Add
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


       /*  $('#add').click(function() {
            i++;
            j = i - 1;
            $('#dynamic_field').append('<tr id="row' + i +
                '" class="dynamic-added" ><td><input type="text" id="slno' + i + '" value="' + i +
                '"readonly class="form-control-sm form-control" style="border:none;" /></td>' +
                '<td><select onchange="product(this.value,' + j +
                ')"  name="products[]"placeholder="Search products.." class="form-control form-control-sm  " data-live-search="true">  <option selected disabled> -Search Products-   </option> @foreach ($product_data as $product) <option value="{{ $product->id }}">  {{ $product->title }}</option>   @endforeach </select></td>' +
                '<td><input   onkeyup="qtyCal(this.value)" onclick="qtyCal(this.value)"   type="number" name="request_qty[]" placeholder="Request Qty" class="form-control-sm form-control request_qty" onkeyup="calculation()" onclick="calculation()" /></td>' +
                '<td><input type="number"  name="price[]" placeholder="price"  class="form-control-sm form-control price" onkeyup="calculation()" onclick="calculation()" /> </td>' +
                // '<td><input type="number" name="array_tax_amount[]" placeholder="tax_amount"  class="form-control-sm form-control array_tax_amount " onkeyup="calculation()" onclick="calculation()" /> </td>' +
                ' <td><input type="number" name="array_taxeble_amount[]"placeholder="taxeble_amount" class="form-control-sm form-control array_taxeble_amount " onkeyup="calculation()" onclick="calculation()" /></td>' +
                ' <td><input type="number" name="array_total_amount[]"placeholder="total_amount" class="form-control-sm form-control array_total_amount " onkeyup="calculation()" onclick="calculation()" /> </td>' +
                '<td><button type="button" name="remove" id="' + i +
                '" class="btn btn-danger btn-sm btn_remove">X</button></td></tr>');
        });

        $(document).on('click', '.btn_remove', function() {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
        }); */


    });

    function ajaxGetBatchNo(selectObject) {
        var product_id = selectObject.value; 
        alert(product_id);
        var csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;
                                              
                                                $.ajax({
                                                    url: "{{ route('transfer.getWarehouse') }}",
                                                    type: 'POST',
                                                    dataType: 'json',
                                                    data: {
                                                        _token: csrfToken,
                                                        productId: product_id

                                                    },
                                                    success: function(result) {
                                                       $.each(result.data, function(key, value) {
                                                        $('#batch_no').empty();
                                                        //console.log(value);
                                                        $('#batch_no').append('<option value="">Select Batch No</option><option value="' + value.batch_no + '">' + value.batch_no + '</option>');

                                                       });
                                                       
                                                      // window.location.reload();
                                                    }
                                                });
     }

    function ajaxGetFromWarehouse(selectObject) {
        var batch_no = selectObject.value; 
        var product_id = $('#product_id').val(); 
        if(product_id != '') {
        var csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;
                                              
                                                $.ajax({
                                                    url: "{{ route('transfer.getWarehouse') }}",
                                                    type: 'POST',
                                                    dataType: 'json',
                                                    data: {
                                                        _token: csrfToken,
                                                        productId: product_id,
                                                        batch_no: batch_no

                                                    },
                                                    success: function(result) {
                                                       $.each(result.data, function(key, value) {
                                                        $('#transfer_from_id').empty();
                                                        //console.log(value);
                                                        $('#transfer_from_id').append('<option value="' + value.storage_site.id + '">' + value.storage_site.name + '</option>');

                                                       });
                                                       $('.price').val(result.data[0].purchase_price);
                                                       $('.request_qty').val(result.data[0].qty);
                                                       qtyCal();
                                                      // window.location.reload();
                                                    }
                                                });
            } else {
                alert('Select Product first');
            }
     }

     function get_storage_location(site_id) {
        var form = document.getElementById('form_data');
            var method = "POST";
            var formdata = new FormData(form);
            var formElements_button = Array.from(form.elements).pop();
            preloader(formElements_button);
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);

                    $('#storage_location_id').empty();
                    data = JSON.parse(this.responseText);
                    // Populate the Book dropdown with new options
                    var loc_str ='<option value=""> -Search Location- </option>';
                    if(data.length > 0) {
                    $.each(data, function(key, value) {
                        console.log(value);
                        loc_str +='<option value="' + value.id + '">' + value.name + '</option>';
                    });
                    $('#storage_location_id').append(loc_str);

                    // Refresh the selectpicker to reflect the changes

                 } else {
                    alert("No location available");
                 }
                 stopPreloader(formElements_button);
                }
                method;
            };
            xhttp.open(method, '{{ route('storagelocations.by.siteid') }}', true);
            xhttp.send(formdata);
    }

    function get_rack(loc_id) {
        var form = document.getElementById('form_data');
            var method = "POST";
            var formdata = new FormData(form);
            var formElements_button = Array.from(form.elements).pop();
            preloader(formElements_button);
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);

                    $('#rack_id').empty();
                    data = JSON.parse(this.responseText);
                    // Populate the Book dropdown with new options
                    if(data.length > 0) {
                    $.each(data, function(key, value) {
                        console.log(value);
                        $('#rack_id').append('<option value="' + value.id + '">' + value.name + '</option>');
                    });

                    // Refresh the selectpicker to reflect the changes

                 } else {
                    alert("No rack available");
                 }
                 stopPreloader(formElements_button);
                }
                method;
            };
            xhttp.open(method, '{{ route('rack.by.locationid') }}', true);
            xhttp.send(formdata);
    }

    function qtyCal() {
        const request_qty = document.getElementsByClassName('request_qty');
        const price = document.getElementsByClassName('price');
        var array_taxeble_amount = document.getElementsByClassName('array_taxeble_amount');
        var array_total_amount = document.getElementsByClassName('array_total_amount');
        console.log("Wasif")
        for (i = 0; i < request_qty.length; i++) {
            array_taxeble_amount[i].value = Number(request_qty[i].value) * Number(price[i].value).toFixed(2);
            array_total_amount[i].value = Number(request_qty[i].value) * Number(price[i].value).toFixed(2);
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
