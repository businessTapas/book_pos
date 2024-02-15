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
                                        <h4 class="card-title">{{ $page }} List</h4>
                                    </div>


                                    <a class="btn btn-primary add-list btn-sm text-white"
                                        href="{{ route('transfer.create') }}"><i class="las la-plus mr-3"></i>Add
                                        {{ $page }}</a>
                                </div>

                                <div class="card-body">
                                    <div class="table-responsive-lg">
                                        <table class=" datatable table   table-striped table-bordered ">
                                            <thead>
                                                <tr class="ligth">
                                                    <th>Date</th>
                                                    <th>Product Name</th>
                                                    <th>Batch No</th>
                                                    <th>Adjust Qty</th>
                                                    <th>Adjust Price</th>
                                                    
                                                   
                                                    <th class="text-center">Description</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>

                                        </table>



                                        <script type="text/javascript">
                                            $(function() {
                                                var i = 1;
                                                var table = $('.datatable').DataTable({
                                                    processing: true,
                                                    serverSide: true,
                                                    ajax: "{{ route('adjust.index') }}",

                                                    columns: [
                                                        {
                                                            data: 'created_at',
                                                            name: 'created_at'
                                                        },
                                                        {
                                                            data: 'master_stock.product.title',
                                                            name: 'product_id'
                                                        },
                                                        {
                                                            data: 'master_stock.batch_no',
                                                            name: 'master_stock_inventeries_id'
                                                        },
                                                        {
                                                            data: 'adjust_qty',
                                                            name: 'adjust_qty'
                                                        },
                                                        {
                                                            data: 'adjust_sale_price',
                                                            name: 'adjust_sale_price'
                                                        },
                                                        {
                                                            data: 'description',
                                                            name: 'description'
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



        


    @endslot
</x-layout>
