<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Ascend Dashboard - Login Page</title>
    <link rel="apple-touch-icon" href="/app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="/app-assets/images/ico/favicon.png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/forms/select/select2.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="/app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/themes/bordered-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="/app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/plugins/forms/form-validation.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/pages/page-auth.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="/assets/css/style.css">
    <!-- END: Custom CSS-->

    <style>
        .select2-container--default .select2-results__option--highlighted[aria-selected] {
            background-color: #5897fb !important;
            color: white;
        }
        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background-color: #144593;
        }

        .card .card-header{
            background:linear-gradient(118deg, #175998, rgba(23,89,152, 0.7));
            margin-bottom: 20px
        }

        .card-header h4 ,h2{
            color:white;
        }
    </style>

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="auth-wrapper auth-v1 px-2">
                    <div class="auth-inner py-2">
                        <!-- Login v1 -->
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="javascript:void(0);" class="brand-logo">
                                    <img src="/app-assets/images/logo/EOD logo Blue-01 login.png"  alt="Ascend" width="50%">
                                </a>

                                <h4 class="card-title mb-1">Mass Testing Program! 👋</h4>
                                <p class="card-text mb-2">Please Register your account and start the adventure</p>

                                <form class="auth-login-form mt-2" method="POST" action="{{ route('registerData') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="login-email" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="login-email"  name="name" value="{{ old('name') }}" placeholder="Jon" aria-describedby="login-email" tabindex="1" autofocus  required/>
                                    </div>

                                    <div class="form-group">
                                        <label for="emaillogin" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="emaillogin"  name="email" value="{{ old('email') }}" placeholder="Jon@ascend.com.sa" aria-describedby="login-email" tabindex="1" autofocus  required/>
                                    </div>

                                    <div class="form-group">
                                        <label for="login-email" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="login-email"  name="password" value="{{ old('password') }}" placeholder="********" aria-describedby="login-email" tabindex="1" autofocus  required/>
                                    </div>

                                    <input type="hidden" name="type" value="agent" required/>

                                    <div class="form-group" id="user-sertor">
                                        <label for="">Category</label>
                                        <select name="category" class="form-control select2">
                                            <option value="{{null}}" selected="selected">Select Options</option>
                                            <option value="PMO" @if( (isset($users) && $users->category == "PMO") || old('PMO') == "PMO" ) selected="selected" @endif>PMO</option>
                                            <option value="Operational" @if( (isset($users) && $users->category == "Operational") || old('Operational') == "Operational" ) selected="selected" @endif>Operational</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Phone No</label>
                                        <input type="text" class="form-control" name="phone" value="{{ old('phone') }}" placeholder="96000000000" aria-describedby="login-email" tabindex="1" autofocus  required />
                                    </div>

                                    <div class="form-group">
                                        <label for="">Site</label>
                                        <select name="site_ids[]" class="form-control select2" multiple="multiple">
                                            @foreach($sites as $site)
                                            <option value="{{$site->id}}" @if( (isset($users->site_ids) && in_array($site->id,$users->site_ids) ) || (old('site_ids') && in_array($site->id, old('site_ids')) ) )selected="selected" @endif > {{$site->name}} </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    {{-- <div class="form-group">
                                        <label for="">Modules</label>
                                        <select name="module_ids[]" class="form-control select2" multiple="multiple">
                                            @foreach($modules as $module)
                                            <option value="{{$module->id}}" @if( (isset($users->module_ids) && in_array($module->id,$users->module_ids) ) || (old('module_ids') && in_array($module->id, old('module_ids')) ) )selected="selected" @endif > {{$module->name}} </option>
                                            @endforeach
                                        </select>
                                    </div> --}}

                                    @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif
                                    <button class="btn btn-success btn-block" tabindex="4">Register</button>
                                </form>
                            </div>
                        </div>
                        <!-- /Login v1 -->
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- END: Content-->
    <!-- BEGIN: Vendor JS-->
    <script src="/app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="/app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
    <script src="/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="/app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>

    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="/app-assets/js/core/app-menu.js"></script>
    <script src="/app-assets/js/core/app.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    {{-- <script src="/app-assets/js/scripts/pages/page-auth-login.js"></script> --}}
    <!-- END: Page JS-->

    <script>
        @include('sweetalert::alert')
        $('.select2').select2({
            placeholder: 'Select an option'
        });
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        });
        $('form').on('submit', function(e){
            // e.preventDefault()
            let email = $("#emaillogin").val();
            email = email.toLowerCase();
            email = email.replace(/\s/g, '');
            // $
            $("#emaillogin").val(email);
        })
    </script>
</body>
<!-- END: Body-->

</html>
