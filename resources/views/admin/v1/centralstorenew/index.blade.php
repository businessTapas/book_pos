{{-- <x-layout>
    @slot('title', $page)
    @slot('body')

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


                                    <a class="btn btn-primary add-list btn-sm text-white" type="button"
                                        class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i
                                            class="las la-plus mr-3"></i>Add
                                        {{ $page }}</a>
                                </div>

                                <div class="card-body">
                                    <div class="table-responsive-lg">
                                        <table class=" datatable table   table-striped table-bordered ">
                                            <thead>
                                                <tr class="ligth">
                                                    <th>S.No</th>
                                                    <th>District</th>
                                                    <th>Store Name</th>
                                                    <th>type</th>
                                                    <th>address</th>
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
                                                    ajax: "{{ route('stores.index') }}",

                                                    columns: [{
                                                            data: 'DT_RowIndex',
                                                            name: 'DT_RowIndex'
                                                        },
                                                        {
                                                            data: 'district.name',
                                                            name: 'district.name'
                                                        },
                                                     
                                                        {
                                                            data: 'store_name',
                                                            name: 'store_name'
                                                        },
                                                     
                                                        {
                                                            data: 'type',
                                                            name: 'type'
                                                        },
                                                     
                                                        {
                                                            data: 'address',
                                                            name: 'address'
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
                            </div>
                        </div>
                    </div>
                    <!-- Button trigger modal -->
                </div>
            </div>
        </div>
        @include('admin.v1.centralstorenew.insert')

        <div class="modal fade" id="edit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="edit" aria-hidden="true">
        <div class="modal-dialog modal-xl">
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
</x-layout> --}}
