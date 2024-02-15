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
                                                     <th>Book Name</th>
                                                     <th>Batch No</th>
                                                    <th>From Warehouse</th>
                                                    <th>To Warehouse</th>
                                                    <th>To Location</th>
                                                    <th>To Rack</th>
                                                    <th>Total Products</th>
                                                    <th>MRP</th>
                                                   
                                                   {{--  <th class="text-center">Action</th> --}}
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
                                                    ajax: "{{ route('transfer.index') }}",

                                                    columns: [
                                                       
                                                        {
                                                            data: 'created_at',
                                                            name: 'created_at'
                                                        },
                                                        {
                                                            data: 'product.title',
                                                            name: 'product.title'
                                                        },
                                                        {
                                                            data: 'batch_no',
                                                            name: 'batch_no'
                                                        },
                                                        {
                                                            data: 'transfer_site.storage_site.name',
                                                            name: 'transfer_from_id'
                                                        },
                                                        {
                                                            data: 'storage_site.name',
                                                            name: 'storage_site_id'
                                                        },
                                                        {
                                                            data: 'storage_location.name',
                                                            name: 'storage_location_id'
                                                        },
                                                        {
                                                            data: 'rack.name',
                                                            name: 'rack_id'
                                                        },
                                                        {
                                                            data: 'qty',
                                                            name: 'qty'
                                                        },
                                                    
                                                        {
                                                            data: 'purchase_price',
                                                            name: 'purchase_price'
                                                        },
                                                  
                                                       
                                                        
                                                        /* {
                                                            data: 'action',
                                                            name: 'action',
                                                            orderable: false,
                                                            searchable: false
                                                        }, */
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
