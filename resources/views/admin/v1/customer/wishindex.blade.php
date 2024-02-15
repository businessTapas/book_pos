
<x-layout>
    @slot('title', )
    @slot('body')

    

<script>
  @if(Session::has('success'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true,
    "positionClass": "toast-top-center",
    "showDuration": "300",                     
  }
  		toastr.success("{{ session('success') }}");
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
                                <h4 class="card-title"> Customer WishList</h4>
                            </div>

{{-- 
                            <a class="btn btn-primary add-list btn-sm text-white" href="{{route('admin.setting.showpages')}}"><i
                                    class="las la-plus mr-3"></i>Add Pages</a> --}}
                        </div>


                        <div class="card-body">
                            <div class="table-responsive-lg">
                                <table class=" datatable table   table-striped table-bordered ">
                                    <thead>
                                        <tr class="ligth">
                                            <th>S.No</th>
                                            <th>Product</th>
                                            <th>Customer</th>
                                            {{-- <th class="text-center">Action</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($wishlist as $list)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$list->product->title}}</td>
                                                <td>{{$list->customer->name}}</td>
                                                <td>{{$list->gender}}</td>
                                                 <td>{{$list->status}}</td>
                                                 <td class="text-center">
                                                    <!-- Add action buttons here -->
                                                    {{-- <a href="" class="btn btn-primary btn-sm"><i
                                                            class="fas fa-edit"></i> Edit</a>
                                                    <a href=""
                                                        class="btn btn-danger btn-sm delete-btn" id="deleteRoleBtn"><i
                                                            class="fas fa-ban"></i> Delete</a>  --}}
                                                 </td> 
                                            </tr>
                                            @endforeach
                                    </tbody>
                                </table>
                                


                                {{-- <script type="text/javascript">
                                    $(function() {
                                        var i = 1;
                                        var table = $('.datatable').DataTable({
                                            processing: true,
                                            serverSide: true,
                                            ajax: "{{ route('retail.customer') }}",

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
                                </script> --}}

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