<form id="form_update" action="{{ route('gstslabs.update', $data->id) }}" method="POST">
    <div class="row">
        @csrf
        @method('PUT')
        <div class="col-sm-12">
            <div class="form-group">
                <label class="required">Name</label>
                <input required type="text" class="form-control" value="{{ $data->name }}"
                    placeholder="Enter GstSlab Name" name="name">
            </div>
        </div>

        <div class="col-sm-12">
            <div class="form-group">
                <label class="optional" >tax</label>
                <input value="{{ $data->tax}}" type="text" class="form-control" placeholder="Enter name" name="tax">
            </div>
        </div>
     

        <div class="col-sm-12">
            <div class="form-group">
                <label class="optional"> Description</label>
                <textarea required type="text" class="form-control" placeholder="Enter name" name="description">{{ $data->description }}</textarea>
            </div>
        </div>

        <div class="col-sm-12 text-center">
            <button type="button" onclick="ajaxCall('form_update')" class="btn btn-primary mt-2">Update
                {{ $page }}</button>
        </div>
    </div>

</form>
