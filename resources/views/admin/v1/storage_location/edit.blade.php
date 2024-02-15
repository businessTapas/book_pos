<form id="form_update" action="{{ route('storagelocations.update', $data->id) }}" method="POST">
    <div class="row">
        @csrf
        @method('PUT')
        <div class="col-sm-12">
            <div class="form-group">
                <label class="required">Name</label>
                <input required type="text" class="form-control" value="{{ $data->name }}"
                    placeholder="Enter Name" name="name">
            </div>
        </div>

        <div class="col-sm-12">
            <div class="form-group">
                <label class="required">Location</label>
                <input value="{{ $data->sub_location_name}}" type="text" class="form-control" placeholder="Enter name" name="sub_location_name">
            </div>
        </div>

        <div class="col-sm-12">
            <div class="form-group">
                <label class="required">Storage Site</label>
                <select type="text" class="form-control" placeholder="Enter site"
                    name="storage_site_id">
                    @foreach ($storage_sites as $site)
                    <option {{ $data->storage_site_id == $site->id ? "selected":""}} value="{{ $site->id }}">{{ $site->name }}</option>
                    @endforeach
                </select>

            </div>
        </div>

        <div class="col-sm-12">
            <div class="form-group">
                <label class="optional"> Description</label>
                <textarea  type="text" class="form-control" name="description">{{ $data->description }}</textarea>
            </div>
        </div>

        <div class="col-sm-12 text-center">
            <button type="button" onclick="ajaxCall('form_update')" class="btn btn-primary mt-2">Update
                {{ $page }}</button>
        </div>
    </div>
</form>
