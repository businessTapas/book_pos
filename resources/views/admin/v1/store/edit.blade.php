<form id="form_update" action="{{ route('stores.update', $data->id) }}" method="POST">
    <div class="row">
        @csrf
        @method('PUT')
        <div class="col-sm-4">
            <div class="form-group">
                <label for="district_id" class="required">District</label>
                <select id="district_id" required type="text" class="form-control" placeholder="Enter  District "
                    name="district_id">
                    <option disabled> - Select District - </option>
                    @foreach ($districts as $district)
                        <option {{ $data->district_id == $district->id }} value="{{ $district->id }}">
                            <strong>{{ $district->name }}</strong> -
                            <span class="text-red">{{ $district->state }}</span>
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="form-group">
                <label class="required"> Store Name</label>
                <input value="{{ $data->store_name }}" required type="text" class="form-control"
                    placeholder="Enter Store  Name" name="store_name">
            </div>
        </div>

        <div class="col-sm-4">
            <div class="form-group">
                <label for="district_id" class="required">Store Type</label>
                <select id="district_id" required type="text" class="form-control" placeholder="Enter  District "
                    name="type">
                    <option disabled> - Select Type - </option>
                    @if (auth()->user()->type == 'admin' || auth()->user()->type == 'supplier')
                        <option {{ $data->type == 'central-store' ? 'slected' : '' }} value="central-store">Central Store
                        </option>
                    @endif
                    <option {{ $data->type == 'retail-store' ? 'slected' : '' }} value="retail-store">Retail Store</option>
                </select>
            </div>
        </div>


        <div class="col-sm-12">
            <div class="form-group">
                <label for="address" class="required">address</label>
                <textarea required id="address" type="text" class="form-control" placeholder="Enter address Name" name="address">{{ $data->address }}</textarea>
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
