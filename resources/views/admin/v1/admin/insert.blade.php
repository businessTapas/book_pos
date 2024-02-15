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
                                        <h4 class="card-title text-capitalize">Create {{ $page }} User </h4>
                                    </div>


                                    <a class="btn btn-primary add-list btn-sm text-white"
                                        href="{{ route('admin.index', $type) }}"><i class="las la-plus mr-3"></i>Back to
                                        {{ $page }} List</a>
                                </div>

                                <div class="card-body">
                                    <form id="form_data" action="{{ route('admin.store') }}" method="POST">
                                        <div class="row">
                                            @csrf

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="type" class="required">Choose User Type</label>
                                                    <select
                                                        id="type" required type="text" class="form-control"
                                                        name="type">
                                                        <option value="{{ $type }}"> {{ $type }} </option>

                                                    </select>
                                                </div>
                                            </div>
                                      
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="role_id" class="required">Choose User Role</label>
                                                    <select id="role_id" required type="text" class="form-control"
                                                        placeholder="Enter  category " name="role_id">
                                                        <option selected disabled> - Select Role - </option>
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="required">Name</label>
                                                    <input required type="text" class="form-control"
                                                        placeholder="Enter Full Name" name="name">
                                                </div>
                                            </div>


                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="required">email</label>
                                                    <input required type="text" class="form-control"
                                                        placeholder="Enter  email address" name="email">

                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="required">mobile</label>
                                                    <input required type="text" class="form-control"
                                                        placeholder="Enter 10 digit valid  mobile number" name="mobile">
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="required">password</label>
                                                    <input required type="password" class="form-control"
                                                        placeholder="Enter  password" name="password">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="required">Confirmed Passoword</label>
                                                    <input required type="password" class="form-control"
                                                        placeholder="Enter  Confirmed Passoword"
                                                        name="password_confirmation">
                                                </div>
                                            </div>


                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="optional"> Description</label>
                                                    <textarea type="text" class="form-control" placeholder="Enter name" name="description"></textarea>
                                                </div>
                                            </div>

                                            <div class="col-sm-12 text-center">
                                                <button type="button" onclick="ajaxCall('form_data')"
                                                    class="btn btn-primary mt-2">Add
                                                    {{ $page }}</button>
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
<script>
    selectDrop('form_data','{{ route('admin.get_role') }}','role_id')
</script>
<!-- // model -->
