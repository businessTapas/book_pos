<x-layout>
    @slot('title', )
    @slot('body')




<div class="main-content">
    <div class="page-content">
       
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">

                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Customer List</h4>
                            </div>

{{-- 
                            <!-- <a class="btn btn-primary add-list btn-sm text-white" href="{{route('admin.setting.showdata')}}"><i -->
                                    <!-- class="las la-plus mr-3"></i>Back to setting Pages</a> -->
                        </div> --}}


                        <div class="card-body">
                            <div class="table-responsive-lg">
                                <table class=" datatable table   table-striped table-bordered ">
                                    <thead>
                                        <form method="POST"  action="{{route('central.customer.update',[$customer->id])}}">
                                            {{csrf_field()}}
                                        <tr class="ligth">
                                          
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone no</th>
                                            <th>Gender</th>
                                            <th>Date Of Birth</th>
                                        
                                        </tr>
                                    </thead>
                                    <tbody>
                               
                                            <tr>
                                              
                                                <td><input type='text'class='form-control' name='name' value="{{$customer->name}}"><input type="hidden" name="id" value="{{$customer->id}}"></td>
                                                <td><input type='email' class='form-control' name='email'  value="{{$customer->email}}" >
                                                <td><input type='tel' class='form-control' name='phone'  value="{{$customer->phone}}" >
                                                <td><input type='text' class='form-control' name='gender'  value="{{$customer->gender}}" >
                                                 <td><input type='date' class='form-control' name='dob'  value="{{$customer->dob}}" >
                                                 <td class="text-center">
                                                    <!-- Add action buttons here -->
                                                   <td>
                                                    <div class="col-sm-12 text-center">
                                                        <button type="submit" class="btn btn-primary add-list btn-sm text-white">Update
                                                            Customer</button>
                                                    </div>
                                                   </td>
                                                </tr>
                                  
                                    </tbody>
                                   
                                    </form>
                                </table>
                            </div>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->
            </div>
           
          
        </div> 
      
    </div>
</div>

    
@endslot
</x-layout>