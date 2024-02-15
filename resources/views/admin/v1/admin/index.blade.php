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
                                        {{-- <h4 class="card-title">{{ $type }} List</h4> --}}
                                        <h4 class="card-title">Users List</h4>
                                    </div>


                                   {{--  <a class="btn btn-primary add-list btn-sm text-white"  href="{{ route('admin.create',$type)}}" ><i
                                            class="las la-plus mr-3"></i>Add
                                        {{ $page }}</a> --}}

                                        <a class="btn btn-primary add-list btn-sm text-white"  href="{{ route('admin.create')}}" ><i
                                            class="las la-plus mr-3"></i>Add User</a>
                                </div>

                                <div class="card-body">
                                    <div class="table-responsive-lg">
                                        <table class=" datatable table table-bordered table-striped ">
                                            <thead>
                                                <tr class="ligth">
                                                    <th>S.no</th>
                                                   {{--  <th>Name</th> --}}
                                                    <th>Email</th>
                                                    <th>Type</th>
                                                    <th>Roles</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>

                                        </table>
                                        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

                                        <script type="text/javascript">
                                            $(function() {
                                                var i = 1;
                                                var table = $('.datatable').DataTable({
                                                    processing: true,
                                                    serverSide: true,
                                                 {{--     ajax: "{{ route('admin.index', $type) }}", --}}
                                                 ajax: "{{ route('admin.index') }}",
                                                    columns: [{
                                                            data: 'DT_RowIndex',
                                                            name: 'DT_RowIndex'
                                                        },
                                                        

                                                        {
                                                            data: 'email',
                                                            name: 'email'
                                                        },


                                                        {
                                                            data: 'type',
                                                            name: 'type'
                                                        },
                                                        {
                                                            data: 'role.name',
                                                            name: 'role.name'
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
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                </div> <!-- container-fluid -->
            </div>
        </div>
        <!-- Button trigger modal -->



        <!-- The Modal -->
        <div class="modal fade" id="show">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h6 class="modal-title">View {{ $page }}</h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body" id="show_form">

                    </div>
                </div>
            </div>
        </div>
        <!-- // model -->

        <!-- The Modal -->
        <div class="modal fade" id="password_change">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h6 class="modal-title">Change Password {{ $page }}</h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body" id="password_change_form">

                    </div>
                </div>
            </div>
        </div>
        <!-- // model -->
    @endslot
</x-layout>
