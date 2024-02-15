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
                                        <h4 class="card-title">Add Customer Group</h4>
                                    </div>
      
                                </div>

                                <div class="card-body">
                                    <div class="table-responsive-lg">
                                        <form action="{{route('cgroup.add.post')}}" method="post">
                                        @csrf
                                        <div class="row">

                                        <div class="form-group">
                                            <label class="required">Name</label>
                                            <input required="" type="text" class="form-control" placeholder="Enter Customer Group Name" name="name">
                                        </div>

                                        <div class="form-group">
                                            <label class="required">Description</label>
                                            <input required="" type="text" class="form-control" placeholder="Enter Customer Group Description" name="description">
                                        </div>

                                        <div class="form-group">
                                            <label class="required">Status</label>
                                            <select class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" name="status">
                                                <option>Status</option>
                                                <option value="active">Active</option>
                                                <option value="inactive">Inactive</option>
 
                                            </select>
                                        </div>

                                        </div>

                                        <div class="col-sm-12 text-center">
                                            <button type="submit" class="btn btn-primary mt-2">Add CustomerGroup</button>
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