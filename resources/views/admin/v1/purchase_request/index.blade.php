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
                                        href="{{ route('purchase.create') }}"><i class="las la-plus mr-3"></i>Add
                                        {{ $page }}</a>
                                </div>

                                <div class="card-body">
                                    <div class="table-responsive-lg">
                                        <table class=" datatable table   table-striped table-bordered ">
                                            <thead>
                                                <tr class="ligth">
                                                    <th>S.No</th>
                                                    <th>Requistion no</th>
                                                    <th>Purchase no</th>
                                                    <th>Purchase Date</th>
                                                    <th>Transport charge</th>
                                                    <th>Supplier</th>
                                                    <th>From Store Name</th>
                                                    <th>To Store Name</th>
                                                    <th>From Store Type</th>
                                                    <th>To Store Type</th>
                                                    <th>taxeble_amount</th>
                                                    <th>round_off_amount</th>
                                                    <th>total_amount</th>
                                                    <th class="text-center">Action</th>
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
                                                    ajax: "{{ route('purchase_request.index') }}",

                                                    columns: [{
                                                            data: 'DT_RowIndex',
                                                            name: 'DT_RowIndex'
                                                        },
                                                        {
                                                            data: 'requisition_no',
                                                            name: 'requisition_no'
                                                        },
                                                        {
                                                            data: 'po_no',
                                                            name: 'po_no'
                                                        },
                                                        {
                                                            data: 'po_date',
                                                            name: 'po_date'
                                                        },
                                                        {
                                                            data: 'transport_charge',
                                                            name: 'transport_charge'
                                                        },
                                                        {
                                                            data: 'supplier.name',
                                                            name: 'supplier.name'
                                                        },
                                                        {
                                                            data: 'store.store_name',
                                                            name: 'store.store_name'
                                                        },
                                                        {
                                                            data: 'to_store.store_name',
                                                            name: 'to_store.store_name'
                                                        },
                                                   
                                                        {
                                                            data: 'store.type',
                                                            name: 'store.type'
                                                        },
                                                        {
                                                            data: 'to_store.type',
                                                            name: 'to_store.type'
                                                        },
                                                        {
                                                            data: 'taxeble_amount',
                                                            name: 'taxeble_amount'
                                                        },
                                                      
                                                        {
                                                            data: 'round_off_amount',
                                                            name: 'round_off_amount'
                                                        },
                                                        {
                                                            data: 'total_amount',
                                                            name: 'total_amount'
                                                        },
                                                        
                                                        {
                                                            data: 'action',
                                                            name: 'action',
                                                            orderable: false,
                                                            searchable: false
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
