<x-layout>
    @slot('title', $page)
    @slot('body')



        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">

                                <div class="card-header d-flex justify-content-between">
                                    <div class="header-title">
                                        <h4 class="card-title">{{ $page }} List</h4>
                                    </div>


                                    <a class="btn btn-primary add-list btn-sm text-white"
                                        href="{{ route('books.index') }}"><i class="las la-plus mr-3"></i>Back to
                                        {{ $page }} List</a>
                                </div>

                                <!-- Modal body -->
                                <div class="card-body">
                                    <form id="form_data" action="{{ route('books.store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        <div class="row">
                                            @csrf

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="category_id" class="required">Category</label>
                                                    <select id="category_id" required type="text"
                                                        class="form-control selectpicker" data-live-search="true"
                                                        placeholder="Enter  category " name="category_id">
                                                        <option selected disabled> - Select Category - </option>
                                                        @foreach ($categories as $cate)
                                                            <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            {{-- <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="storage_site_id" class="required">Storage Site</label>
                                                    <select id="storage_site_id" required type="text" class="form-control"
                                                        placeholder="Enter  category " name="storage_site_id">
                                                        <option selected disabled> - Select Storage Site - </option>
                                                        @foreach ($storage_sites as $storage_site)
                                                            <option value="{{ $storage_site->id }}">{{ $storage_site->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="storage_location_id" class="required">Storage Location</label>
                                                    <select id="storage_location_id" required type="text" class="form-control"
                                                        placeholder="Enter  category " name="storage_location_id">
                                                        <option selected disabled> - Select Storage Location - </option>
                                                        @foreach ($storage_locations as $storage_location)
                                                            <option value="{{ $storage_location->id }}">{{ $storage_location->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="rack_id" class="required">Rack</label>
                                                    <select id="rack_id" required type="text" class="form-control"
                                                        placeholder="Enter  category " name="rack_id">
                                                        <option selected disabled> - Select Rack - </option>
                                                        @foreach ($racks as $rack)
                                                            <option value="{{ $rack->id }}">{{ $rack->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div> --}}


                                            {{-- <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="brand_id" class="required">Gst Slab</label>
                                                    <select id="brand_id" required type="text" class="form-control selectpicker"
                                                    data-live-search="true"
                                                        placeholder="Enter  category " name="gst_slab_id">
                                                        <option selected disabled> - Select Category - </option>
                                                        @foreach ($gst_slabs as $slab)
                                                            <option value="{{ $slab->id }}">{{ $slab->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div> --}}

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="supplier_id" class="required">Publisher</label>
                                                    <select id="supplier_id" required type="text"
                                                        class="form-select form-control selectpicker"
                                                        data-live-search="true" placeholder="Enter  Supplier "
                                                        name="supplier_id">
                                                        @foreach ($suppliers as $supplier)
                                                            <option value="{{ $supplier->id }}">{{ $supplier->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="title" class="required">title</label>
                                                    <input id="title" required type="text" class="form-control"
                                                        placeholder="Enter  title" name="title">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="author" class="required">author</label>
                                                    <select id="unit" required type="text" class="form-control selectpicker" data-live-search="true"
                                                        placeholder="Enter  " name="author">
                                                        <option selected> - select Author - </option>
                                                        @foreach ($authors as $author)
                                                        <option value="{{$author->id}}">{{$author->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            {{-- <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="author" class="required">author</label>
                                                    <input id="author" required type="text" class="form-control"
                                                        placeholder="Enter  author" name="author">
                                                </div>
                                            </div> --}}

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="isbn" class="optional">isbn</label>
                                                    <input id="isbn"  type="number" class="form-control"
                                                        placeholder="Enter  isbn" name="isbn">
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="price" class="required">MRP</label>
                                                    <input id="price" required type="number" class="form-control"
                                                        placeholder="Enter  price" name="price">
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="brand_id" class="required">Gst Slab</label>
                                                    <select id="brand_id" required type="text"
                                                        class="form-control selectpicker" data-live-search="true"
                                                        placeholder="Enter  category " name="gst_slab_id">
                                                        <option selected disabled> - Select Category - </option>
                                                        @foreach ($gst_slabs as $slab)
                                                            <option value="{{ $slab->id }}">{{ $slab->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="publication_date"
                                                        class="required">publication_date</label>

                                                    <input id="publication_date" required type="date"
                                                        class="form-control" placeholder="Enter  publication_date"
                                                        name="publication_date">
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="language" class="required">Language</label>
                                                    <select id="language" required type="text" class="form-control selectpicker" data-live-search="true"
                                                        placeholder="Enter language " name="language">
                                                        <option selected> - select language - </option>
                                                        {{-- @foreach ($units as $unit) --}}
                                                        <option value="Bengali">Bengali</option>
                                                        <option value="Hindi">Hindi</option>
                                                        <option value="English">English</option>
                                                        {{-- @endforeach --}}
                                                    </select>
                                                </div>
                                            </div>
                                            {{-- 
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="quantity" class="required">Quantity in stock</label>
                                                    <input id="quantity" required type="text" class="form-control"
                                                        placeholder="" name="quantity">
                                                </div>
                                            </div> --}}

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="unit" class="required">Unit</label>
                                                    <select id="unit" required type="text" class="form-control"
                                                        placeholder="Enter unit " name="unit">
                                                        <option selected> - Pieces - </option>
                                                        {{-- @foreach ($units as $unit) --}}
                                                        {{-- <option value="">Pieces</option> --}}
                                                        {{-- @endforeach --}}
                                                    </select>
                                                </div>
                                            </div>

                                            {{-- <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="quantity" class="required">Quantity in stock</label>
                                                    <input id="quantity" required type="text" class="form-control"
                                                        placeholder="" name="quantity">
                                                </div>
                                            </div> --}}

                                            {{-- <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="weight" class="required">weight</label>
                                                    <input id="weight" required type="text" class="form-control"
                                                        placeholder="Enter  weight" name="weight">
                                                </div>
                                            </div> --}}

                                            {{-- <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="dimensions" class="required">dimensions</label>
                                                    <input id="dimensions" required type="text" class="form-control"
                                                        placeholder="Enter  dimensions" name="dimensions">
                                                </div>
                                            </div> --}}

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="optional">pages</label>
                                                    <input id="pages" type="text" class="form-control"
                                                        placeholder="Enter  pages" name="pages">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="required">Images</label>
                                                    <input onchange="image_check(this, 1024)" title="upload icon images"
                                                        required class="form-control" type="file" name="image"
                                                        placeholder="Enter state">
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="status" class="required">Status</label>
                                                    <select id="unit" required type="text" class="form-control"
                                                        placeholder="Enter status " name="status">
                                                        <option selected> - select status - </option>
                                                        {{-- @foreach ($units as $unit) --}}
                                                        <option value="active" selected>Active</option>
                                                        <option value="inactive">InActive</option>
                                                        {{-- @endforeach --}}
                                                    </select>
                                                </div>
                                            </div>

                              
                              
                              
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="optional"> Description</label>
                                                    <textarea type="text" class="form-control" placeholder="Enter name" name="description"></textarea>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="col-sm-12 mt-3 text-center">
                                                <button onclick="ajaxCall('form_data','{{ route('books.index')}}')" type="button"
                                                 class="btn btn-success btn-rounded"><i class="uil uil-check me-2"></i>Add {{ $page }}</button>
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
<!-- // model -->
