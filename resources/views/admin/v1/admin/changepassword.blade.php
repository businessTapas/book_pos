<form id="updatepassword" action="{{ route('admin.updatepassword') }}" method="POST">
    <div class="row">
        @csrf
        <div class="col-sm-12">
            <div class="form-group">
                <label class="required">New Password</label>
                <input required type="password" class="form-control" placeholder="" name="password">
            </div>
        </div>

        <div class="col-sm-12">
            <div class="form-group">
                <label class="required">Confirm New Password</label>
                <input required type="password" class="form-control" placeholder="" name="password_confirmation">
                <input required type="hidden" class="form-control" placeholder="" name="id"
                    value="{{ $data }}">
            </div>
        </div>
        <div class="col-sm-12 text-center">
            <button type="button" onclick="ajaxCall('updatepassword')" class="btn btn-primary mt-2">
                {{ $page }}</button>
        </div>
    </div>

</form>
