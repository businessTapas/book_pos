
<x-layout>
    @slot('title')
    @slot('body')



<div class="main-content">
    <div class="page-content">
       
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">

                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Warehouse List</h4>
                            </div>


                            <!-- <a class="btn btn-primary add-list btn-sm text-white" href=""><i -->
                                    <!-- class="las la-plus mr-3"></i>Back to setting Pages</a> -->
                        </div>


                        <div class="card-body">
                            <div class="table-responsive-lg">
                                <table class=" datatable table   table-striped table-bordered ">
                                    <thead>
                                        <form method="POST"  action="{{route('admin.ware.update',[$edit->id])}}">
                                            {{csrf_field()}}
                                        <tr class="ligth">
                                          
                                            
                                            <th>Name</th>
                                            <th>Address</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>District Name</th>
                                            <th>Publisher Name</th>
                                             </td> 
                                        </tr>
                                    </thead>
                                    <tbody>
                               
                                            <tr>
                                                <td><input type='text' class="form-control" name='name' value="{{$edit->name}}"><input type="hidden" name="id" value="{{$edit->id}}"></td>
                                                <td><input type="text" class="form-control" name='address' value="{{$edit->address}}" value="{{$edit->id}}">
                                                <td><input type="text" class="form-control" name='title' value="{{$edit->product->title}}" value="{{$edit->id}}">
                                                <td><input type="text" class="form-control" name='description' value="{{$edit->description}}" value="{{$edit->id}}">
                                                <td><input type="text" class="form-control" name='name' value="{{$edit->district->name}}" value="{{$edit->id}}" name="">
                                                 <td><input type="text" class="form-control" name='store_name' value="{{$edit->publisher->store_name}}" value="{{$edit->id}}">
                                               
                                                 <td class="text-center">
                                                    <!-- Add action buttons here -->
                                                   

                                                    <div class="col-sm-12 text-center">
                                            <button type="submit" class="btn btn-primary add-list btn-sm text-white">Update
                                                Warehouse</button>
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
            <script type="text/javascript" src="{{asset('assets/js/ckeditor/ckeditor.js')}}"></script>
          
        </div> 
        <script>
        ClassicEditor
            .create( document.querySelector( '#description' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
    </div>
</div>
@endslot
</x-layout>