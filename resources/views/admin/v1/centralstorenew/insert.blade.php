<!-- The Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h6 class="modal-title">Add {{ $page }}</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form id="form_data" action="{{ route('stores.store') }}" method="POST">
                    <div class="row">
                        @csrf

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="district_id" class="required">District</label>
                                <select id="district_id" required type="text" class="form-control"
                                    placeholder="Enter  District " name="district_id">
                                    <option selected disabled> - Select District - </option>
                                    @foreach ($districts as $district)
                                        <option value="{{ $district->id }}"><strong>{{ $district->name }}</strong> -
                                            <span class="text-red">{{ $district->state }}</span> </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="required"> Store Name</label>
                                <input required type="text" class="form-control" placeholder="Enter Store  Name"
                                    name="store_name">
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="type" class="required">Store Type</label>
                                <select id="type" required type="text" class="form-control"
                                    placeholder="Enter  District " name="type">
                                    <option selected disabled> - Select Type - </option>
                                    @if (auth()->user()->type == 'admin' || auth()->user()->type == 'supplier')
                                        <option value="central">Central</option>
                                    @endif
                                   
                                </select>
                            </div>
                        </div>

                         <div class="col-sm-4">
                            <div class="form-group">
                                <label class="required"> User Name</label>
                                <input required type="text" class="form-control" placeholder="Enter Store Name"
                                    name="name">
                            </div>
                        </div> 


                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="required">email</label>
                                <input required type="text" class="form-control" placeholder="Enter  email address"
                                    name="email">

                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="required">mobile</label>
                                <input required type="tel" class="form-control" placeholder="Enter  mobile number"
                                    name="mobile">
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="required">password</label>
                                <input required type="password" class="form-control" placeholder="Enter  password"
                                    name="password">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="required">Confirmed Passoword</label>
                                <input required type="password" class="form-control"
                                    placeholder="Enter  Confirmed Passoword" name="password_confirmation">
                            </div>
                        </div>


                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="address" class="required">address</label>
                                <textarea required id="address" type="text" class="form-control" placeholder="Enter address Name" name="address"></textarea>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="optional"> Description</label>
                                <textarea type="text" class="form-control" placeholder="Enter name" name="description"></textarea>
                            </div>
                        </div>

                        <div class="col-sm-12 text-center">
                            <button type="button" onclick="ajaxCall('form_data')" class="btn btn-primary mt-2">Add
                                {{ $page }}</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<!-- // model -->
