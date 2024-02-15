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
                <form id="form_data" action="{{ route('racks.store') }}" method="POST">
                    <div class="row">
                        @csrf

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="storage_site_id" class="required">Storage Site</label>
                                {{-- <select
                                    onchange="selectDrop('form_data','{{ route('racks.storage-location') }}/'+this.value,'storage_location_id')"
                                    id="storage_site_id" required type="text" class="form-control"
                                    placeholder="Enter  Supplier " name="storage_site_id"> --}}
                                <select id="storage_site_id" required type="text" class="form-control"
                                    placeholder="Enter  Supplier " name="storage_site_id" onchange=" get_storage_location(this.value)">
                                    <option selected disabled> - Select Site - </option>
                                    @foreach ($storagesite as $site)
                                        <option value="{{ $site->id }}">{{ $site->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="storage_location_id" class="required">Location Id</label>
                                <select id="storage_location_id" required type="text" class="form-control"
                                    placeholder="Enter  Supplier " name="storage_location_id">
                                    <option selected disabled> - Select Location - </option>
                                    @foreach ($storagelocation as $location)
                                        <option value="{{ $location->id }}">{{ $location->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="required">Name</label>
                                <input required type="text" class="form-control" placeholder="Enter Rack Name"
                                    name="name">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="optional">position</label>
                                <input type="text" class="form-control" placeholder="Enter name" name="position">
                            </div>
                        </div>



                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="optional"> Description</label>
                                <textarea type="text" class="form-control" placeholder="Enter name" name="description"></textarea>
                            </div>
                        </div>

                        <div class="col-sm-12 text-center">
                            <button type="button" onclick="ajaxCall('form_data')" class="btn btn-success btn-rounded"><i class="uil uil-check me-2"></i>Add
                                {{ $page }}</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<!-- // model -->

<script>
    function get_storage_location(site_id) {
        var form = document.getElementById('form_data');
            var method = "POST";
            var formdata = new FormData(form);
            var formElements_button = Array.from(form.elements).pop();
            preloader(formElements_button);
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);

                    $('#storage_location_id').empty();
                    data = JSON.parse(this.responseText);
                    // Populate the Book dropdown with new options
                    var loc_str ='<option value=""> -Search Location- </option>';
                    if(data.length > 0) {
                    $.each(data, function(key, value) {
                        console.log(value);
                        loc_str +='<option value="' + value.id + '">' + value.name + '</option>';
                    });
                    $('#storage_location_id').append(loc_str);

                    // Refresh the selectpicker to reflect the changes

                 } else {
                    alert("No location available");
                 }
                 stopPreloader(formElements_button);
                }
                method;
            };
            xhttp.open(method, '{{ route('storagelocations.by.siteid') }}', true);
            xhttp.send(formdata);
    }
</script>
