<form id="form_update" action="{{ route('districts.update', $data->id) }}" method="POST">
    <div class="row">
        @csrf
        @method('PUT')
        <div class="col-sm-12">
            <div class="form-group">
                <label class="required">Name</label>
                <input value="{{ $data->name }}" required type="text" class="form-control" placeholder="Enter  Name"
                    name="name">
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <label for="state" class="required">State</label>
                <input required id="state" type="text" class="form-control"
                   value="{{ $data->state}}" placeholder="Enter state Name" name="state">
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <label class="required">country</label>
                <input required readonly value="India" type="text" class="form-control"
                 value="{{ $data->country}}"   placeholder="Enter country name" name="country">
            </div>
        </div>

        <div class="col-sm-12">
            <div class="form-group">
                <label class="optional"> Description</label>
                <textarea type="text" class="form-control" placeholder="Enter name" name="description">{{$data->description}}</textarea>
            </div>
        </div>

        <div class="col-sm-12 text-center">
            <button type="button" onclick="ajaxCall('form_update')" class="btn btn-primary mt-2">Update
                {{ $page }}</button>
        </div>
    </div>

</form>
