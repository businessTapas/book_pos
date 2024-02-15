
<x-layout>
    @slot('title', )
    @slot('body')

    

<script>
  @if(Session::has('success'))
  toastr.options =
  {
  	"closeButton" : true,
  		toastr.success("{{ session('success') }}");"progressBar" : true,
    "positionClass": "toast-top-center",
    "showDuration": "300",                     
  }
  	
  @endif
  
    @if (Session::has('message'))
                    toastr.options = {
                        "closeButton": true,
                        "positionClass": "toast-top-center",
                        "showDuration": "300",
                    }
                    toastr.success("{{ session('message') }}");
      @endif
</script>



<div class="main-content">
    <div class="page-content">
       
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">

                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title"> Customer List</h4>
                            </div>

                            <a class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"
                            href="{{route('central.view')}}"><i class="mdi mdi-plus me-1"></i>New Customer
                            </a>

                        </div>


                        <div class="card-body">
                            <div class="table-responsive-lg">
                                <table class=" datatable table align-middle table-nowrap table-check" id="datatable">
                                    <thead>
                                        <tr class="ligth">
                                            <th>S.No</th>
                                            <th>Name</th>
                                            <th>Phone NO</th>
                                            <th>Gender</th>
                                            {{-- <th>State</th>
                                            <th>Pincode</th> --}}
                                            <th>Status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    {{-- @foreach($centralcustomer as $customer)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$customer->name}}</td>
                                                <td>{{$customer->phone}}</td>
                                                <td>{{$customer->gender}}</td> --}}
                                                {{-- <td>{{$customer->address[0]->state}}</td>
                                                <td>{{$customer->address[0]->pincode}}</td> --}}
                                                 {{-- <td>{{$customer->status}}</td> --}}
                                                 {{-- <td class="text-center"> --}}
                                                    <!-- Add action buttons here -->
                                                    {{-- <a href="{{route('central.customer.edit',[$customer->id])}}" class="btn btn-primary btn-sm"><i
                                                            class="fas fa-edit"></i> Edit</a> --}}
                                                    {{-- <a href=""
                                                        class="btn btn-danger btn-sm delete-btn" id="deleteRoleBtn"><i
                                                            class="fas fa-ban"></i> Delete</a>  --}}
                                                 {{-- </td>  --}}
                                            {{-- </tr> --}}
                                            {{-- @endforeach --}}
                                    </tbody>
                                </table>
                                


                                 <script type="text/javascript">
                                    $(function() {
                                        var i = 1;
                                        var table = $('.datatable').DataTable({
                                            processing: true,
                                            serverSide: true,
                                            ajax: "{{ route('central.customer') }}",

                                            columns: [{
                                                    data: 'name',
                                                    name: 'name'
                                                },
                                                {
                                                    data: 'phone',
                                                    name: 'phone'
                                                },
                                                {
                                                    data: 'gender',
                                                    name: 'gender'
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

@endslot
</x-layout>