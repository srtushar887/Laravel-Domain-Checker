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
    <meta name="msapplication-TileImage" content="{{asset('assets/admin/')}}/img/favicons/mstile-150x150.png">
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
        <nav class="navbar navbar-light navbar-vertical navbar-expand-xl">
            <script>
                var navbarStyle = localStorage.getItem("navbarStyle");
                if (navbarStyle && navbarStyle !== 'transparent') {
                    document.querySelector('.navbar-vertical').classList.add(`navbar-${navbarStyle}`);
                }
            </script>
            <div class="d-flex align-items-center">
                <div class="toggle-icon-wrapper">

                    <button class="btn navbar-toggler-humburger-icon navbar-vertical-toggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>

                </div><a class="navbar-brand" href="index.html">
                    <div class="d-flex align-items-center py-3"><img class="me-2" src="{{asset('assets/admin/')}}/img/illustrations/falcon.png" alt="" width="40" /><span class="font-sans-serif">falcon</span>
                    </div>
                </a>
            </div>
            <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
                <div class="navbar-vertical-content scrollbar">
                    <ul class="navbar-nav flex-column mb-3" id="navbarVerticalNav">
                        <li class="nav-item">
                            <!-- label-->
                            <div class="row mb-2">
                                <div class="col-auto navbar-vertical-label">Dashboard
                                </div>
                                <div class="col ps-0">
                                    <hr class="mb-0 navbar-vertical-divider" />
                                </div>
                            </div>
                            <!-- parent pages--><a class="nav-link active" href="{{route('admin.dashboard')}}" role="button">
                                <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-chart-pie"></span></span><span class="nav-link-text ps-1">Dashboard</span>
                                </div>
                            </a>
                            <a class="nav-link" href="index.html" role="button">
                                <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-chart-pie"></span></span><span class="nav-link-text ps-1">General Settings</span>
                                </div>
                            </a>
                            <a class="nav-link" href="index.html" role="button">
                                <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-chart-pie"></span></span><span class="nav-link-text ps-1">User Management</span>
                                </div>
                            </a>

                            <a class="nav-link" href="index.html" role="button">
                                <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-chart-pie"></span></span><span class="nav-link-text ps-1">User Domain Search</span>
                                </div>
                            </a>
                            <!-- parent pages--><a class="nav-link" href="dashboard/dashboard-alt.html" role="button">
                                <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-chart-area"></span></span><span class="nav-link-text ps-1">Alternate</span>
                                </div>
                            </a>

                            <a class="nav-link dropdown-indicator" href="#email" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="email">
                                <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-envelope-open"></span></span><span class="nav-link-text ps-1">Email</span>
                                </div>
                            </a>
                            <!-- inner pages-->
                            <ul class="nav collapse" id="email">
                                <li class="nav-item"><a class="nav-link" href="email/inbox.html">
                                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Inbox</span>
                                        </div>
                                    </a>
                                    <!-- more inner pages-->
                                </li>
                                <li class="nav-item"><a class="nav-link" href="email/email-detail.html">
                                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Email detail</span>
                                        </div>
                                    </a>
                                    <!-- more inner pages-->
                                </li>
                                <li class="nav-item"><a class="nav-link" href="email/compose.html">
                                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Compose</span>
                                        </div>
                                    </a>
                                    <!-- more inner pages-->
                                </li>
                            </ul>
                        </li>

                    </ul>

                </div>
            </div>
        </nav>
        <div class="content">
            <nav class="navbar navbar-light navbar-glass navbar-top navbar-expand">


                <ul class="navbar-nav navbar-nav-icons ms-auto flex-row align-items-center">



                    <li class="nav-item dropdown"><a class="nav-link pe-0" id="navbarDropdownUser" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="avatar avatar-xl">
                                <img class="rounded-circle" src="{{asset('assets/admin/')}}/img/team/3-thumb.png" alt="" />

                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end py-0" aria-labelledby="navbarDropdownUser">
                            <div class="bg-white dark__bg-1000 rounded-2 py-2">
                                <a class="dropdown-item fw-bold text-warning" href="#!">{{Auth::user()->name}} </a>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="pages/profile.html">Profile &amp; account</a>
                                <a class="dropdown-item" href="pages/settings.html">Settings</a>
                                <div class="dropdown-divider"></div>

                                <a class="dropdown-item" href="{{route('admin.logout')}}">Logout</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </nav>
           @yield('admin')

            <footer>
                <div class="row g-0 justify-content-between fs--1 mt-4 mb-3">
                    <div class="col-12 col-sm-auto text-center">
                        <p class="mb-0 text-600">Thank you for creating with Falcon <span class="d-none d-sm-inline-block">| </span><br class="d-sm-none" /> 2021 &copy; <a href="https://themewagon.com">Themewagon</a></p>
                    </div>
                    <div class="col-12 col-sm-auto text-center">
                        <p class="mb-0 text-600">v3.0.0-beta1</p>
                    </div>
                </div>
            </footer>
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
<script src="{{asset('assets/admin/')}}/vendors/echarts/echarts.min.js"></script>
<script src="{{asset('assets/admin/')}}/vendors/progressbar/progressbar.min.js"></script>
<script src="{{asset('assets/admin/')}}/vendors/fontawesome/all.min.js"></script>
<script src="{{asset('assets/admin/')}}vendors/lodash/lodash.min.js"></script>
<script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
<script src="{{asset('assets/admin/')}}/vendors/list.js/list.min.js"></script>
<script src="{{asset('assets/admin/')}}/js/theme.js"></script>

<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:100,200,300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">
</body>

</html>
