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


                                    <a class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"
                                        href="{{ route('books.create') }}"><i class="mdi mdi-plus me-1"></i>Add
                                        {{ $page }}</a>
                                </div>


                                <div class="card-body">
                                    <div class="table-responsive-lg">
                                        <table class=" datatable table   table-striped table-bordered ">
                                            <thead>
                                                <tr class="ligth">
                                                    <th>S.No</th>
                                                    <th>Title</th>
                                                    <th>author</th>
                                                    <th>isbn</th>
                                                    <th>price</th>
                                                    <th>publication_date</th>
                                                    <th>language</th>
                                                    <th>weight</th>
                                                    <th>dimensions</th>
                                                    <th>pages</th>
                                                    <th>image</th>
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
                                                    ajax: "{{ route('books.index') }}",

                                                    columns: [{
                                                            data: 'DT_RowIndex',
                                                            name: 'DT_RowIndex'
                                                        },
                                                        {
                                                            data: 'title',
                                                            name: 'title'
                                                        },
                                                        {
                                                            data: 'author',
                                                            name: 'author'
                                                        },
                                                        {
                                                            data: 'isbn',
                                                            name: 'isbn'
                                                        },
                                                        {
                                                            data: 'price',
                                                            name: 'price'
                                                        },
                                                        {
                                                            data: 'publication_date',
                                                            name: 'publication_date'
                                                        },
                                                        {
                                                            data: 'language',
                                                            name: 'language'
                                                        },
                                                        {
                                                            data: 'weight',
                                                            name: 'weight'
                                                        },
                                                        {
                                                            data: 'dimensions',
                                                            name: 'dimensions'
                                                        },
                                                        {
                                                            data: 'pages',
                                                            name: 'pages'
                                                        },
                                                        {
                                                            data: 'image',
                                                            name: 'image',
                                                            "render": function(data, type, full, meta) {
                                                                return "<img src=\"" + data + "\" height=\"50\"/>";
                                                            },
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
