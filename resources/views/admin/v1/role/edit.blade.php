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
                                    <form id="form_data" action="{{ route('roles.update') }}" method="POST">
                                        <div class="row">
                                            @csrf


                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="name" class="required">Role For</label>
                                                    <input required type="text" class="form-control"
                                                        value="{{ $data->type }}" readonly>
                                                    <input type="hidden" value="{{ $data->id }}" name="id"
                                                        id="id">
                                                </div>
                                            </div>


                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="name" class="required">Role name</label>
                                                    <input required type="text" class="form-control"
                                                        value="{{ $data->name }}" readonly>
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
                                                                                id="u-create"
                                                                                {{ $data->permission->contains('name', 'admin.create') ? 'checked' : '' }}>
                                                                            <label class="form-check-label" for="u-create">
                                                                                Create
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check me-3 me-lg-5">
                                                                            <input class="form-check-input" type="checkbox"
                                                                                name="permission[]" value="admin.update"
                                                                                id="u-update"
                                                                                {{ $data->permission->contains('name', 'admin.update') ? 'checked' : '' }}>
                                                                            <label class="form-check-label" for="u-update">
                                                                                Update
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check me-3 me-lg-5">
                                                                            <input class="form-check-input " type="checkbox"
                                                                                name="permission[]" value="admin.delete"
                                                                                id="u-delete"
                                                                                {{ $data->permission->contains('name', 'admin.delete') ? 'checked' : '' }}>
                                                                            <label class="form-check-label" for="u-delete">
                                                                                Delete
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="checkbox"
                                                                                name="permission[]" value="admin.status"
                                                                                id="u-status"
                                                                                {{ $data->permission->contains('name', 'admin.status') ? 'checked' : '' }}>
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
                                                                                name="permission[]" id="b-create"
                                                                                {{ $data->permission->contains('name', 'books.create') ? 'checked' : '' }}>
                                                                            <label class="form-check-label" for="b-create">
                                                                                Create
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check me-3 me-lg-5">
                                                                            <input class="form-check-input"
                                                                                value="books.update" type="checkbox"
                                                                                name="permission[]" id="b-update"
                                                                                {{ $data->permission->contains('name', 'books.update') ? 'checked' : '' }}>
                                                                            <label class="form-check-label"
                                                                                for="b-update">
                                                                                Update
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check me-3 me-lg-5">
                                                                            <input class="form-check-input "
                                                                                type="checkbox" name="permission[]"
                                                                                value="books.delete" id="b-delete"
                                                                                {{ $data->permission->contains('name', 'books.delete') ? 'checked' : '' }}>
                                                                            <label class="form-check-label"
                                                                                for="b-delete">
                                                                                Delete
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input"
                                                                                type="checkbox" name="permission[]"
                                                                                value="books.status" id="b-status"
                                                                                {{ $data->permission->contains('name', 'books.status') ? 'checked' : '' }}>
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
                                                                                name="permission[]" id="c-create"
                                                                                {{ $data->permission->contains('name', 'categories.create') ? 'checked' : '' }}>
                                                                            <label class="form-check-label"
                                                                                for="c-create">
                                                                                Create
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check me-3 me-lg-5">
                                                                            <input class="form-check-input"
                                                                                value="categories.update" type="checkbox"
                                                                                name="permission[]" id="c-update"
                                                                                {{ $data->permission->contains('name', 'categories.update') ? 'checked' : '' }}>
                                                                            <label class="form-check-label"
                                                                                for="c-update">
                                                                                Update
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check me-3 me-lg-5">
                                                                            <input class="form-check-input "
                                                                                value="categories.delete" type="checkbox"
                                                                                name="permission[]" id="c-delete"
                                                                                {{ $data->permission->contains('name', 'categories.delete') ? 'checked' : '' }}>
                                                                            <label class="form-check-label"
                                                                                for="c-delete">
                                                                                Delete
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input"
                                                                                value="categories.status" type="checkbox"
                                                                                name="permission[]" id="c-status"
                                                                                {{ $data->permission->contains('name', 'categories.status') ? 'checked' : '' }}>
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
                                                                                name="permission[]" id="brand-create"
                                                                                {{ $data->permission->contains('name', 'brand.create') ? 'checked' : '' }}>
                                                                            <label class="form-check-label"
                                                                                for="brand-create">
                                                                                Create
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check me-3 me-lg-5">
                                                                            <input class="form-check-input"
                                                                                value="brand.update" type="checkbox"
                                                                                name="permission[]" id="brand-update"
                                                                                {{ $data->permission->contains('name', 'brand.update') ? 'checked' : '' }}>
                                                                            <label class="form-check-label"
                                                                                for="brand-update">
                                                                                Update
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check me-3 me-lg-5">
                                                                            <input class="form-check-input "
                                                                                value="brand.delete" type="checkbox"
                                                                                name="permission[]" id="brand-delete"
                                                                                {{ $data->permission->contains('name', 'brand.delete') ? 'checked' : '' }}>
                                                                            <label class="form-check-label"
                                                                                for="brand-delete">
                                                                                Delete
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input"
                                                                                value="brand.status" type="checkbox"
                                                                                name="permission[]" id="brand-status"
                                                                                {{ $data->permission->contains('name', 'brand.status') ? 'checked' : '' }}>
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
                                                <a class="btn btn-secondary mt-2"
                                                    href="{{ route('roles.index') }}">Cancel</a>

                                                <button type="submit" class="btn btn-primary mt-2">Update
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
<!-- // model -->
