
<?php include 'header.php'; ?>

<!-- ========== Left Sidebar Start ========== -->
    <?php include 'sidebar.php'; ?>

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header justify-content-between d-flex align-items-center">
                                        <h4 class="card-title">Textual Inputs</h4>
                                    </div><!-- end card header -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="mb-3 row">
                                                    <label for="example-text-input" class="col-md-2 col-form-label">Text</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" type="text" value="Artisanal kale" id="example-text-input">
                                                    </div>
                                                </div><!-- end row -->
                                                <div class="mb-3 row">
                                                    <label for="example-search-input" class="col-md-2 col-form-label">Search</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" type="search" value="How do I shoot web" id="example-search-input">
                                                    </div>
                                                </div><!-- end row -->
                                                <div class="mb-3 row">
                                                    <label for="example-email-input" class="col-md-2 col-form-label">Email</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" type="email" value="bootstrap@example.com" id="example-email-input">
                                                    </div>
                                                </div><!-- end row -->
                                                <div class="mb-3 row">
                                                    <label for="example-url-input" class="col-md-2 col-form-label">URL</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" type="url" value="https://getbootstrap.com" id="example-url-input">
                                                    </div>
                                                </div><!-- end row -->
                                                <div class="mb-3 row">
                                                    <label for="example-tel-input" class="col-md-2 col-form-label">Telephone</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" type="tel" value="1-(555)-555-5555" id="example-tel-input">
                                                    </div>
                                                </div><!-- end row -->
                                                <div class="mb-3 row">
                                                    <label for="example-password-input" class="col-md-2 col-form-label">Password</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" type="password" value="hunter2" id="example-password-input">
                                                    </div>
                                                </div><!-- end row -->
                                                <div class="mb-3 row">
                                                    <label for="example-number-input" class="col-md-2 col-form-label">Number</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" type="number" value="42" id="example-number-input">
                                                    </div>
                                                </div><!-- end row -->
                                                <div class="mb-3 mb-lg-0 row">
                                                    <label for="example-datetime-local-input" class="col-md-2 col-form-label">Date and time</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" type="datetime-local" value="2019-08-19T13:45:00" id="example-datetime-local-input">
                                                    </div>
                                                </div><!-- end row -->
                                                <div class="row mb-3 mt-3 mt-xl-0">
                                                    <label for="example-date-input" class="col-md-2 col-form-label">Date</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" type="date" value="2019-08-19" id="example-date-input">
                                                    </div>
                                                </div><!-- end row -->
                                                <div class="row mb-3">
                                                    <label for="example-month-input" class="col-md-2 col-form-label">Month</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" type="month" value="2019-08" id="example-month-input">
                                                    </div>
                                                </div><!-- end row -->
                                                <div class="row mb-3">
                                                    <label for="example-week-input" class="col-md-2 col-form-label">Week</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" type="week" value="2019-W33" id="example-week-input">
                                                    </div>
                                                </div><!-- end row -->
                                                <div class="row mb-3">
                                                    <label for="example-time-input" class="col-md-2 col-form-label">Time</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" type="time" value="13:45:00" id="example-time-input">
                                                    </div>
                                                </div><!-- end row -->
                                                <div class="row mb-3">
                                                    <label for="example-color-input" class="col-md-2 col-form-label">Color picker</label>
                                                    <div class="col-md-10">
                                                        <input type="color" class="form-control form-control-color w-100" id="example-color-input" value="#776acf" title="Choose your color">
                                                    </div>
                                                </div><!-- end row -->
                                                <div class="row mb-3">
                                                    <label class="col-md-2 col-form-label">Select</label>
                                                    <div class="col-md-10">
                                                        <select class="form-select">
                                                            <option>Select</option>
                                                            <option>Large select</option>
                                                            <option>Small select</option>
                                                        </select>
                                                    </div>
                                                </div><!-- end row -->
                                                <div class="row">
                                                    <label for="exampleDataList" class="col-md-2 col-form-label">Datalists</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Type to search...">
                                                        <datalist id="datalistOptions">
                                                            <option value="San Francisco">
                                                            <option value="New York">
                                                            <option value="Seattle">
                                                            <option value="Los Angeles">
                                                            <option value="Chicago">
                                                        </datalist>
                                                    </div>
                                                </div><!-- end row -->
                                            </div><!-- end col -->
                                        </div><!-- end row -->
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->
                        </div><!-- end row -->

                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card card-h-100">
                                    <div class="card-header justify-content-between d-flex align-items-center">
                                        <h4 class="card-title">Form Layouts</h4>
                                    </div><!-- end card header -->
                                    <div class="card-body">
                                        <div>
                                            <form>
                                                <div class="mb-3">
                                                    <label class="form-label" for="formrow-firstname-input">First name</label>
                                                    <input type="text" class="form-control" id="formrow-firstname-input" placeholder="Enter First Name">
                                                </div>
    
                                                <div class="row">                                                            
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="formrow-email-input">Email</label>
                                                            <input type="email" class="form-control" id="formrow-email-input" placeholder="Enter E-mail">
                                                        </div>
                                                    </div><!-- end col -->
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="formrow-password-input">Password</label>
                                                            <input type="password" class="form-control" id="formrow-password-input" placeholder="Enter Password">
                                                        </div>
                                                    </div><!-- end col -->
                                                </div><!-- end row -->
    
                                                <div class="form-group">
                                                    <div class="form-check mt-3">
                                                        <input type="checkbox" class="form-check-input" id="formrow-customCheck">
                                                        <label class="form-check-label" for="formrow-customCheck">Check me out</label>
                                                    </div>
                                                </div>
                                                <div class="mt-4">
                                                    <button type="submit" class="btn btn-primary w-md">Submit</button>
                                                </div>
                                            </form><!-- end form -->
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->

                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-header justify-content-between d-flex align-items-center">
                                        <h4 class="card-title">Horizontal Form</h4>
                                    </div><!-- end card header -->
                                    <div class="card-body">          
                                    <form>
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">First name</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="horizontal-firstname-input" placeholder="Enter First Name">
                                            </div>
                                        </div><!-- end row -->
                                        <div class="row mb-4">
                                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Email</label>
                                            <div class="col-sm-9">
                                                <input type="email" class="form-control" id="horizontal-email-input" placeholder="Enter E-mail">
                                            </div>
                                        </div><!-- end row -->
                                        <div class="row mb-4">
                                            <label for="horizontal-password-input" class="col-sm-3 col-form-label">Password</label>
                                            <div class="col-sm-9">
                                                <input type="password" class="form-control" id="horizontal-password-input" placeholder="ENter Password">
                                            </div>
                                        </div><!-- end row -->

                                        <div class="row justify-content-end">
                                            <div class="col-sm-9">
                                                <div class="form-check mb-4">
                                                    <input type="checkbox" class="form-check-input" id="horizontal-customCheck">
                                                    <label class="form-check-label" for="horizontal-customCheck">Remember me</label>
                                                </div>
                                                <div>
                                                    <button type="submit" class="btn btn-primary w-md">Submit</button>
                                                </div>
                                            </div><!-- end col -->
                                        </div><!-- end row -->
                                    </form><!-- end form -->
                                    </div>
                                </div><!-- end card -->
                            </div><!-- end col -->
                        </div><!-- end row -->
                        <!-- End Form Layout -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header justify-content-between d-flex align-items-center">
                                        <h4 class="card-title"> Inline Forms </h4>
                                    </div><!-- end card header -->
                                    <div class="card-body">            
                                        <form class="row gx-3 gy-2 align-items-center">
                                            <div class="col-sm-5">
                                                <label class="visually-hidden" for="specificSizeInputName">Name</label>
                                                <input type="text" class="form-control" id="specificSizeInputName" placeholder="Enter Name">
                                            </div>
                                            <!-- end col -->
                                            <div class="col-sm-3">
                                                <label class="visually-hidden" for="specificSizeInputGroupUsername">Username</label>
                                                <div class="input-group">
                                                <div class="input-group-text">@</div>
                                                <input type="text" class="form-control" id="specificSizeInputGroupUsername" placeholder="Username">
                                                </div>
                                            </div>
                                            <!-- end col -->
                                            <div class="col-auto">
                                                <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="autoSizingCheck2">
                                                <label class="form-check-label" for="autoSizingCheck2">
                                                    Remember me
                                                </label>
                                                </div>
                                            </div>
                                            <!-- end col -->
                                            <div class="col-auto">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                            <!-- end col -->
                                        </form><!-- end form -->
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->
                        </div><!-- end row -->

                         <!-- Start Form Sizing -->
                         <div class="row">
                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-header justify-content-between d-flex align-items-center">
                                        <h4 class="card-title">Sizing</h4>
                                    </div><!-- end card header -->
                                    <div class="card-body">
                                        <form>
                                            <div class="mb-4">
                                                <label class="form-label" for="default-input">Default input</label>
                                                <input class="form-control" type="text" id="default-input" placeholder="Default input">
                                            </div>

                                            <div class="mb-4">
                                                <label class="form-label" for="form-sm-input">Form Small input</label>
                                                <input class="form-control form-control-sm" type="text" id="form-sm-input" placeholder=".form-control-sm">
                                            </div>

                                            <div class="mb-0">
                                                <label class="form-label" for="form-lg-input">Form Large input</label>
                                                <input class="form-control form-control-lg" type="text" id="form-lg-input" placeholder=".form-control-lg">
                                            </div>

                                        </form><!-- end form -->
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->

                            <div class="col-xl-6">
                                <div class="card card-h-100">
                                    <div class="card-header justify-content-between d-flex align-items-center">
                                        <h4 class="card-title">Switches</h4>
                                    </div><!-- end card header -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div>
                                                    <h5 class="font-size-13 text-uppercase text-muted mb-4"><i class="mdi mdi-chevron-right text-primary me-1"></i>Switch Examples</h5>
                                                    <div class="form-check form-switch form-switch-md mb-2">
                                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                                        <label class="form-check-label" for="flexSwitchCheckDefault">Default switch checkbox input</label>
                                                    </div>

                                                    <div class="form-check form-switch form-switch-md mb-2">
                                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                                                        <label class="form-check-label" for="flexSwitchCheckChecked">Checked switch checkbox input</label>
                                                    </div>

                                                    <div class="form-check form-switch form-switch-md mb-2">
                                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDisabled" disabled>
                                                        <label class="form-check-label" for="flexSwitchCheckDisabled">Disabled switch checkbox input</label>
                                                    </div>

                                                    <div class="form-check form-switch form-switch-md">
                                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckCheckedDisabled" checked disabled>
                                                        <label class="form-check-label" for="flexSwitchCheckCheckedDisabled">Disabled checked switch checkbox input</label>
                                                    </div>
                                                </div>
                                            </div><!-- end col -->
                                            <div class="col-md-6">
                                                <div class="mt-4 mt-md-0">
                                                    <h5 class="font-size-13 text-uppercase text-muted mb-4"><i class="mdi mdi-chevron-right text-primary me-1"></i>Switch Sizes</h5>
        
                                                    <div class="form-check form-switch mb-2" dir="ltr">
                                                        <input type="checkbox" class="form-check-input" id="customSwitchsizesm" checked>
                                                        <label class="form-check-label" for="customSwitchsizesm">Small Size Switch</label>
                                                    </div>
        
                                                    <div class="form-check form-switch form-switch-md mb-2" dir="ltr">
                                                        <input type="checkbox" class="form-check-input" id="customSwitchsizemd">
                                                        <label class="form-check-label" for="customSwitchsizemd">Medium Size Switch</label>
                                                    </div>
        
                                                    <div class="form-check form-switch form-switch-lg mb-0" dir="ltr">
                                                        <input type="checkbox" class="form-check-input" id="customSwitchsizelg" checked>
                                                        <label class="form-check-label" for="customSwitchsizelg">Large Size Switch</label>
                                                    </div>
                                                </div>
                                            </div><!-- end col -->
                                        </div><!-- end row -->
                                    </div><!-- end card body-->
                                </div><!-- end card -->
                            </div><!-- end col -->
                        </div><!-- end row -->
                        <!-- End Form Sizing -->

                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-header justify-content-between d-flex align-items-center">
                                        <h4 class="card-title">Checkboxes</h4>
                                    </div><!-- end card header -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div>
                                                    <h5 class="font-size-13 text-uppercase text-muted mb-4"><i class="mdi mdi-chevron-right text-primary me-1"></i> Form Checkboxes</h5>
                                                    <div class="form-check mb-2">
                                                        <input class="form-check-input" type="checkbox" id="formCheck1">
                                                        <label class="form-check-label" for="formCheck1">
                                                            Form Checkbox
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="formCheck2" checked>
                                                        <label class="form-check-label" for="formCheck2">
                                                            Form Checkbox checked
                                                        </label>
                                                    </div>
                                                </div>
                                            </div><!-- end col -->
                                            
                                            <div class="col-md-6 ms-auto">
                                                <div class="mt-md-0 mt-4">
                                                    <h5 class="font-size-13 text-uppercase text-muted mb-4"><i class="mdi mdi-chevron-right text-primary me-1"></i> Form Checkboxes Right</h5>
                                                    <div>
                                                        <div class="form-check form-check-right mb-2">
                                                            <input class="form-check-input" type="checkbox" id="formCheckRight1">
                                                            <label class="form-check-label" for="formCheckRight1">
                                                                Form Checkbox Right
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input" type="checkbox" id="formCheckRight2"
                                                                checked>
                                                            <label class="form-check-label" for="formCheckRight2">
                                                                Form Checkbox Right checked
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- end col -->
                                        </div><!-- end row -->
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->

                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-header justify-content-between d-flex align-items-center">
                                        <h4 class="card-title">Radio</h4>
                                    </div><!-- end card header -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div>
                                                    <h5 class="font-size-13 text-uppercase text-muted mb-4"><i class="mdi mdi-chevron-right text-primary me-1"></i> Form Radios</h5>
                                                    <div class="form-check mb-2">
                                                        <input class="form-check-input" type="radio" name="formRadios"
                                                            id="formRadios1" checked>
                                                        <label class="form-check-label" for="formRadios1">
                                                            Form Radio
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="formRadios"
                                                            id="formRadios2">
                                                        <label class="form-check-label" for="formRadios2">
                                                            Form Radio checked
                                                        </label>
                                                    </div>
                                                </div>
                                            </div><!-- end col -->

                                            <div class="col-md-6 ms-auto">
                                                <div class="mt-md-0 mt-4">
                                                    <h5 class="font-size-13 text-uppercase text-muted mb-4"><i class="mdi mdi-chevron-right text-primary me-1"></i> Form Radios Right</h5>
                                                    <div>
                                                        <div class="form-check form-check-right mb-2">
                                                            <input class="form-check-input" type="radio" name="formRadiosRight"
                                                                id="formRadiosRight1" checked>
                                                            <label class="form-check-label" for="formRadiosRight1">
                                                                Form Radio Right
                                                            </label>
                                                        </div>
                                                    </div>

                                                    <div>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input" type="radio" name="formRadiosRight"
                                                                id="formRadiosRight2">
                                                            <label class="form-check-label" for="formRadiosRight2">
                                                                Form Radio Right checked
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- end col -->
                                        </div><!-- end row -->
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->
                        </div><!-- end row -->

                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-header justify-content-between d-flex align-items-center">
                                        <h4 class="card-title">Range Inputs</h4>
                                    </div><!-- end card header -->
                                    <div class="card-body">
                                        <div>
                                            <h5 class="font-size-14">Example</h5>
                                            <input type="range" class="form-range" id="formControlRange">
                                        </div>
                                        <div class="mt-4">
                                            <h5 class="font-size-14">Disabled</h5>
                                            <input type="range" class="form-range" id="disabledRange" disabled>
                                        </div>
                                        <div class="mt-4">
                                            <h5 class="font-size-14">Custom Range</h5>
                                            <input type="range" class="form-range" id="customRange1">
                                            <input type="range" class="form-range mt-2" min="0" max="5" id="customRange2">
                                        </div>
                                    </div><!-- end cardbody -->
                                </div><!-- end card -->
                            </div><!-- end col -->

                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-header justify-content-between d-flex align-items-center">
                                        <h4 class="card-title">File Browser</h4>
                                    </div><!-- end card header -->
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label for="formFile" class="form-label">Default file input example</label>
                                            <input class="form-control" type="file" id="formFile">
                                        </div>
                                        <div class="mb-3">
                                            <label for="formFileSm" class="form-label">Small file input example</label>
                                            <input class="form-control form-control-sm" id="formFileSm" type="file">
                                        </div>
                                        <div>
                                            <label for="formFileLg" class="form-label">Large file input example</label>
                                            <input class="form-control form-control-lg" id="formFileLg" type="file">
                                        </div>
                                    </div><!-- end cardbody -->
                                </div><!-- end card -->
                            </div><!-- end col -->
                        </div><!-- end row -->

                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-header justify-content-between d-flex align-items-center">
                                        <h4 class="card-title">Form Floationg</h4>
                                    </div><!-- end card header -->
                                    <div class="card-body">
                                        <div class="form-floating mb-3">
                                            <input type="email" class="form-control" id="floatingInput"
                                                placeholder="name@example.com">
                                            <label for="floatingInput">Email address</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="password" class="form-control" id="floatingPassword"
                                                placeholder="Password">
                                            <label for="floatingPassword">Password</label>
                                        </div>
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
                                                style="height: 100px"></textarea>
                                            <label for="floatingTextarea2">Comments</label>
                                        </div>
                                    </div><!-- end cardbody -->
                                </div><!-- end card -->
                            </div><!-- end col -->
                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-header justify-content-between d-flex align-items-center">
                                        <h4 class="card-title">Select Floationg</h4>
                                    </div><!-- end card header -->
                                    <div class="card-body">
                                        <div class="form-floating mb-3">
                                            <input type="email" class="form-control" id="floatingInputGrid"
                                                placeholder="name@example.com" value="mdo@example.com">
                                            <label for="floatingInputGrid">Email address</label>
                                        </div>
            
                                        <div class="form-floating mb-3">
                                            <select class="form-select" id="floatingSelectGrid"
                                                aria-label="Floating label select example">
                                                <option selected>Open this select menu</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                            <label for="floatingSelectGrid">Works with selects</label>
                                        </div>
                                        <div class="form-floating">
                                            <select class="form-select" id="floatingSelect"
                                                aria-label="Floating label select example">
                                                <option selected>Open this select menu</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                            <label for="floatingSelect">Works with selects</label>
                                        </div>
                                    </div><!-- end cardbody -->
                                </div><!-- end card -->
                            </div><!-- end col -->
                        </div><!-- end row -->

                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-header justify-content-between d-flex align-items-center">
                                        <h4 class="card-title">Bootstrap Validation - Custom Style</h4>
                                    </div><!-- end card header -->
                                    <div class="card-body">
                                        <form class="needs-validation" novalidate="">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="validationCustom01">First name</label>
                                                        <input type="text" class="form-control" id="validationCustom01" placeholder="First name" value="Mark" required="">
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                </div><!-- end col -->
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="validationCustom02">Last name</label>
                                                        <input type="text" class="form-control" id="validationCustom02" placeholder="Last name" value="Otto" required="">
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                </div><!-- end col -->
                                            </div><!-- end row -->
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="validationCustom03">City</label>
                                                        <input type="text" class="form-control" id="validationCustom03" placeholder="City" required="">
                                                        <div class="invalid-feedback">
                                                            Please provide a valid city.
                                                        </div>
                                                    </div>
                                                </div><!-- end col -->
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="validationCustom04">State</label>
                                                        <input type="text" class="form-control" id="validationCustom04" placeholder="State" required="">
                                                        <div class="invalid-feedback">
                                                            Please provide a valid state.
                                                        </div>
                                                    </div>
                                                </div><!-- end col -->
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="validationCustom05">Zip</label>
                                                        <input type="text" class="form-control" id="validationCustom05" placeholder="Zip" required="">
                                                        <div class="invalid-feedback">
                                                            Please provide a valid zip.
                                                        </div>
                                                    </div>
                                                </div><!-- end col -->
                                            </div><!-- end row -->
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="mb-3">
                                                        <div class="form-check">
                                                            <input type="checkbox" class="form-check-input" id="invalidCheck" required="">
                                                            <label class="form-check-label" for="invalidCheck">Agree to terms and conditions</label>
                                                            <div class="invalid-feedback">
                                                                You must agree before submitting.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- end col -->
                                            </div><!-- end row -->
                                            <button class="btn btn-primary" type="submit">Submit form</button>
                                        </form><!-- end form -->
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div> <!-- end col -->
        
                            <div class="col-xl-6">
                                <div class="card card-h-100">
                                    <div class="card-header justify-content-between d-flex align-items-center">
                                        <h4 class="card-title">Bootstrap Validation - Tooltips</h4>
                                    </div><!-- end card header -->
                                    <div class="card-body">
                                        <form class="needs-validation" novalidate="">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="mb-3 position-relative">
                                                        <label class="form-label" for="validationTooltip01">First name</label>
                                                        <input type="text" class="form-control" id="validationTooltip01" placeholder="First name" value="Mark" required="">
                                                        <div class="valid-tooltip">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                </div><!-- end col -->
                                                <div class="col-md-4">
                                                    <div class="mb-3 position-relative">
                                                        <label class="form-label" for="validationTooltip02">Last name</label>
                                                        <input type="text" class="form-control" id="validationTooltip02" placeholder="Last name" value="Otto" required="">
                                                        <div class="valid-tooltip">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                </div><!-- end col -->
                                                <div class="col-md-4">
                                                    <div class="mb-3 position-relative">
                                                        <label class="form-label" for="validationTooltipUsername">Username</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                            <span class="input-group-text" id="validationTooltipUsernamePrepend">@</span>
                                                            </div>
                                                            <input type="text" class="form-control" id="validationTooltipUsername" placeholder="Username" aria-describedby="validationTooltipUsernamePrepend" required="">
                                                            <div class="invalid-tooltip">
                                                            Please choose a unique and valid username.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- end col -->
                                            </div><!-- end row -->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3 position-relative">
                                                        <label class="form-label" for="validationTooltip03">City</label>
                                                        <input type="text" class="form-control" id="validationTooltip03" placeholder="City" required="">
                                                        <div class="invalid-tooltip">
                                                            Please provide a valid city.
                                                        </div>
                                                    </div>
                                                </div><!-- end col -->
                                                <div class="col-md-6">
                                                    <div class="mb-3 position-relative">
                                                        <label class="form-label" for="validationTooltip04">State</label>
                                                        <input type="text" class="form-control" id="validationTooltip04" placeholder="State" required="">
                                                        <div class="invalid-tooltip">
                                                            Please provide a valid state.
                                                        </div>
                                                    </div>
                                                </div><!-- end col -->
                                            </div><!-- end row -->
                                            <button class="btn btn-primary" type="submit">Submit form</button>
                                        </form><!-- end form -->
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div> <!-- end col -->
                        </div>

                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-header justify-content-between d-flex align-items-center">
                                        <h4 class="card-title">Css Switch</h4>
                                    </div><!-- end card header -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <h5 class="font-size-14 mb-3">Example Switch</h5>
                                                <div class="d-flex flex-wrap gap-2">
                                                    <input type="checkbox" id="switch1" switch="none" checked />
                                                    <label for="switch1" data-on-label="On" data-off-label="Off" class="mb-0"></label>

                                                    <input type="checkbox" id="switch2" switch="default" checked />
                                                    <label for="switch2" data-on-label="" data-off-label="" class="mb-0"></label>

                                                    <input type="checkbox" id="switch3" switch="bool" checked />
                                                    <label for="switch3" data-on-label="Yes" data-off-label="No" class="mb-0"></label>

                                                    <input type="checkbox" id="switch6" switch="primary" checked />
                                                    <label for="switch6" data-on-label="Yes" data-off-label="No" class="mb-0"></label>

                                                    <input type="checkbox" id="switch4" switch="success" checked />
                                                    <label for="switch4" data-on-label="Yes" data-off-label="No" class="mb-0"></label>

                                                    <input type="checkbox" id="switch7" switch="info" checked />
                                                    <label for="switch7" data-on-label="Yes" data-off-label="No" class="mb-0"></label>

                                                    <input type="checkbox" id="switch5" switch="warning" checked />
                                                    <label for="switch5" data-on-label="Yes" data-off-label="No" class="mb-0"></label>

                                                    <input type="checkbox" id="switch8" switch="danger" checked />
                                                    <label for="switch8" data-on-label="Yes" data-off-label="No" class="mb-0"></label>

                                                    <input type="checkbox" id="switch9" switch="dark" checked />
                                                    <label for="switch9" data-on-label="Yes" data-off-label="No" class="mb-0"></label>
                                                </div>
                                            </div><!-- end col -->

                                            <div class="col-xl-6">
                                                <div class="mt-4 mt-xl-0">
                                                    <h5 class="font-size-14 mb-3">Square Switch</h5>
                                                    <div class="d-flex flex-wrap gap-2">
                                                        <div class="square-switch">
                                                            <input type="checkbox" id="square-switch1" switch="none" checked />
                                                            <label for="square-switch1" data-on-label="On"
                                                                data-off-label="Off" class="mb-0"></label>
                                                        </div>
                                                        <div class="square-switch">
                                                            <input type="checkbox" id="square-switch2" switch="info" checked />
                                                            <label for="square-switch2" data-on-label="Yes"
                                                                data-off-label="No" class="mb-0"></label>
                                                        </div>
                                                        <div class="square-switch">
                                                            <input type="checkbox" id="square-switch3" switch="bool" checked />
                                                            <label for="square-switch3" data-on-label="Yes"
                                                                data-off-label="No" class="mb-0"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- end col -->
                                        </div><!-- end row -->
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->

                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-header justify-content-between d-flex align-items-center">
                                        <h4 class="card-title">Colorpicker</h4>
                                    </div><!-- end card header -->
                                    <div class="card-body">
                                        <div class="text-center">
                                            <div class="row">
                                                <div class="col-4">
                                                    <div>
                                                        <h5 class="font-size-14">Classic Demo</h5>
                                                        <div class="classic-colorpicker"></div>
                                                    </div>
                                                </div><!-- end col -->
                                                <div class="col-4">
                                                    <div>
                                                        <h5 class="font-size-14">Monolith Demo</h5>
                                                        <div class="monolith-colorpicker"></div>
                                                    </div>
                                                </div><!-- end col -->
                                                <div class="col-4">
                                                    <div>
                                                        <h5 class="font-size-14">Nano Demo</h5>
                                                        <div class="nano-colorpicker"></div>
                                                    </div>
                                                </div><!-- end col -->
                                            </div><!-- end row -->
                                        </div>
                                    </div><!-- end card body-->
                                </div><!-- end card -->
                            </div><!-- end col -->
                        </div><!-- end row -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header justify-content-between d-flex align-items-center">
                                        <h4 class="card-title">Choices</h4>
                                    </div><!-- end card header -->
                                    <div class="card-body">
                                        <div>
                                            <h5 class="font-size-14 mb-3">Single select input Example</h5>

                                            <div class="row">
                                                <div class="col-lg-4 col-md-6">
                                                    <div class="mb-3">
                                                        <label for="choices-single-default" class="form-label font-size-13 text-muted">Default</label>
                                                        <select class="form-control" data-trigger name="choices-single-default"
                                                            id="choices-single-default">
                                                            <option value="">This is a placeholder</option>
                                                            <option value="Choice 1">Choice 1</option>
                                                            <option value="Choice 2">Choice 2</option>
                                                            <option value="Choice 3">Choice 3</option>
                                                        </select>
                                                    </div>
                                                </div><!-- end col -->
                                                <div class="col-lg-4 col-md-6">
                                                    <div class="mb-3">
                                                        <label for="choices-single-groups" class="form-label font-size-13 text-muted">Option
                                                            groups</label>
                                                        <select class="form-control" data-trigger name="choices-single-groups"
                                                            id="choices-single-groups">
                                                            <option value="">Choose a city</option>
                                                            <optgroup label="UK">
                                                                <option value="London">London</option>
                                                                <option value="Manchester">Manchester</option>
                                                                <option value="Liverpool">Liverpool</option>
                                                            </optgroup>
                                                            <optgroup label="FR">
                                                                <option value="Paris">Paris</option>
                                                                <option value="Lyon">Lyon</option>
                                                                <option value="Marseille">Marseille</option>
                                                            </optgroup>
                                                            <optgroup label="DE" disabled>
                                                                <option value="Hamburg">Hamburg</option>
                                                                <option value="Munich">Munich</option>
                                                                <option value="Berlin">Berlin</option>
                                                            </optgroup>
                                                            <optgroup label="US">
                                                                <option value="New York">New York</option>
                                                                <option value="Washington" disabled>Washington</option>
                                                                <option value="Michigan">Michigan</option>
                                                            </optgroup>
                                                            <optgroup label="SP">
                                                                <option value="Madrid">Madrid</option>
                                                                <option value="Barcelona">Barcelona</option>
                                                                <option value="Malaga">Malaga</option>
                                                            </optgroup>
                                                            <optgroup label="CA">
                                                                <option value="Montreal">Montreal</option>
                                                                <option value="Toronto">Toronto</option>
                                                                <option value="Vancouver">Vancouver</option>
                                                            </optgroup>
                                                        </select>
                                                    </div>
                                                </div><!-- end col -->
                                                <div class="col-lg-4 col-md-6">
                                                    <div class="mb-3">
                                                        <label for="choices-single-no-search" class="form-label font-size-13 text-muted">Options added
                                                            via config with no search</label>
                                                        <select class="form-control" name="choices-single-no-search"
                                                            id="choices-single-no-search">
                                                            <option value="0">Zero</option>
                                                        </select>
                                                    </div>
                                                </div><!-- end col -->
                                                <div class="col-lg-4 col-md-6">
                                                    <div class="mb-3">
                                                        <label for="choices-single-no-sorting" class="form-label font-size-13 text-muted">Options added
                                                            via config with no search</label>
                                                        <select class="form-control" name="choices-single-no-sorting"
                                                            id="choices-single-no-sorting">
                                                            <option value="Madrid">Madrid</option>
                                                            <option value="Toronto">Toronto</option>
                                                            <option value="Vancouver">Vancouver</option>
                                                            <option value="London">London</option>
                                                            <option value="Manchester">Manchester</option>
                                                            <option value="Liverpool">Liverpool</option>
                                                            <option value="Paris">Paris</option>
                                                            <option value="Malaga">Malaga</option>
                                                            <option value="Washington" disabled>Washington</option>
                                                            <option value="Lyon">Lyon</option>
                                                            <option value="Marseille">Marseille</option>
                                                            <option value="Hamburg">Hamburg</option>
                                                            <option value="Munich">Munich</option>
                                                            <option value="Barcelona">Barcelona</option>
                                                            <option value="Berlin">Berlin</option>
                                                            <option value="Montreal">Montreal</option>
                                                            <option value="New York">New York</option>
                                                            <option value="Michigan">Michigan</option>
                                                        </select>
                                                    </div>
                                                </div><!-- end col -->
                                            </div>
                                            <!-- end row -->
                                        </div>
                                        <!-- Single select input Example -->


                                        <div class="mt-4">
                                            <h5 class="font-size-14 mb-3">Multiple select input</h5>
    
                                            <div class="row">
                                                <div class="col-lg-4 col-md-6">
                                                    <div class="mb-3">
                                                        <label for="choices-multiple-default" class="form-label font-size-13 text-muted">Default</label>
                                                        <select class="form-control" data-trigger
                                                            name="choices-multiple-default" id="choices-multiple-default" multiple>
                                                            <option value="Choice 1" selected>Choice 1</option>
                                                            <option value="Choice 2">Choice 2</option>
                                                            <option value="Choice 3">Choice 3</option>
                                                            <option value="Choice 4" disabled>Choice 4</option>
                                                        </select>
                                                    </div>
                                                </div><!-- end col -->
                                                <div class="col-lg-4 col-md-6">
                                                    <div class="mb-3">
                                                        <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">With
                                                            remove button</label>
                                                        <select class="form-control" name="choices-multiple-remove-button"
                                                            id="choices-multiple-remove-button"  multiple>
                                                            <option value="Choice 1" selected>Choice 1</option>
                                                            <option value="Choice 2">Choice 2</option>
                                                            <option value="Choice 3">Choice 3</option>
                                                            <option value="Choice 4">Choice 4</option>
                                                        </select>
                                                    </div>
                                                </div><!-- end col -->
                                                <div class="col-lg-4 col-md-6">
                                                    <div class="mb-3">
                                                        <label for="choices-multiple-groups" class="form-label font-size-13 text-muted">Option
                                                            groups</label>
                                                        <select class="form-control" name="choices-multiple-groups"
                                                            id="choices-multiple-groups"
                                                            multiple>
                                                            <option value="">Choose a city</option>
                                                            <optgroup label="UK">
                                                                <option value="London">London</option>
                                                                <option value="Manchester">Manchester</option>
                                                                <option value="Liverpool">Liverpool</option>
                                                            </optgroup>
                                                            <optgroup label="FR">
                                                                <option value="Paris">Paris</option>
                                                                <option value="Lyon">Lyon</option>
                                                                <option value="Marseille">Marseille</option>
                                                            </optgroup>
                                                            <optgroup label="DE" disabled>
                                                                <option value="Hamburg">Hamburg</option>
                                                                <option value="Munich">Munich</option>
                                                                <option value="Berlin">Berlin</option>
                                                            </optgroup>
                                                            <optgroup label="US">
                                                                <option value="New York">New York</option>
                                                                <option value="Washington" disabled>Washington</option>
                                                                <option value="Michigan">Michigan</option>
                                                            </optgroup>
                                                            <optgroup label="SP">
                                                                <option value="Madrid">Madrid</option>
                                                                <option value="Barcelona">Barcelona</option>
                                                                <option value="Malaga">Malaga</option>
                                                            </optgroup>
                                                            <optgroup label="CA">
                                                                <option value="Montreal">Montreal</option>
                                                                <option value="Toronto">Toronto</option>
                                                                <option value="Vancouver">Vancouver</option>
                                                            </optgroup>
                                                        </select>
                                                    </div>
                                                </div><!-- end col -->
                                            </div>
                                            <!-- end row -->
                                        </div>
                                        <!-- multi select input Example -->

                                        <div class="mt-4">
                                            <h5 class="font-size-14 mb-3">Text inputs</h5>
    
                                            <div class="row">
                                                <div class="col-lg-4 col-md-6">
                                                    <div class="mb-3">
                                                        <label for="choices-text-remove-button" class="form-label font-size-13 text-muted">Limited to 5
                                                            values with remove button</label>
                                                        <input class="form-control" id="choices-text-remove-button" type="text"
                                                            value="Task-1,Task-2" />
                                                    </div>
                                                </div>
                                                <!-- end col -->
    
                                                <div class="col-lg-4 col-md-6">
                                                    <div class="mb-3">
                                                        <label for="choices-text-unique-values" class="form-label font-size-13 text-muted">Unique values
                                                            only, no pasting</label>
                                                        <input class="form-control" id="choices-text-unique-values" type="text"
                                                            value="Project-A, Project-B" />
                                                    </div>
                                                </div>
                                                <!-- end col -->
                                            </div>
                                            <!-- end row -->
    
                                            <div>
                                                <label for="choices-text-disabled" class="form-label font-size-13 text-muted">Disabled</label>
                                                <input class="form-control" id="choices-text-disabled" type="text"
                                                    value="josh@joshuajohnson.co.uk, joe@bloggs.co.uk" />
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->
                        </div><!-- end row -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header justify-content-between d-flex align-items-center">
                                        <h4 class="card-title">Datepicker</h4>
                                    </div><!-- end card header -->
                                    <div class="card-body">
                                        <form action="#">
                                            <div class="row">
                                                <div class="col-xl-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Basic</label>
                                                        <input type="text" class="form-control" id="datepicker-basic">
                                                    </div>
                                                    <!-- end col -->
                                                    <div class="mb-3">
                                                        <label class="form-label">DateTime</label>
                                                        <input type="text" class="form-control" id="datepicker-datetime">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Human-friendly Dates</label>
                                                        <input type="text" class="form-control flatpickr-input" id="datepicker-humanfd">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">MinDate and MaxDate</label>
                                                        <input type="text" class="form-control" id="datepicker-minmax">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Disabling dates</label>
                                                        <input type="text" class="form-control" id="datepicker-disable">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Selecting multiple dates</label>
                                                        <input type="text" class="form-control" id="datepicker-multiple">
                                                    </div>                                                
                                                </div><!-- end col -->

                                                <div class="col-xl-6">
                                                    <div class="mt-3 mt-lg-0">
                                                        <div class="mb-3">
                                                            <label class="form-label">Range</label>
                                                            <input type="text" class="form-control" id="datepicker-range">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label class="form-label">Timepicker</label>
                                                            <input type="text" class="form-control" id="datepicker-timepicker">
                                                        </div>
        
                                                        <div>
                                                            <label class="form-label">Inline</label>
                                                            <input type="text" class="form-control" id="datepicker-inline">
                                                        </div>
                                                    </div>
                                                </div><!-- end col -->
                                            </div><!-- end row -->
                                        </form><!-- end form -->
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->
                        </div><!-- end row -->
                        
                      <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header justify-content-between d-flex align-items-center">
                                    <h4 class="card-title">Dropzone</h4>
                                </div><!-- end card header -->
                                <div class="card-body">
                                    <div>
                                        <form action="#" class="dropzone">
                                            <div class="fallback">
                                                <input name="file" type="file" multiple="multiple">
                                            </div>
                                            <div class="dz-message needsclick">
                                                <div class="mb-3">
                                                    <i class="display-4 text-muted uil uil-cloud-upload"></i>
                                                </div>

                                                <h4>Drop files here or click to upload.</h4>
                                            </div>
                                        </form>
                                        <!-- end form -->
                                    </div>

                                    <div class="text-center mt-4">
                                        <button type="button" class="btn btn-primary">Send
                                            Files</button>
                                    </div>
                                </div>
                            </div><!-- end card -->
                        </div> <!-- end col -->
                    </div> <!-- end row -->

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Forms Steps</h4>
                                </div><!-- end card header -->
                                <div class="card-body">
                                    <form action="#">
                                        <ul class="wizard-nav mb-5">
                                            <li class="wizard-list-item">
                                                <div class="list-item active">
                                                    <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Seller Details" data-bs-original-title="Seller Details">
                                                        <i class="uil uil-list-ul"></i>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="wizard-list-item">
                                                <div class="list-item">
                                                    <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Company Document" data-bs-original-title="Company Document">
                                                        <i class="uil uil-clipboard-notes"></i>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="wizard-list-item">
                                                <div class="list-item">
                                                    <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Bank Details" data-bs-original-title="Bank Details">
                                                        <i class="uil uil-university"></i>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                        <!-- wizard-nav -->

                                        <div class="wizard-tab" style="display: block;">
                                            <div class="text-center mb-4">
                                                <h5>Seller Details</h5>
                                                <p class="card-title-desc">Fill all information below</p>
                                            </div>
                                            <div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="basicpill-firstname-input" class="form-label">First
                                                                name</label>
                                                            <input type="text" class="form-control" id="basicpill-firstname-input" placeholder="Enter First Name">
                                                        </div>
                                                    </div><!-- end col -->
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="basicpill-lastname-input" class="form-label">Last
                                                                name</label>
                                                            <input type="text" class="form-control" id="basicpill-lastname-input" placeholder="Enter Last Name">
                                                        </div>
                                                    </div><!-- end col -->
                                                </div><!-- end row -->

                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="basicpill-phoneno-input" class="form-label">Phone</label>
                                                            <input type="text" class="form-control" id="basicpill-phoneno-input" placeholder="Enter Phone Number">
                                                        </div>
                                                    </div><!-- end col -->
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="basicpill-email-input" class="form-label">Email</label>
                                                            <input type="email" class="form-control" id="basicpill-email-input" placeholder="Enter E-mail">
                                                        </div>
                                                    </div><!-- end col -->
                                                </div><!-- end row -->
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <label for="basicpill-address-input" class="form-label">Address</label>
                                                            <textarea id="basicpill-address-input" class="form-control" placeholder="Enter Address" rows="2"></textarea>
                                                        </div>
                                                    </div><!-- end col -->
                                                </div><!-- end row -->
                                            </div>

                                        </div>
                                        <!-- wizard-tab -->

                                        <div class="wizard-tab">
                                            <div>
                                                <div class="text-center mb-4">
                                                    <h5>Company Document</h5>
                                                    <p class="card-title-desc">Fill all information below</p>
                                                </div>
                                                <div>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label for="basicpill-pancard-input" class="form-label">PAN
                                                                    Card</label>
                                                                <input type="text" class="form-control" id="basicpill-pancard-input" placeholder="Enter PAN Number">
                                                            </div>
                                                        </div><!-- end col -->

                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label for="basicpill-vatno-input" class="form-label">VAT/TIN No.</label>
                                                                <input type="text" class="form-control" id="basicpill-vatno-input" placeholder="Enter VAT/TIN Number">
                                                            </div>
                                                        </div><!-- end col -->
                                                    </div><!-- end row -->
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label for="basicpill-cstno-input" class="form-label">CST
                                                                    No.</label>
                                                                <input type="text" class="form-control" id="basicpill-cstno-input" placeholder="Enter CST No.">
                                                            </div>
                                                        </div><!-- end col -->

                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label for="basicpill-servicetax-input" class="form-label">Service Tax No.</label>
                                                                <input type="text" class="form-control" id="basicpill-servicetax-input" placeholder="Enter Service Tax No.">
                                                            </div>
                                                        </div><!-- end col -->
                                                    </div><!-- end row -->
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label for="basicpill-companyuin-input" class="form-label">Company UIN</label>
                                                                <input type="text" class="form-control" id="basicpill-companyuin-input" placeholder="Enter Company UIN">
                                                            </div>
                                                        </div><!-- end col -->

                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label for="basicpill-declaration-input" class="form-label">Declaration</label>
                                                                <input type="text" class="form-control" id="basicpill-declaration-input" placeholder="Enter Declaration">
                                                            </div>
                                                        </div><!-- end col -->
                                                    </div><!-- end row-->
                                                </div><!-- end form -->
                                            </div>
                                        </div>
                                        <!-- wizard-tab -->

                                        <div class="wizard-tab">
                                            <div>
                                                <div class="text-center mb-4">
                                                    <h5>Bank Details</h5>
                                                    <p class="card-title-desc">Fill all information below</p>
                                                </div>
                                                <div>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label for="basicpill-namecard-input" class="form-label">Name on Card</label>
                                                                <input type="text" class="form-control" id="basicpill-namecard-input" placeholder="Enter Name of Card">
                                                            </div>
                                                        </div><!-- end col -->
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label class="form-label">Credit Card Type</label>
                                                                <select class="form-select">
                                                                    <option selected="">Select Card Type</option>
                                                                    <option value="AE">American Express</option>
                                                                    <option value="VI">Visa</option>
                                                                    <option value="MC">MasterCard</option>
                                                                    <option value="DI">Discover</option>
                                                                </select>
                                                            </div>
                                                        </div><!-- end col -->
                                                    </div><!-- end row -->
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label for="basicpill-cardno-input" class="form-label">Credit Card Number</label>
                                                                <input type="text" class="form-control" id="basicpill-cardno-input" placeholder="Enter Credit Number">
                                                            </div>
                                                        </div><!-- end col -->

                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label for="basicpill-card-verification-input" class="form-label">Card Verification Number</label>
                                                                <input type="text" class="form-control" id="basicpill-card-verification-input" placeholder="Enter Verification number">
                                                            </div>
                                                        </div><!-- end col -->
                                                    </div><!-- end row -->
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label for="basicpill-expiration-input" class="form-label">Expiration Date</label>
                                                                <input type="text" class="form-control" id="basicpill-expiration-input" placeholder="Expiration Date">
                                                            </div>
                                                        </div>
                                                    </div><!-- end row -->
                                                </div><!-- end form -->
                                            </div>
                                        </div>
                                        <!-- wizard-tab -->

                                        <div class="d-flex align-items-start gap-3 mt-4">
                                            <button type="button" class="btn btn-primary w-sm" id="prevBtn" onclick="nextPrev(-1)" style="display: none;">Previous</button>
                                            <button type="button" class="btn btn-primary w-sm ms-auto" id="nextBtn" onclick="nextPrev(1)">Next</button>
                                        </div>
                                    </form><!-- end form -->
                                </div>
                            </div>
                        </div><!-- end col -->
                    </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header justify-content-between d-flex align-items-center">
                                        <h4 class="card-title">Examples</h4>
                                    </div><!-- end card header -->
                                    <div class="card-body">
                                        <form>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div>
                                                        <div>
                                                            <label for="regexp-mask" class="form-label">RegExp (Russian postal code)</label>
                                                            <input type="text" class="form-control" id="regexp-mask">
                                                            <div class="text-muted">/^[1-6]\d{0,5}$/</div>
                                                        </div>
    
                                                        <div class="mt-4">
                                                            <label for="phone-mask" class="form-label">Pattern (Phone)</label>
                                                            <input type="text" class="form-control" id="phone-mask">
                                                            <div class="text-muted">+{7}(000)000-00-00</div>
                                                        </div>
                                                        <div class="mt-4">
                                                            <label for="number-mask" class="form-label">Number</label>
                                                            <input type="text" class="form-control" id="number-mask">
                                                            <div class="text-muted">in range [-10000, 10000]</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end col -->

                                                <div class="col-lg-6">
                                                    <div>
                                                        <label for="date-mask" class="form-label">Date</label>
                                                        <input type="text" class="form-control" id="date-mask">
                                                        <div class="text-muted">'dd.mm.yyyy' in range [01.01.1990, 01.01.2020]</div>
                                                    </div>

                                                    <div class="mt-4">
                                                        <label class="form-label">On-the-fly select</label>
                                                        <input type="text" class="form-control" id="dynamic-mask">
                                                        <div class="text-muted">phone or email</div>
                                                    </div>
                                                    <div class="mt-4">
                                                        <label class="form-label">Mask in mask</label>
                                                        <input type="text" class="form-control" id="currency-mask">
                                                        <div class="text-muted">currency input</div>
                                                    </div>
                                                </div>
                                                <!-- end col -->
                                            </div>
                                            <!-- end row -->
                                        </form>
                                        <!-- end form -->
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->
                        </div>

                        

                    </div> <!-- container-fluid -->
                </div><!-- End Page-content -->

                
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>document.write(new Date().getFullYear())</script> &copy; Vuesy.
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-end d-none d-sm-block">
                                    Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesdesign
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- end main content-->

            </div>
    <!-- END layout-wrapper -->

   <?php include("footer.php"); ?>