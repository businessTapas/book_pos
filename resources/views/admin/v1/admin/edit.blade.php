    <div class="row">
        @csrf
        @method('post')
      {{--   <div class="col-sm-4">
            <div class="form-group">
                <label class="required">Name</label>
                {{ $data->name }}
            </div>
        </div> --}}

        <div class="col-sm-8">
            <div class="form-group">
                <label class="required">Email</label>
                {{ $data->email }}
            </div>
        </div>

        <div class="col-sm-4">
            <div class="form-group">
                <label class="required">Phone</label>
                {{ $data->phone }}
            </div>
        </div>
        <div class="col-sm-8">
            <div class="form-group">
                <label class="required">Type</label>
                {{ $data->type }}
            </div>
        </div>
    </div>
