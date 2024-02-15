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
                <form id="form_data" action="{{ route('storagelocations.store') }}" method="POST">
                    <div class="row">
                        @csrf
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="required">Name</label>
                                <input required type="text" class="form-control" placeholder="Enter Location Name"
                                    name="name">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="required">Location</label>
                                <input type="text" class="form-control" placeholder="Enter Location"
                                    name="sub_location_name">
                            </div>
                        </div>

                       

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="required">Storage Site</label>
                                <select type="text" class="form-control" placeholder="Enter site"
                                    name="storage_site_id">
                                    @foreach ($storage_sites as $site)
                                    <option value="{{ $site->id }}">{{ $site->name }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>


                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="optional">Description</label>
                                <textarea type="text" class="form-control" placeholder="Enter description" name="description"></textarea>
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
