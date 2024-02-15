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
                                        <h4 class="card-title">Customer Group List</h4>
                                    </div>

                                    <a href="{{ route('cgroup.add')}}" class="btn btn-primary add-list btn-sm text-white" type="button"
                                        class="btn btn-primary">
                                        <i class="las la-plus mr-3"></i>Add CustomerGroup</a>
                                </div>

                                <div class="card-body">
                                    <div class="table-responsive-lg">
                                        <table class=" datatable table   table-striped table-bordered ">
                                            <thead>
                                                <tr class="ligth">
                                                    <th>S.No</th>
                                                    <th>CustomerGroup Name</th>
                                                    <th>Description</th>
                                                    <th>Status</th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($cgroup as $cgroups)
                                            <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$cgroups->name}}</td>
                                            <td>{{$cgroups->description}}</td>
                                            <td>{{$cgroups->status}}</td>
                                            <td>
                                         
                                            <a href="{{ Route('cgroup.edit',[$cgroups->id])}}"><button type="button" class="btn btn-warning btn-sm tooltip1" data-bs-target="#edit"> 
                                                 <i class="fas fa-edit"></i> <span> Edit Category </span>
                                            </button></a>
        
                                            <a href="{{ Route('cgroup.delete',[$cgroups->id])}}"><button type="button" id="delete10" class="btn btn-danger btn-sm tooltip1">
                                                <i class="fas fa-trash-alt"></i> <span> Delete Category </span>
                                            </button></a>
                                         
                                          
                                            </td>
                                            </tr>
                                            @endforeach
                                            </tbody>

                                        </table>
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
