<!-- The Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h6 class="modal-title">Add {{ $page }}</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form id="form_data" action="{{ route('districts.store') }}" method="POST">
                    <div class="row">
                        @csrf
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="required">Name</label>
                                <input required type="text" class="form-control" placeholder="Enter  Name"
                                    name="name">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="state" class="required">State</label>
                                <input required id="state" type="text" class="form-control"
                                    placeholder="Enter state Name" name="state">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="required">country</label>
                                <input required readonly value="India" type="text" class="form-control"
                                    placeholder="Enter country name" name="country">
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="optional"> Description</label>
                                <textarea type="text" class="form-control" placeholder="Enter name" name="description"></textarea>
                            </div>
                        </div>

                        <div class="col-sm-12 text-center">
                            <button type="button" onclick="ajaxCall('form_data')" class="btn btn-primary mt-2">Add
                                {{ $page }}</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<!-- // model -->
