<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>Falcon | Dashboard &amp; Web App Templat</title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('assets/admin/')}}/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets/admin/')}}/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/admin/')}}/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/admin/')}}/img/favicons/favicon.ico">
    <link rel="manifest" href="{{asset('assets/admin/')}}/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="../../assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">
    <script src="{{asset('assets/admin/')}}/js/config.js"></script>


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link href="{{asset('assets/admin/')}}/css/theme-rtl.min.css" rel="stylesheet" id="style-rtl">
    <link href="{{asset('assets/admin/')}}/css/theme.min.css" rel="stylesheet" id="style-default">
    <link href="{{asset('assets/admin/')}}/css/user-rtl.min.css" rel="stylesheet" id="user-style-rtl">
    <link href="{{asset('assets/admin/')}}/css/user.min.css" rel="stylesheet" id="user-style-default">
    <script>
        var isRTL = JSON.parse(localStorage.getItem('isRTL'));
        if (isRTL) {
            var linkDefault = document.getElementById('style-default');
            var userLinkDefault = document.getElementById('user-style-default');
            linkDefault.setAttribute('disabled', true);
            userLinkDefault.setAttribute('disabled', true);
            document.querySelector('html').setAttribute('dir', 'rtl');
        } else {
            var linkRTL = document.getElementById('style-rtl');
            var userLinkRTL = document.getElementById('user-style-rtl');
            linkRTL.setAttribute('disabled', true);
            userLinkRTL.setAttribute('disabled', true);
        }
    </script>
</head>


<body>

<!-- ===============================================-->
<!--    Main Content-->
<!-- ===============================================-->
<main class="main" id="top">
    <div class="container" data-layout="container">
        <script>
            var isFluid = JSON.parse(localStorage.getItem('isFluid'));
            if (isFluid) {
                var container = document.querySelector('[data-layout]');
                container.classList.remove('container');
                container.classList.add('container-fluid');
            }
        </script>
        <div class="row flex-center min-vh-100 py-6">
            <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4"><a class="d-flex flex-center mb-4" href="{{route('admin.login')}}"><img class="me-2" src="{{asset('assets/admin/')}}/img/illustrations/falcon.png" alt="" width="58" /><span class="font-sans-serif fw-bolder fs-5 d-inline-block">falcon</span></a>
                <div class="card">
                    <div class="card-body p-4 p-sm-5">
                        <div class="row flex-between-center mb-2">
                            <div class="col-auto">
                                <h5>Sign Up</h5>
                            </div>
                            <div class="col-auto fs--1 text-600"><span class="mb-0 undefined">or</span> <span><a href="{{route('user.login')}}">Login account</a></span></div>
                        </div>
                        <form action="{{route('user.register.submit')}}" method="post">
                            @csrf
                            <div class="mb-3">
                                <input class="form-control" type="text" name="name" placeholder="Name" />
                            </div>
                            <div class="mb-3">
                                <input class="form-control" type="email" name="email" placeholder="Email address" />
                            </div>
                            <div class="mb-3">
                                <input class="form-control" type="text" name="phone_number" placeholder="Phone Number" />
                            </div>
                            <div class="mb-3">
                                <input class="form-control" type="password" name="password" placeholder="Password" />
                            </div>
                            <div class="mb-3">
                                <input class="form-control" type="password" name="con_password" placeholder="Confirm Password" />
                            </div>
                            <div class="row flex-between-center">
                                <div class="col-auto">
                                    <div class="form-check mb-0">
                                    </div>
                                </div>
                                <div class="col-auto"><a class="fs--1" href="../../authentication/basic/forgot-password.html">Forgot Password?</a></div>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary d-block w-100 mt-3" type="submit" name="submit">Log in</button>
                            </div>
                        </form>
                        <div class="position-relative mt-4">
                            <hr class="bg-300" />
                            <div class="divider-content-center">or log in with</div>
                        </div>
                        <div class="row g-2 mt-2">
                            <div class="col-sm-6"><a class="btn btn-outline-google-plus btn-sm d-block w-100" href="#"><span class="fab fa-google-plus-g me-2" data-fa-transform="grow-8"></span> google</a></div>
                            <div class="col-sm-6"><a class="btn btn-outline-facebook btn-sm d-block w-100" href="#"><span class="fab fa-facebook-square me-2" data-fa-transform="grow-8"></span> facebook</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- ===============================================-->
<!--    End of Main Content-->
<!-- ===============================================-->




<!-- ===============================================-->
<!--    JavaScripts-->
<!-- ===============================================-->
<script src="{{asset('assets/admin/')}}/vendors/popper/popper.min.js"></script>
<script src="{{asset('assets/admin/')}}/vendors/bootstrap/bootstrap.min.js"></script>
<script src="{{asset('assets/admin/')}}/vendors/anchorjs/anchor.min.js"></script>
<script src="{{asset('assets/admin/')}}/vendors/is/is.min.js"></script>
<script src="{{asset('assets/admin/')}}/vendors/fontawesome/all.min.js"></script>
<script src="{{asset('assets/admin/')}}/vendors/lodash/lodash.min.js"></script>
<script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
<script src="{{asset('assets/admin/')}}/vendors/list.js/list.min.js"></script>
<script src="{{asset('assets/admin/')}}/js/theme.js"></script>

<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:100,200,300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">
</body>

</html>
