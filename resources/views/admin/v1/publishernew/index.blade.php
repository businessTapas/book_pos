
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
                                <h4 class="card-title"> Publisher List</h4>
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
                                            <th>Name</th>
                                            <th>Store Name</th>
                                            <th>Store Address</th>
                                            <th>Description</th>
                                            <th>District Name</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($publishers as $publisher)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$publisher->email}}</td>
                                                <td>{{$publisher->publisher->store_name}}</td>
                                                 <td>{{$publisher->publisher->address}}</td>
                                                 <td>{{$publisher->publisher->description}}</td>
                                                 <td>{{$publisher->publisher->district->name}}</td>
                                                 <td class="text-center">
                                                    <!-- Add action buttons here -->
                                                    <a href="{{route('pub.edit',[$publisher->publisher_id])}}" class="btn btn-primary btn-sm" ><i
                                                            class="fas fa-edit"></i> Edit</a>
                                                    {{-- <a href=""
                                                        class="btn btn-danger btn-sm delete-btn" id="deleteRoleBtn"><i
                                                            class="fas fa-ban"></i> Delete</a>  --}}
                                                 </td> 
                                            </tr>
                                            {{-- <div class="col-lg-12">
                                                <div class="card">
                    
                                                    <div class="card-header d-flex justify-content-between">
                                                        <div class="header-title">
                                                            <h4 class="card-title text-capitalize">Create  User Create</h4>
                                                        </div>
                    
                    
                                                        {{-- <a class="btn btn-primary add-list btn-sm text-white"
                                                            href=""><i class="las la-plus mr-3"></i>Back to
                                                             List</a> --}}
                                                    {{-- </div>
                    
                                                    <div class="card-body">
                                                        <form id="form_data" action="" method="POST">
                                                            <div class="row">
                                                                @csrf
                    
                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                        <label for="type" class="required">Choose User Type</label>
                                                                        <select
                                                                            id="type" required type="text" class="form-control"
                                                                            name="type">
                                                                            <option value="">  </option>
                    
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                          
                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                        <label for="role_id" class="required">Choose User Role</label>
                                                                        <select id="role_id" required type="text" class="form-control"
                                                                            placeholder="Enter  category " name="role_id">
                                                                            <option selected disabled> - Select Role - </option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                    
                    
                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                        <label class="required">Name</label>
                                                                        <input required type="text" class="form-control"
                                                                            placeholder="Enter Full Name" name="name">
                                                                    </div>
                                                                </div>
                    
                    
                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                        <label class="required">email</label>
                                                                        <input required type="text" class="form-control"
                                                                            placeholder="Enter  email address" name="email">
                    
                                                                    </div>
                                                                </div>
                    
                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                        <label class="required">mobile</label>
                                                                        <input required type="text" class="form-control"
                                                                            placeholder="Enter 10 digit valid  mobile number" name="mobile">
                                                                    </div>
                                                                </div>
                    
                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                        <label class="required">password</label>
                                                                        <input required type="password" class="form-control"
                                                                            placeholder="Enter  password" name="password">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                        <label class="required">Confirmed Passoword</label>
                                                                        <input required type="password" class="form-control"
                                                                            placeholder="Enter  Confirmed Passoword"
                                                                            name="password_confirmation">
                                                                    </div>
                                                                </div>
                    
                    
                                                                <div class="col-sm-12">
                                                                    <div class="form-group">
                                                                        <label class="optional"> Description</label>
                                                                        <textarea type="text" class="form-control" placeholder="Enter name" name="description"></textarea>
                                                                    </div>
                                                                </div>
                      --}}
                                                                {{-- <div class="col-sm-12 text-center">
                                                                    <button type="button" onclick="ajaxCall('form_data')"
                                                                        class="btn btn-primary mt-2">Add
                                                                       </button>
                                                                </div> --}}
                                                            </div>
                    
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    
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