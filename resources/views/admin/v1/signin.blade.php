
<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>Sign In | Vuesy - Admin & Dashboard Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="/assets/images/favicon.ico">

        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
        <link href="assets/css/fontend.css" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body class="bg-white">

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
                                            <div class="px-3 py-3">
                                                <div class="text-center s_logo">
                                                    <img src="/assets/images/fontend/logo-web.png" alt="" >
                                                
                                                </div>
                                                <form class="mt-4 pt-2">
                                                    <div class="form-floating form-floating-custom mb-3">
                                                        <input type="text" class="form-control" id="input-username" placeholder="Enter User Name">
                                                        <label for="input-username">Username</label>
                                                        <div class="form-floating-icon">
                                                            <i class="uil uil-users-alt"></i>
                                                        </div>
                                                    </div>
                                                    <div class="form-floating form-floating-custom mb-3 auth-pass-inputgroup">
                                                        <input type="password" class="form-control" id="password-input" placeholder="Enter Password">
                                                        <button type="button" class="btn btn-link position-absolute h-100 end-0 top-0" id="password-addon">
                                                            <i class="mdi mdi-eye-outline font-size-18 text-muted"></i>
                                                        </button>
                                                        <label for="password-input">Password</label>
                                                        <div class="form-floating-icon">
                                                            <i class="uil uil-padlock"></i>
                                                        </div>
                                                    </div>
                                                    <div class="form-check form-check-primary font-size-16 py-1">
                                                        <input class="form-check-input" type="checkbox" id="remember-check">
                                                        <div class="float-end">
                                                            <a href="auth-resetpassword-basic.html" class="text-muted text-decoration-underline font-size-14">Forgot your password?</a>
                                                        </div>
                                                        <label class="form-check-label font-size-14" for="remember-check">
                                                            Remember me
                                                        </label>
                                                    </div>
                
                                                    <div class="mt-3">
                                                        <button class="btn btn-primary w-100" type="submit">Log In</button>
                                                    </div>
            
                                                    
            
                                                    <!-- <div class="mt-4 pt-3 text-center">
                                                        <p class="text-muted mb-0">Don't have an account ? <a href="auth-signup-cover.html" class="fw-semibold text-decoration-underline"> Signup Now </a> </p>
                                                    </div> -->
                
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

        <!-- JAVASCRIPT -->
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenujs/metismenujs.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/feather-icons/feather.min.js"></script>

        <script src="assets/js/pages/pass-addon.init.js"></script>

    </body>
</html>
