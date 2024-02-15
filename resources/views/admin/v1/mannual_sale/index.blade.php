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
                                        href="{{ route('sale.create') }}"><i class="las la-plus mr-3"></i>Add
                                        {{ $page }}</a>
                                </div>

                                <div class="card-body">
                                    <div class="table-responsive-lg">
                                        <table class=" datatable table   table-striped table-bordered ">
                                            <thead>
                                                <tr class="ligth">
                                                    <th>S.No</th>
                                                    <th>Invoice no</th>
                                                    <th>Mode</th>
                                                    <th>Sale Date</th>
                                                    <th>Customer</th>
                                                    <th>Total Amount</th>
                                                    <th>Store Name</th>
                                                    <th>status</th>
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
                                                    ajax: "{{ route('sale.index') }}",

                                                    columns: [{
                                                            data: 'DT_RowIndex',
                                                            name: 'DT_RowIndex'
                                                        },
                                                        {
                                                            data: 'invoice_no',
                                                            name: 'invoice_no'
                                                        },
                                                        {
                                                            data: 'sale_mode',
                                                            name: 'sale_mode'
                                                        },
                                                        {
                                                            data: 'created_at',
                                                            name: 'created_at'
                                                        },
                                                        {
                                                            data: 'customer.name',
                                                            name: 'customer.name'
                                                        },
                                                     
                                                  
                                                        {
                                                            data: 'total',
                                                            name: 'total'
                                                        },

                                                        {
                                                            data: 'store.store_name',
                                                            name: 'store.store_name'
                                                        },
                                                         
                                                        {
                                                            data: 'status',
                                                            name: 'status'
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
{{--===================MODAL INVOICE ===========---}}

<div class="modal fade" id="invoice" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="">tax invoice</h5>
                        {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                    </div>
                    <div class="modal-body" id="tax_invoice">
                    </div>
                </div>
            </div>
        </div>

 {{----============= END MODAL ======================== --}}
<script>
      $(document).ready(function() {

            $(document).on('click', '#pos-payment', function() {
            //event.preventDefault();
            var saleid = $(this).val();
            //alert(saleid);

            // Corrected route with the discountid parameter
            var routeUrl = '{{ route('payment.bank.api', ['sale_id' => ':saleid']) }}';
            routeUrl = routeUrl.replace(':saleid', saleid);

            editForm(routeUrl,'show-msg');
            alert("Payment Successfully accepted");
            //var redirect_url = '{{ route('sale.index') }}';
            window.print();
            refreshPage(200);
           
        });

        $(document).on('click', '#abc', function() {
            // window.reload();

            refreshPage();
           
        }); 
    });

    function get_invoice_details (invoice_no) {
        editForm('{{ route('sale.get_cus.invoice') }}/' + invoice_no, 'tax_invoice');
        $('#invoice').modal('show');

    }

</script>
