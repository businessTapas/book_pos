<x-layout>
    @slot('title', $page)
    @slot('body')


    @if(session()->has('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">

                                <div class="card-header d-flex justify-content-between">
                                    <div class="header-title">
                                        <h4 class="card-title">{{ $page }} CSV Upload</h4>
                                    </div>


                                    <a class="btn btn-primary add-list btn-sm text-white"
                                        href="{{ route('books.index') }}"><i class="las la-plus mr-3"></i>Back to
                                        {{ $page }} List</a>
                                </div>

                                <!-- Modal body -->
                                <div class="card-body">
                                    <form id="form_data" {{ route('upload.books.csv') }} method="POST"
                                        enctype="multipart/form-data">
                                        <div class="row">
                                            @csrf
                                            
                                            @php
                                                $storage_sites = \App\Models\StorageSite::where('deleted_at', null)->where('store_id',loginStore()->id)->get();
                                                

                                            @endphp
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="required">CSV</label>
                                                    <input title="upload csv file"
                                                        required class="form-control" type="file" name="csv_file"
                                                        placeholder="Enter csv" accept=".csv">
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="required">Storage Site</label>
                                                    <select onchange="get_storage_location(this.value)"
                                                        id="storage_site_id" name="storage_site_id" 
                                                        placeholder="Search Storage Site.." class="form-control form-control-sm  ">
                                                        <option value=""> -Search Storage Site-
                                                        </option>
                                                        @foreach ($storage_sites as $sites)
                                                            <option value="{{ $sites->id ?? '' }}">
                                                                {{ $sites->name ?? '' }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="required">Storage Location</label>
                                                    <select onchange="get_rack(this.value)"
                                                        id="storage_location_id" name="storage_location_id" 
                                                        placeholder="Search Storage Location.." class="form-control form-control-sm  ">
                                                        <option value=""> -Search Locations-
                                                        </option>
                                                       
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="required">Rack</label>
                                                    <select
                                                        name="rack_id" id="rack_id" 
                                                        placeholder="Search Rack.." class="form-control form-control-sm  ">
                                                        <option value=""> -Search Racks-
                                                        </option>
                                                       
                                                    </select>
                                                </div>
                                            </div>

                                            <hr>
                                            <div class="col-sm-12 mt-3 text-center">
                                              

                                                    <button  onclick="chk_csv_upload()"  data-bs-toggle="modal"
                                                    data-bs-target="#confirm-csv-chk">Upload CSVV</a>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endslot
</x-layout>
<!-- // modal -->
<div class="modal fade" id="confirm-csv-chk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="">CSV Confirm Upload</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="csv_confirm">
                
            </div>
        </div>
    </div>
</div>
</div>

{{-- ================== END MODAL ============== --}}
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

    function get_rack(loc_id) {
        var form = document.getElementById('form_data');
            var method = "POST";
            var formdata = new FormData(form);
            var formElements_button = Array.from(form.elements).pop();
            preloader(formElements_button);
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    //console.log(this.responseText);

                    $('#rack_id').empty();
                    data = JSON.parse(this.responseText);
                    // Populate the Book dropdown with new options
                    if(data.length > 0) {
                    $.each(data, function(key, value) {
                        console.log(value);
                        $('#rack_id').append('<option value="' + value.id + '">' + value.name + '</option>');
                    });

                    // Refresh the selectpicker to reflect the changes

                 } else {
                    alert("No rack available");
                 }
                 stopPreloader(formElements_button);
                }
                method;
            };
            xhttp.open(method, '{{ route('rack.by.locationid') }}', true);
            xhttp.send(formdata);
    }

    function chk_csv_upload() {
        //alert('gg');
        var form = document.getElementById('form_data');
            var method = "POST";
            var formdata = new FormData(form);
            var formElements_button = Array.from(form.elements).pop();
            preloader(formElements_button);
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                    $('#csv_confirm').empty();
                    // Populate the Book dropdown with new options
                    document.getElementById('csv_confirm').innerHTML = this.responseText;
                    // Refresh the selectpicker to reflect the changes                
                 stopPreloader(formElements_button);
                }
                 method;
                };
            xhttp.open(method, '{{ route('chk.upload.books.csv') }}', true);
            xhttp.send(formdata);
           // $('#confirm-csv-chk').modal.show();

    }

    function csv_proceed() {
        selectDrop('form_data', '{{ route('upload.books.csv') }}');
        $('#confirm-csv-chk').modal('hide');
    }
</script>