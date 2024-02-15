<form id="form_update" action="{{ route('categories.update', $data->id) }}" method="POST">
    <div class="row">
        @csrf
        @method('PUT')
        <div class="col-sm-12">
            <div class="form-group">
                <label class="required">Name</label>
                <input required type="text" class="form-control" value="{{ $data->name }}"
                    placeholder="Enter Category Name" name="name">
            </div>
        </div>

        <div class="col-sm-12">
            <div class="form-group">
                <label class="optional" > code Name</label>
                <input value="{{ $data->code}}" type="text" class="form-control" placeholder="Enter name" name="code">
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <label class="required">Icon</label>
                <div class="row">
                    <div class="col-sm-10">
                        <input onchange="image_check(this, 100)" title="upload icon images"
                            class="form-control" type="file" name="icon" placeholder="Enter state">
                    </div>
                    <div class="col-sm-2">
                        <img class="img-fluid" src="{{ $data->icon }}" alt="">
                    </div>

                </div>
            </div>
        </div>
     

        <div class="col-sm-12">
            <div class="form-group">
                <label class="optional"> Description</label>
                <textarea  type="text" class="form-control" placeholder="Enter name" name="description">{{ $data->description }}</textarea>
            </div>
        </div>

        <div class="col-sm-12 text-center">
            <button type="button" onclick="ajaxCall('form_update')" class="btn btn-primary mt-2">Update
                {{ $page }}</button>
        </div>
    </div>

</form>
