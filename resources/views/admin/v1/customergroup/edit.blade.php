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
                                        <h4 class="card-title">Update Customer Group</h4>
                                    </div>
      
                                </div>

                                <div class="card-body">
                                    <div class="table-responsive-lg">
                                        <form action="{{Route('cgroup.update',[$edit->id])}}" method="post">
                                        @csrf
                                        <div class="row">

                                        <div class="form-group">
                                            <label class="required">Name</label>
                                            <input required="" type="text" class="form-control" name="name" value="{{$edit->name}}">
                                        </div>

                                        <div class="form-group">
                                            <label class="required">Description</label>
                                            <input required="" type="text" class="form-control" name="description" value="{{$edit->description}}">
                                        </div>

                                        <div class="form-group">
                                            <label class="required">Status</label>
                                            <select class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" name="status">
        
                                                <option value="active"  {{ $edit->status === 'active' ? 'selected' : '' }}>Active</option>
                                                <option value="inactive" {{ $edit->status === 'inactive' ? 'selected' : '' }}>Inactive</option>
 
                                            </select>
                                        </div> 

                                        </div>

                                        <div class="col-sm-12 text-center">
                                            <button type="submit" class="btn btn-primary mt-2">Update CustomerGroup</button>
                                        </div>
                                        </form>                                      
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