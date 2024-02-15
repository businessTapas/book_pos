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
                                        href="{{ route('dispatch.index') }}"><i class="las la-plus mr-3"></i>Back to
                                        {{ $page }} List</a>
                                </div>

                                <!-- Modal body -->
                                <div class="card-body">
                                    <form id="form_data" action="{{ route('dispatch.store') }}" method="POST">
                                        <div class="row">
                                            @csrf
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="po_no" class="required">Purchase order No</label>
                                                    <select id="po_no" required type="text"
                                                        class="form-control selectpicker"
                                                        onclick="editForm('{{ route('dispatch.purchase.get') }}/'+document.getElementById('po_no').value, 'data')"
                                                        onchange="editForm('{{ route('dispatch.purchase.get') }}/'+document.getElementById('po_no').value, 'data')"
                                                        placeholder="Enter Approved Purchase number" name="po_no">
                                                        <option selected disabled> -Select Purchase order- </option>

                                                        @foreach ($purchases as $order)
                                                            @php
                                                                $dispatch_check = \App\Models\Dispatch::where('po_no', $order->po_no)->first();
                                                            @endphp
                                                            @empty($dispatch_check)
                                                                <option value="{{ $order->po_no }}">{{ $order->po_no }}</option>
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
</script>

<!-- // model -->
