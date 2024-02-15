<form id="form_update" action="{{ route('racks.update', $data->id) }}" method="POST">
    <div class="row">
        @csrf
        @method('PUT')
        <div class="col-sm-6">
            <div class="form-group">
                <label for="storage_site_id" class="required">Storage Site</label>
                {{-- <select
                    onchange="selectDrop('form_data','{{ route('racks.storage-location') }}/'+this.value,'storage_location_id')"
                    id="storage_site_id" required type="text" class="form-control"
                    placeholder="Enter  Supplier " name="storage_site_id"> --}}
                <select id="storage_site_id" required type="text" class="form-control" placeholder="Enter  Supplier "
                    name="storage_site_id">
                    <option disabled> - Select Site - </option>
                    @foreach ($storagesite as $site)
                        <option {{ $site->id == $data->storage_site_id ? 'selected' : '' }} value="{{ $site->id }}">
                            {{ $site->name }}
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
                    <option disabled> - Select Location - </option>
                    @foreach ($storagelocation as $location)
                        <option {{ $location->id == $data->storage_location_id ? 'selected' : '' }}
                            value="{{ $location->id }}">{{ $location->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <label class="required">Name</label>
                <input required type="text" class="form-control" value="{{ $data->name }}" placeholder="Enter Name"
                    name="name">
            </div>
        </div>

        <div class="col-sm-12">
            <div class="form-group">
                <label class="optional">Position</label>
                <input value="{{ $data->position }}" type="text" class="form-control" placeholder="Enter position"
                    name="position">
            </div>
        </div>


        <div class="col-sm-12">
            <div class="form-group">
                <label class="optional"> Description</label>
                <textarea type="text" class="form-control" placeholder="Enter name" name="description">{{ $data->description }}</textarea>
            </div>
        </div>

        <div class="col-sm-12 text-center">
            <button type="button" onclick="ajaxCall('form_update')" class="btn btn-primary mt-2">Update
                {{ $page }}</button>
        </div>
    </div>

</form>
