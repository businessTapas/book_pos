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
                                        href="{{ route('books.create') }}"><i class="las la-plus mr-3"></i>Add
                                        {{ $page }}</a>
                                </div>


                                <div class="card-body">
                                    <div class="table-responsive-lg">
                                        <table class=" datatable table   table-striped table-bordered ">
                                            <thead>
                                                <tr class="ligth">
                                                    <th>S.No</th>
                                                    <th>Book</th>
                                                    <th>Store</th>
                                                    <th>Availble Qty</th>
                                                    <th>Batch No</th>
                                                    <th>Storage Site</th>
                                                    <th>Storage Location</th>
                                                    <th>Rack</th>
                                                    <th>Action</th>
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
                                                var table = $('.datatable').DataTable({
                                                    processing: true,
                                                    serverSide: true,
                                                    ajax: "{{ route('master-stock-inventery.index') }}",

                                                    columns: [{
                                                            data: 'DT_RowIndex',
                                                            name: 'DT_RowIndex'
                                                        },
                                                        {
                                                            data: 'product.title',
                                                            name: 'product.title'
                                                        },
                                                        {
                                                            data: 'store.store_name',
                                                            name: 'store.store_name'
                                                        },
                                                        {
                                                            data: 'qty',
                                                            name: 'qty'
                                                        },
                                                        {
                                                            data: 'batch_no',
                                                            name: 'batch_no'
                                                        },
                                                        {
                                                            data: 'storage_site.name',
                                                            name: 'storage_site.name'
                                                        },
                                                        {
                                                            data: 'storage_location.name',
                                                            name: 'storage_location.name'
                                                        },
                                                        {
                                                            data: 'rack.name',
                                                            name: 'rack.name'
                                                        },
                                                        {
                                                            data: 'action',
                                                            name: 'action',
                                                            orderable: false,
                                                            searchable: false
                                                        },
                                                        // {
                                                        //     data: 'purchase_price',
                                                        //     name: 'purchase_price'
                                                        // },
                                                        // {
                                                        //     data: 'sale_price',
                                                        //     name: 'sale_price'
                                                        // },
                                                        // {
                                                        //     data: 'supplier_price',
                                                        //     name: 'supplier_price'
                                                        // },
                                                        // {
                                                        //     data: 'discount_amount',
                                                        //     name: 'discount_amount'
                                                        // },

                                                      

                                                       
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
