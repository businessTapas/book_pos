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
                                        <h4 class="card-title">Adjust List</h4>
                                    </div>


                                    <a class="btn btn-primary add-list btn-sm text-white"
                                    href="{{ route('master-stock-inventery.index') }}"><i class="las la-plus mr-3"></i>Back to
                                    {{ $page }}</a>
                                </div>


                                <div class="card-body">
                                    <div class="table-responsive-lg">
                                        <table class=" datatable table   table-striped table-bordered " id="datatable">
                                            <thead>
                                                <tr class="ligth">
                                                    <th>S.No</th>
                                                    <th>Date</th>
                                                    <th>Book</th>
                                                    <th>Batch No</th>
                                                    <th>Previous Qty</th>
                                                    <th>Adjust Qty</th>
                                                    <th>Previous Price</th>
                                                    <th>Adjust Price</th>
                                                   <th>Adjust Amount</th>
                                                   <th>Description</th>

                                                    {{-- <th>Purchase Price</th>
                                                    <th>Sale Price</th>
                                                    <th>Supplier Price</th> --}}
                                                    {{-- <th>Discount Amount</th> --}}
                                                    {{-- <th class="text-center">Action</th> --}}
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>

                                        </table>



                                        <script type="text/javascript">
                                            $(function() {
                                                var i = 1;
                                                var table = $('#datatable').DataTable({
                                                    processing: true,
                                                    serverSide: true,
                                                    ajax: "{{ route('view.adjust.stock',['stockid' => $stock_id])}}",

                                                    columns: [{
                                                            data: 'DT_RowIndex',
                                                            name: 'DT_RowIndex'
                                                        },
                                                         {
                                                            data: 'created_at',
                                                            name: 'created_at'
                                                        },
                                                        {
                                                            data: 'master_stock.product.title',
                                                            name: 'master_stock.product.title'
                                                        },
                                                        {
                                                            data: 'master_stock.batch_no',
                                                            name: 'master_stock.batch_no'
                                                        },
                                                        {
                                                            data: 'prev_qty',
                                                            name: 'prev_qty'
                                                        },
                                                        {
                                                            data: 'adjust_qty',
                                                            name: 'adjust_qty'
                                                        },
                                                        {
                                                            data: 'prev_sale_price',
                                                            name: 'prev_sale_price'
                                                        },{
                                                            data: 'adjust_sale_price',
                                                            name: 'adjust_sale_price'
                                                        },
                                                        {
                                                            data: 'adjust_amount',
                                                            name: 'adjust_amount',
                                                            
                                                        },
                                                        {
                                                            data: 'description',
                                                            name: 'description',
                                                            
                                                        },
                                                        

                                                      

                                                       
                                                    ]
                                                });

                                            });
                                        </script>

                                    </div>
                                </div>
                                <!-- end card body -->
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->



                </div> <!-- container-fluid -->
            </div>
        </div>
        <!-- End Page-content -->



        <!-- Modal -->
        <div class="modal fade" id="edit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="edit" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="edit">Edit {{ $page }}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="edit_form">

                    </div>

                </div>
            </div>
        </div>


    @endslot
</x-layout>
