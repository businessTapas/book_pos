<x-layout>
    @slot('title')
    @slot('body')




<div class="main-content">
    <div class="page-content">
        <script>
            @if (Session::has('failure'))
                toastr.options = {
                    "closeButton": true,
                    "positionClass": "toast-top-center",
                    "showDuration": "300",
                }
                toastr.error("{{ session('failure') }}");
            @endif
        </script>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">

                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title text-capitalize">Create Warehouse</h4>
                            </div>


                            {{-- <a class="btn btn-primary add-list btn-sm text-white"
                                href="{{ route('admin.coupon.request.list') }}"><i class="las la-plus mr-3"></i>Back to Coupon Request List</a> --}}
                        </div>

                        <div class="card-body">
                            <form  action="{{route('admin.post.ware')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="type" class="required">Name</label>
                                            <input type="text" class="form-control" name="name" placeholder="Enter your name">
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="amount" class="required">Address</label>
                                            <input type="text" class="form-control" name="address" placeholder="Enteryour address">
                                            @error('address')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="required"> User Name</label>
                                            <input required type="text" class="form-control" placeholder="Enter User Name"
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

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="required">Description</label>
                                            <input  type="textarea" class="form-control"
                                                placeholder="Enter description" name="description">
                                            @error('description')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="required">Publisher</label>
                                            <select id="company_id"  type="text" class="form-control"
                                                name="publisher_id">
                                                <option value="">Select One</option>
                                                @foreach ($publisher as $pub)
                                                <option value="{{$pub->id}}">{{$pub->store_name}}</option>
                                                @endforeach
                                            </select>
                                            @error('publisher_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="required">Product</label>
                                            <select id="company_id"  type="text" class="form-control"
                                                name="product_id">
                                                <option value="">Select One</option>
                                                @foreach ($products as $product)
                                                <option value="{{$product->id}}">{{$product->title}}</option>
                                                @endforeach
                                            </select>
                                            @error('product_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="required">District</label>
                                            <select type="text" class="form-control"
                                                name="district_id">
                                                <option value="">Select One</option>
                                                @foreach ($district as $dis)
                                                <option value="{{$dis->id}}">{{$dis->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('district_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                  

                                 
                                </div>
                                <div class="col-sm-12  mt-4 text-center" >
                                        <button type="submit" class="btn btn-primary add-list btn-sm text-white">Add Warehouse</button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endslot
</x-layout>