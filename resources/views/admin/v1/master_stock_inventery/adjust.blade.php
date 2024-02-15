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
                                        <h4 class="card-title">{{ $page }} Adjust</h4>
                                    </div>
                                    <a class="btn btn-primary add-list btn-sm text-white"
                                        href="{{ route('master-stock-inventery.index') }}"><i class="las la-plus mr-3"></i>Back to
                                        {{ $page }} List</a>
                                </div>
                                <!-- Modal body -->
                                <div class="card-body">
                                    <form id="form_data" action="{{ route('adjust.stock.store') }}" method="POST">
                                        <div class="row">
                                            @csrf
                                            <input type="hidden" id="master_stock_inventeries_id" name="master_stock_inventeries_id"
                                            value="{{ $product_data[0]->id }}" >
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="product_id" class="required"> Product</label>
                                                    <input type="text" id="product_id" required class="form-control " 
                                                    readonly  name="product_id" value="{{ $product_data[0]->product->title }}">                                                       
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="batch_no" class="required">Select Batch No</label>
                                                    <input type="text" id="batch_no" required class="form-control " 
                                                    readonly   name="batch_no" value="{{ $product_data[0]->batch_no }}">
                                                </div>
                                            </div>
                                                
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="supplier_id" class="required">Warehouse</label>
                                                        <input type="text" id="product_id"  class="form-control " 
                                                        readonly name="storage_site_id"
                                                         value="{{ $product_data[0]->storage_site->name }}">
                                                    </div>
                                                </div>

                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label class="required">Storage Location</label>
                                                        <input type="text" readonly class="form-control " 
                                                            id="storage_location_id" name="storage_location_id" 
                                                            value="{{ $product_data[0]->storage_location->name }}" >
                                                           
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label class="required">Rack</label>
                                                        <input type="text" readonly class="form-control " 
                                                            id="rack_id" name="rack_id" 
                                                            value="{{ $product_data[0]->rack->name }}" >
                                                           
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label class="required">Description</label>
                                                        <textarea id="description" name="description" class="form-control "  >
                                                        </textarea>
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
                                                            <th>Avl Qantity</th>
                                                            <th>Adjust Qantity</th>
                                                            <th>Price</th>
                                                            <th>Adjust Price</th>
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
                                                           

                                                            <td><input type="number" name="qty"
                                                                value="{{ $product_data[0]->qty }}"
                                                                   readonly  placeholder="Available Qty"
                                                                    class="form-control-sm form-control " /></td>

                                                            <td><input type="number" name="request_qty"
                                                                value="0"
                                                                 onkeyup="qtyCal(this.value)"
                                                                    onclick="qtyCal(this.value)" placeholder="Request Qty"
                                                                    class="form-control-sm form-control request_qty" /></td>

                                                                <td><input type="number" name="price" placeholder=""
                                                                    value="{{ $product_data[0]->sale_price }}"
                                                                        placeholder="price" readonly
                                                                        class="form-control-sm form-control " />
                                                                </td>        

                                                            <td><input type="number" name="sale_price" placeholder=""
                                                                value="{{ $product_data[0]->sale_price }}"
                                                                 placeholder="price" onkeyup="qtyCal()"
                                                                    onclick="qtyCal()"
                                                                    class="form-control-sm form-control price" />
                                                            </td>

                                                         

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
                                                    class="btn btn-primary mt-2">Adjust
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
        qtyCal();

    });

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
