<div class="modal fade bs-example-modal-xl" data-url="" id="customerAdd" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form id="form_data_customer" action="{{route('pos.add_customer')}}" method="post">
        @csrf
        <div class="modal-dialog  modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modal-title">Add Customer</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="type" class="required">Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="name">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="type" class="required">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="email"
                                    id="description">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="type" class="required">Phone No</label>
                                <input type="tel" name="phone" id="phone" class="form-control" placeholder="phone"
                                    id="description">
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="type" class="required">Gender</label><br>
                                <input type="radio" id="male" name="gender" value="Male">
                                <label for="male">Male</label>
                                <input type="radio" id="female" name="gender" class="" value="Female">
                                <label for="female">Female</label><br>
                                @error('gender')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="type" class="required">Date of Birth</label>
                                <input type="date" name="dob" id="dob" class="form-control" placeholder="date of birth">
                                @error('dob')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="gst_no">Gst No</label>
                                <input type="text" name="gst_no" class="form-control" placeholder="Enter your gst number">
                                @error('gst_no')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" name="address" class="form-control" placeholder="Enter your Address">
                                @error('address')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="city">city</label>
                                <input type="text" name="city" class="form-control" placeholder="Enter your City name">
                                @error('city')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="state">State</label>
                                <input type="text" name="state" class="form-control" placeholder="Enter your State Name">
                                @error('state')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="pincode">Pincode</label>
                                <input type="text" name="pincode" class="form-control" placeholder="Enter your Pincode">
                                @error('pincode')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="pincode">Country</label>
                                <input type="text" name="country" class="form-control" placeholder="Enter your country">
                                @error('country')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" onclick="ajaxCall('form_data_customer')" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </form>
</div>
