<!-- The Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h6 class="modal-title">Add {{$page}}</h6>
                <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close" class =""></button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form id="form_data" action="{{ route('categories.store') }}" method="POST">
                    <div class="row">
                        @csrf
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="required" >Name</label>
                                <input required type="text" class="form-control"    placeholder="Enter Category Name" name="name">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="optional" > code Name</label>
                                <input  type="text" class="form-control" placeholder="Enter name" name="code">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="optional" >Icon</label>
                                <input onchange="image_check(this, 100)" title="upload icon images"  class="form-control" type="file" name="icon" placeholder="Enter image">
                            </div>
                        </div>
              

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="optional"> Description</label>
                                <textarea  type="text" class="form-control" placeholder="Enter name" name="description"></textarea>
                            </div>
                        </div>

                        <div class="col-sm-12 text-center">
                            <button type="button" onclick="ajaxCall('form_data')"
                                class="btn btn-success btn-rounded"><i class="uil uil-check me-2"></i>Add {{$page}}</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<!-- // model -->
