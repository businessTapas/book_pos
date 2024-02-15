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
                                        <h4 class="card-title">Add Author</h4>
                                    </div>
      
                                </div>

                                <div class="card-body">
                                    <div class="table-responsive-lg">
                                        <form action="{{route('admin.author.post')}}" method="post">
                                        @csrf
                                        <div class="row">

                                        <div class="form-group">
                                            <label class="required">Name</label>
                                            <input required="" type="text" class="form-control" placeholder="Enter Author Name" name="name">
                                        </div>

                                        <div class="form-group">
                                            <label class="optional">Description</label>
                                            <textarea type="text" class="form-control" placeholder="Enter Description" name="description"></textarea>
                                        </div>
                                        </div>

                                        {{-- <div class="col-sm-12 text-center">
                                            <button type="submit" class="btn btn-primary mt-2">Add Author</button>
                                        </div> --}}
                                        <div class="col-sm-12 text-center">
                                            <button type="submit" class="btn btn-success btn-rounded"><i class="uil uil-check me-2"></i>Add Author</button>
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