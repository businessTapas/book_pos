<x-layout>
    @slot('title')
    @slot('body')


<div class="main-content">
    <div class="page-content">
        
        <script>
            @if (Session::has('success'))
                    toastr.options = {
                        "closeButton": true,
                        "progressBar" : true,
                        "positionClass": "toast-top-center",
                        "showDuration": "300",
                    }
                    toastr.success("{{ session('success') }}");
                @endif

                @if (Session::has('update_success'))
                    toastr.options = {
                        "closeButton": true,
                        "progressBar" : true,
                        "positionClass": "toast-top-center",
                        "showDuration": "300",
                    }
                    toastr.success("{{ session('update_success') }}");
                @endif
            </script>

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">

                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Warehouse List</h4>
                            </div>


                            <a class="btn btn-primary add-list btn-sm text-white" href="{{route('admin.add.ware')}}"><i class="las la-plus mr-3"></i>Add Warehouse</a>
                        </div>


                        <div class="card-body">
                            <div class="table-responsive-lg">
                                <table class=" datatable table   table-striped table-bordered ">
                                    <thead>
                                        <tr class="ligth">
                                            <th>S.No</th>
                                            <th>Name</th>
                                            <th>Address</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>District Name</th>
                                            <th>Publisher Name</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @foreach($warehouse as $house)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$house->name}}</td>
                                            <td>{{$house->address}}</td>
                                            <td>{{$house->product->title}}</td>
                                            <td>{{$house->description}}</td>
                                            <td>{{$house->district->name}}</td>
                                            <td>{{$house->publisher->store_name}}</td>
                                            <td class="text-center">
                                                <!-- Add action buttons here -->
                                               
                                                        {{-- @if($wallet->status == 'active')
                                                        <a href="{{route('admin.wallet.status',[$wallet->customer_id])}}" class="btn btn-danger btn-sm delete-btn" id="deleteRoleBtn"><i
                                                            class="fas fa-ban"></i> Deactivate</a>  
                                                        @else --}}
                                                        <a href="{{route('admin.edit.ware',[$house->id])}}" class="btn btn-primary btn-sm"><i
                                                            class="fas fa-edit"></i>Edit</a>
                                                         {{-- @endif

                                                            <script>
                                                                $(document).ready(function() {
                                                                    $('.delete-btn').on('click', function(e) {
                                                                        e.preventDefault();
    
                                                                        // Show a custom confirmation dialog
                                                                        var confirmation = window.confirm('Are you sure you want to deactivate this company?');
    
                                                                        // If user confirms, navigate to the delete URL
                                                                        if (confirmation) {
                                                                            var url = $(this).attr('href');
                                                                            window.location.href = url;
                                                                        }
                                                                    });
                                                                });
                                                            </script>  --}}
                                            </td>
                                        </tr>
                                      @endforeach
                                    </tbody>
                                </table>
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
@endslot
</x-layout>
