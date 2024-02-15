<x-layout>
    @slot('title', )
    @slot('body')



<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">

                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title text-capitalize">Edit Centarl list</h4>
                            </div>

{{-- 
                            <a class="btn btn-primary add-list btn-sm text-white"
                            href=""><i class="las la-plus mr-3"></i>Back to Offer </a>
                        </div> --}}



                        <!-- <a class="btn btn-primary add-list btn-sm text-white" -->
                            <!-- href=""><i class="las la-plus mr-3"></i>Back to Product Product Management</a> -->
                    </div>


                        <div class="card-body">
                            <form id="form_data" action="{{route('cen.update',[$editc->id])}}" method="POST"
                                >
                                @csrf
                                <div class="row">
                                    


                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="">Store Name</label>
                                        <input type="text" class="form-control" name="store_name" value="{{$editc->store_name}}">
                                        <input type="hidden" name="id" value="">
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="">Store Address</label>
                                        <input type="text" class="form-control" name="address" value="{{$editc->address}}">
                                        <input type="hidden" name="id" value="">
                                    </div>
                                </div>
                                
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="">Description</label>
                                        <input type="text" class="form-control" name="description" value="{{$editc->description}}">
                                        <input type="hidden" name="id" value="">
                                    </div>
                                </div>

                                
                                    <div class="form-group col-sm-4">
                                        <label for="district_id" class="required">District Name</label>
                                        <select id="district_id" required type="text" class="form-control"
                                            placeholder="Enter  District " name="district_id">
                                            <option selected disabled> {{$editc->district->name}} </option>
                                            @foreach ($disc as $di)
                                                <option value="{{ $di->id }}"><strong>{{ $di->name }}</strong> -
                                                    </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                    

                                    <div class="col-sm-12 text-center">
                                        <button type="submit" class="btn btn-primary add-list btn-sm text-white">update
                                            </button>

                                    </div>
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