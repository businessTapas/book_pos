
<x-layout>
    @slot('title', )
    @slot('body')

    

<script>
  @if(Session::has('approve'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true,
    "positionClass": "toast-top-center",
    "showDuration": "300",                     
  }
  		toastr.success("{{ session('approve') }}");
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
                                <h4 class="card-title">Book Request List</h4>
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
                                            <th>Title</th>
                                            <th>Auther Name</th>
                                            <th>Price</th>
                                            <th>Isbn No</th>
                                            <th>Publication Date</th>
                                            <th>Language</th>
                                            <th>Weight</th>
                                            <th>Dimension</th>
                                            <th>Image</th>
                                            <th>Page</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                            {{-- <th class="text-center">Action</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($book_request as $request)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$request->title}}</td>
                                                <td>{{$request->author}}</td>
                                                <td>{{$request->isbn}}</td>
                                                 <td>{{$request->price}}</td>
                                                 <td>{{$request->publication_date}}</td>
                                                 <td>{{$request->language}}</td>
                                                 <td>{{$request->weight}}</td>
                                                 <td>{{$request->dimensions}}</td>
                                                 <td><img src="{{ asset($request->image) }}" alt="Image"
                                                    class="img-fluid rounded" style="width:50px;"></td>
                                                 <td>{{$request->pages}}</td>
                                                 <td>{{$request->description}}</td>
                                                 <td class="text-center">
                                                    <!-- Add action buttons here -->
                                                    {{-- <a href="" class="btn btn-primary btn-sm"><i
                                                            class="fas fa-edit"></i>Approve</a> --}}
                                                            @if ($request->status == 'inactive')
                                                            <a href="{{route('request.show.active',[$request->id])}}"
                                                                class="btn btn-primary btn-sm">
                                                                    Approve</a>
                                                      
                                                            {{-- <a href=""
                                                                class="btn btn-danger btn-sm"><i
                                                                    class="fas fa-ban"></i>Approve</a> --}}
                                                        @endif
                                                    {{-- <a href=""
                                                        class="btn btn-danger btn-sm delete-btn" id="deleteRoleBtn"><i
                                                            class="fas fa-ban"></i> Delete</a>  --}}
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