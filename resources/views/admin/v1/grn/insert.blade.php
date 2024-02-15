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
                                        href="{{ route('grn.index') }}"><i class="las la-plus mr-3"></i>Back to
                                        {{ $page }} List</a>
                                </div>

                                <!-- Modal body -->
                                <div class="card-body">
                                    <form id="form_data" action="{{ route('grn.store') }}" method="POST">
                                        <div class="row">
                                            @csrf
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="dispatch_no" class="required">Dispatch order No</label>
                                                    <select id="dispatch_no" required type="text"
                                                        class="form-control selectpicker"
                                                        onchange="editForm('{{ route('grn.dispatch.get') }}/'+document.getElementById('dispatch_no').value, 'data')"
                                                        placeholder="Enter Approved Purchase number" name="dispatch_no">
                                                        <option selected disabled> -Select Dispatch order- </option>

                                                        @foreach ($dispatches as $order)
                                                            @php
                                                                $dispatch_check = \App\Models\Grn::where('dispatch_no', $order->dispatch_no)->first();
                                                            @endphp
                                                            @empty($dispatch_check)
                                                                <option value="{{ $order->dispatch_no }}">{{ $order->dispatch_no }}</option>
                                                            @endempty
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <span id="data">

                                            </span>
                                        </div>
                                        <!-- /.card-body -->
                                    </form>
                                </div>
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
            $('#dynamic_field').append('<tr id="row' + i +
                '" class="dynamic-added" ><td><input type="text" id="slno' + i + '" value="' + i +
                '"readonly class="form-control-sm form-control" style="border:none;" /></td>' +
                '<td><select  name="products[]"placeholder="Search products.." class="form-control form-control-sm  " data-live-search="true">  <option selected disabled> -Search Products-   </option> @foreach ($products as $product) <option value="{{ $product->id }}">  {{ $product->title }}</option>   @endforeach </select></td>' +
                '<td><input type="text" name="request_qty[]" placeholder="Request Qty" class="form-control-sm form-control" /></td>' +
                '<td><input type="text" name="mrp_price[]" placeholder="mrp_price" class="form-control-sm form-control" /></td>' +
                '<td><input type="text" name="purchase_price[]" placeholder="" class="form-control-sm form-control" /> </td>' +
                '<td><input type="text" name="sale_price[]" placeholder="sale_price"  class="form-control-sm form-control" /> </td>' +
                '<td><input type="text" name="batch_no[]" placeholder="batch_no" class="form-control-sm form-control" />  </td>' +
                '<td width="5%"><select name="gst[]" placeholder="gst" class="form-control-sm form-control"> <option value="5">@5%</option> <option value="12">@12%</option> <option value="18">@18%</option>  <option value="28">@28%</option>   </select>  </td>' +
                '<td><input type="text" name="array_cgst[]" placeholder="array_cgst" class="form-control-sm form-control" /></td>' +
                '<td><input type="text" name="array_igst[]" placeholder="array_igst" class="form-control-sm form-control" />  </td>' +
                '<td><input type="text" name="array_sgst[]" placeholder="array_sgst" class="form-control-sm form-control" /> </td>' +
                '<td><input type="text" name="array_tax_amount[]" placeholder="tax_amount"  class="form-control-sm form-control" /> </td>' +
                ' <td><input type="text" name="array_taxeble_amount[]"placeholder="taxeble_amount" class="form-control-sm form-control" /></td>' +
                ' <td><input type="text" name="array_total_amount[]"placeholder="total_amount" class="form-control-sm form-control" /> </td>' +
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
        const array_taxeble_amount = document.getElementsByClassName('array_taxeble_amount');
        const array_total_amount = document.getElementsByClassName('array_total_amount');
        const array_cgst = document.getElementsByClassName('array_cgst');
        const array_sgst = document.getElementsByClassName('array_sgst');
        const array_igst = document.getElementsByClassName('array_igst');
        const array_tax_amount = document.getElementsByClassName('array_tax_amount');


        for (i = 0; i < request_qty.length; i++) {
            var total_tax = Number(array_cgst[i].value) + Number(array_sgst[i].value) + Number(array_igst[i].value);
            array_taxeble_amount[i].value = Number(request_qty[i].value) * Number(price[i].value) + total_tax;
            array_total_amount[i].value = Number(request_qty[i].value) * Number(price[i].value) + total_tax;
            array_tax_amount[i].value = total_tax;
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
            total_cgst = total_cgst + Number(array_cgst[i].value);
            total_igst = total_igst + Number(array_igst[i].value);
            total_sgst = total_sgst + Number(array_sgst[i].value);
        }

        tax_amount.value = total_tax_amount;
        taxeble_amount.value = total_taxeble_amount;
        total_amount.value = total_total_amount;
        cgst.value = total_cgst;
        igst.value = total_sgst;
        sgst.value = total_igst;

    }
    // after load the document envent will be fire
    document.addEventListener("DOMContentLoaded", () => {
        qtyCal();
    });
    // fetch data behalf of price

</script>

<!-- // model -->
