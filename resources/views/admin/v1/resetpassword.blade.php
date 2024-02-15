
<?php include 'header.php'; ?>

<!-- ========== Left Sidebar Start ========== -->
    <?php include 'sidebar.php'; ?>



        <div class="auth-page d-flex align-items-center min-vh-100">
            <div class="container-fluid p-0" >
                <div class="row g-0 justify-content-center">
                    <div class="col-xxl-9 col-lg-8 col-md-7">
                        <div class=" bg-light py-md-5 p-4 d-flex">
                          
                            <!-- end bubble effect -->
                            <div class="row justify-content-center g-0 align-items-center w-100">
                                <div class="col-xl-6 col-lg-8">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="py-3">
                                                <div class="text-center s_logo">
                                                    <img src="/assets/images/fontend/logo-web.png" alt="" >
                                                
                                                </div>
                                                <form class="mt-4 pt-2">
                                                    <div class="form-floating form-floating-custom mb-3">
                                                        <input type="password" class="form-control" id="input-newpassword" placeholder="Password">
                                                        <label for="input-newpassword">New Password</label>
                                                        <div class="form-floating-icon">
                                                            <i class="uil uil-padlock"></i>
                                                        </div>
                                                    </div>
        
                                                    <div class="form-floating form-floating-custom mb-3">
                                                        <input type="password" class="form-control" id="input-confirmpassword" placeholder="Password">
                                                        <label for="input-confirmpassword">Confirm Password</label>
                                                        <div class="form-floating-icon">
                                                            <i class="uil uil-check-circle"></i>
                                                        </div>
                                                    </div>
                
                                                    <div class="mt-4">
                                                        <button class="btn btn-primary w-100" type="submit">Reset</button>
                                                    </div>

                
                                                </form><!-- end form -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container fluid -->
        </div>
        <!-- end authentication section -->

        
        </div>
    <!-- END layout-wrapper -->

   <?php include("footer.php"); ?>
