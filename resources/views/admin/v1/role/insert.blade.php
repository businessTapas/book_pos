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
                                        href="{{ route('roles.index') }}"><i class="las la-plus mr-3"></i>Back to
                                        {{ $page }} List</a>
                                </div>

                                <!-- Modal body -->
                                <div class="card-body">
                                    <form id="form_data" action="{{ route('roles.store') }}" method="POST">
                                        <div class="row">
                                            @csrf


                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="type" class="required"> Role for</label>
                                                    <select  id="type" required type="text" class="form-control"
                                                        placeholder="Enter  Type " name="type">
                                                        <option selected disabled> - Select Type - </option>
                                                        <option value="central-store">Central Store</option>
                                                        <option value="retail-store">Retail Store</option>
                                                        <option value="publisher">Publisher</option>
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="name" class="required">Role name</label>
                                                    <input id="name" required type="text" class="form-control"
                                                        placeholder="Enter Role  name" name="name">
                                                </div>
                                            </div>




                                            <div class="col-12">
                                                <h4>Role Permissions</h4>
                                                <!-- Permission table -->
                                                <div class="table-responsive">
                                                    <table class="table table-flush-spacing">
                                                        <tbody>
                                                            <tr>
                                                                <td class="text-nowrap fw-medium">Administrator Access
                                                                    <i class="bx bx-info-circle bx-xs"
                                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                                        aria-label="Allows a full access to the system"
                                                                        data-bs-original-title="Allows a full access to the system"></i>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            id="selectAll">
                                                                        <label class="form-check-label" for="selectAll">
                                                                            Select All
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-nowrap fw-medium">User Management</td>
                                                                <td>
                                                                    <div class="d-flex">
                                                                        <div class="form-check me-3 me-lg-5">
                                                                            <input class="form-check-input" type="checkbox"
                                                                                name="permission[]" value="admin.create"
                                                                                id="u-create">
                                                                            <label class="form-check-label" for="u-create">
                                                                                Create
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check me-3 me-lg-5">
                                                                            <input class="form-check-input" type="checkbox"
                                                                                name="permission[]" value="admin.update"
                                                                                id="u-update">
                                                                            <label class="form-check-label" for="u-update">
                                                                                Update
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check me-3 me-lg-5">
                                                                            <input class="form-check-input " type="checkbox"
                                                                                name="permission[]" value="admin.delete"
                                                                                id="u-delete">
                                                                            <label class="form-check-label" for="u-delete">
                                                                                Delete
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="checkbox"
                                                                                name="permission[]" value="admin.status"
                                                                                id="u-status">
                                                                            <label class="form-check-label" for="u-status">
                                                                                Status
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-nowrap fw-medium">Books Management</td>
                                                                <td>
                                                                    <div class="d-flex">
                                                                        <div class="form-check me-3 me-lg-5">
                                                                            <input class="form-check-input"
                                                                                value="books.create" type="checkbox"
                                                                                name="permission[]" id="b-create">
                                                                            <label class="form-check-label" for="b-create">
                                                                                Create
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check me-3 me-lg-5">
                                                                            <input class="form-check-input"
                                                                                value="books.update" type="checkbox"
                                                                                name="permission[]" id="b-update">
                                                                            <label class="form-check-label"
                                                                                for="b-update">
                                                                                Update
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check me-3 me-lg-5">
                                                                            <input class="form-check-input "
                                                                                type="checkbox" name="permission[]"
                                                                                value="books.delete" id="b-delete">
                                                                            <label class="form-check-label"
                                                                                for="b-delete">
                                                                                Delete
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input"
                                                                                type="checkbox" name="permission[]"
                                                                                value="books.status" id="b-status">
                                                                            <label class="form-check-label"
                                                                                for="b-status">
                                                                                Status
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-nowrap fw-medium">Category</td>
                                                                <td>
                                                                    <div class="d-flex">
                                                                        <div class="form-check me-3 me-lg-5">
                                                                            <input class="form-check-input"
                                                                                value="categories.create" type="checkbox"
                                                                                name="permission[]" id="c-create">
                                                                            <label class="form-check-label"
                                                                                for="c-create">
                                                                                Create
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check me-3 me-lg-5">
                                                                            <input class="form-check-input"
                                                                                value="categories.update" type="checkbox"
                                                                                name="permission[]" id="c-update">
                                                                            <label class="form-check-label"
                                                                                for="c-update">
                                                                                Update
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check me-3 me-lg-5">
                                                                            <input class="form-check-input "
                                                                                value="categories.delete" type="checkbox"
                                                                                name="permission[]" id="c-delete">
                                                                            <label class="form-check-label"
                                                                                for="c-delete">
                                                                                Delete
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input"
                                                                                value="categories.status" type="checkbox"
                                                                                name="permission[]" id="c-status">
                                                                            <label class="form-check-label"
                                                                                for="c-status">
                                                                                Status
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-nowrap fw-medium"> Brand</td>
                                                                <td>
                                                                    <div class="d-flex">
                                                                        <div class="form-check me-3 me-lg-5">
                                                                            <input class="form-check-input"
                                                                                value="brand.create" type="checkbox"
                                                                                name="permission[]" id="brand-create">
                                                                            <label class="form-check-label"
                                                                                for="brand-create">
                                                                                Create
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check me-3 me-lg-5">
                                                                            <input class="form-check-input"
                                                                                value="brand.update" type="checkbox"
                                                                                name="permission[]" id="brand-update">
                                                                            <label class="form-check-label"
                                                                                for="brand-update">
                                                                                Update
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check me-3 me-lg-5">
                                                                            <input class="form-check-input "
                                                                                value="brand.delete" type="checkbox"
                                                                                name="permission[]" id="brand-delete">
                                                                            <label class="form-check-label"
                                                                                for="brand-delete">
                                                                                Delete
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input"
                                                                                value="brand.status"
                                                                                type="checkbox" name="permission[]"
                                                                                id="brand-status">
                                                                            <label class="form-check-label"
                                                                                for="brand-status">
                                                                                Status
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!-- Permission table -->
                                            </div>


                                            <hr>
                                            <div class="col-sm-12 mt-3 text-center">
                                                <a class="btn btn-secondary mt-2" href="{{ route('roles.index') }}">Cancel</a>

                                                <button type="button" onclick="ajaxCall('form_data')"
                                                    class="btn btn-primary mt-2">Add {{ $page }}</button>


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
