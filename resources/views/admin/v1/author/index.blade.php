<x-layout>
   @slot('title',)
    @slot('body')

    <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">


                                <div class="card-header d-flex justify-content-between">
                                    <div class="header-title">
                                        <h4 class="card-title">Author List</h4>
                                    </div>

                                    {{-- <a href="{{ route('author.add') }}" class="btn btn-primary add-list btn-sm text-white" type="button"
                                        class="btn btn-primary">
                                        <i class="las la-plus mr-3"></i>Add Author</a> --}}
                                        <a class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"  href="{{ route('author.add') }}"><i class="mdi mdi-plus me-1"></i> Add Author</a>
                                </div>

                                <div class="card-body">
                                    <div class="table-responsive-lg">
                                        <table class=" datatable table   table-striped table-bordered ">
                                            <thead>
                                                <tr class="ligth">
                                                    <th>S.No</th>
                                                    <th>Author Name</th>
                                                    <th>Description</th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            {{-- <tbody>
                                            @foreach($author as $authors)
                                            <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$authors->name}}</td>
                                            <td>{{$authors->description}}</td>
                                            <td class="btn-group">
                                            <a href="{{Route('author.edit',[$authors->id])}}"><button type="button" class="btn btn-warning btn-sm tooltip1" data-bs-target="#edit"> 
                                                 <i class="fas fa-edit"></i> <span> Edit Category </span>
                                            </button></a>
        
                                            <a href="{{Route('author.delete',[$authors->id])}}"><button type="button" id="delete10" class="btn btn-danger btn-sm tooltip1">
                                                <i class="fas fa-trash-alt"></i> <span> Delete Category </span>
                                            </button></a>
                                            </td>
                                            </tr>
                                            @endforeach
                                            </tbody> --}}
                                        </table>
                                        <script type="text/javascript">
                                            $(function() {
                                                var i = 1;
                                                var table = $('.datatable').DataTable({
                                                    processing: true,
                                                    serverSide: true,
                                                    ajax: "{{ route('auth.index') }}",

                                                    columns: [{
                                                            data: 'DT_RowIndex',
                                                            name: 'DT_RowIndex'
                                                        },
                                                        {
                                                            data: 'name',
                                                            name: 'name'
                                                        },
                                                        {
                                                            data: 'description',
                                                            name: 'description'
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


    @endslot
</x-layout>
