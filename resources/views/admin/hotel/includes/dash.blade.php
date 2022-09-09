    <!doctype html>
    <html lang="zxx">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>@yield('title', config('app.name'))</title>
        <meta name="robots" content="noindex,nofollow" />

        <!-- Favicon -->
        <link rel="shortcut icon" type="image/png" href="{{ url('/images/favicon.png') }}" />

        <!-- Main css -->
        <link rel="stylesheet" href="/admin/vendors/bundle.css" type="text/css">

        <!-- Google font -->
        <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@400;500;600&display=swap" rel="stylesheet">

        <!-- Slick -->
        <link rel="stylesheet" href="/admin/vendors/slick/slick.css" type="text/css">
        <link rel="stylesheet" href="/admin/vendors/slick/slick-theme.css" type="text/css">

        <!-- Daterangepicker -->
        <link rel="stylesheet" href="/admin/vendors/datepicker/daterangepicker.css" type="text/css">

        <!-- DataTable -->
        <link rel="stylesheet" href="/admin/vendors/dataTable/datatables.min.css" type="text/css">

        <!-- select 2 -->
        <link rel="stylesheet" href="/admin/vendors/select2/css/select2.min.css" type="text/css">

        {{-- steps --}}
        <link rel="stylesheet" href="/admin/vendors/form-wizard/jquery.steps.css" type="text/css">

        <!-- App css -->
        <link rel="stylesheet" href="/admin/assets/css/app.css" type="text/css">


        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        @yield("style")

    </head>

    <body>

        <!-- Sidebar group -->
        <div class="sidebar-group">
            <!-- Sidebar >>> Settings -->
            <div class="sidebar" id="settings">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Settings</h6>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item pl-0 pr-0">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="customSwitch1" checked>
                                    <label class="custom-control-label" for="customSwitch1">Allow notifications.</label>
                                </div>
                            </li>
                            <li class="list-group-item pl-0 pr-0">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="customSwitch2">
                                    <label class="custom-control-label" for="customSwitch2">Hide user requests</label>
                                </div>
                            </li>
                            <li class="list-group-item pl-0 pr-0">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="customSwitch3" checked>
                                    <label class="custom-control-label" for="customSwitch3">Speed up demands</label>
                                </div>
                            </li>
                            <li class="list-group-item pl-0 pr-0">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="customSwitch4" checked>
                                    <label class="custom-control-label" for="customSwitch4">Hide menus</label>
                                </div>
                            </li>
                            <li class="list-group-item pl-0 pr-0">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="customSwitch5">
                                    <label class="custom-control-label" for="customSwitch5">Remember next visits</label>
                                </div>
                            </li>
                            <li class="list-group-item pl-0 pr-0">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="customSwitch6">
                                    <label class="custom-control-label" for="customSwitch6">Enable report
                                        generation.</label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- ./ Sidebar >>> Settings -->

            <!-- Sidebar >>> Chat list -->
            <div class="sidebar" id="chat-list">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-4">
                            <h6 class="card-title mb-0">Chats</h6>
                            <a href="chat.html" class="btn btn-primary btn-sm">New Chat</a>
                        </div>
                        <div class="list-group list-group-flush">
                            <a href="chat.html" class="list-group-item d-flex px-0 align-items-center">
                                <div class="pr-3">
                                    <span class="avatar avatar-state-danger">
                                        <img src="/admin/assets/media/image/user/women_avatar3.jpg" class="rounded-circle"
                                            alt="image">
                                    </span>
                                </div>
                                <div class="flex-grow- 1">
                                    <h6 class="mb-1">Cass Queyeiro</h6>
                                    <span class="text-muted">
                                        <i class="fa fa-image mr-1"></i> Photo
                                    </span>
                                </div>
                                <div class="text-right ml-auto d-flex flex-column">
                                    <span class="small text-muted">Yesterday</span>
                                </div>
                            </a>
                            <a href="chat.html" class="list-group-item d-flex px-0 align-items-center">
                                <div class="pr-3">
                                    <span class="avatar avatar-state-warning">
                                        <img src="/admin/assets/media/image/user/man_avatar4.jpg" class="rounded-circle"
                                            alt="image">
                                    </span>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">Evered Asquith</h6>
                                    <span class="text-muted">
                                        <i class="fa fa-video-camera mr-1"></i> Video
                                    </span>
                                </div>
                                <div class="text-right ml-auto d-flex flex-column">
                                    <span class="small text-muted">Last week</span>
                                </div>
                            </a>
                            <a href="chat.html" class="list-group-item px-0 d-flex align-items-center">
                                <div class="pr-3">
                                    <div class="avatar avatar-state-danger">
                                        <span class="avatar-title bg-success rounded-circle">F</span>
                                    </div>
                                </div>
                                <div>
                                    <h6 class="mb-1">Francisco Ubsdale</h6>
                                    <span class="text-muted">Hello how are you?</span>
                                </div>
                                <div class="text-right ml-auto d-flex flex-column">
                                    <span class="small text-muted">2:32 PM</span>
                                </div>
                            </a>
                            <a href="chat.html" class="list-group-item px-0 d-flex align-items-center">
                                <div class="pr-3">
                                    <div class="avatar avatar-state-success">
                                        <img src="/admin/assets/media/image/user/women_avatar1.jpg" class="rounded-circle"
                                            alt="image">
                                    </div>
                                </div>
                                <div>
                                    <h6 class="mb-1">Natale Janu</h6>
                                    <span class="text-muted">Hi!</span>
                                </div>
                                <div class="text-right ml-auto d-flex flex-column">
                                    <span class="badge badge-primary badge-pill ml-auto mb-2">3</span>
                                    <span class="small text-muted">08:27 PM</span>
                                </div>
                            </a>
                            <a href="chat.html" class="list-group-item d-flex px-0 align-items-center">
                                <div class="pr-3">
                                    <span class="avatar avatar-state-warning">
                                        <img src="/admin/assets/media/image/user/women_avatar2.jpg" class="rounded-circle"
                                            alt="image">
                                    </span>
                                </div>
                                <div class="flex-grow- 1">
                                    <h6 class="mb-1">Orelie Rockhall</h6>
                                    <span class="text-muted">
                                        <i class="fa fa-image mr-1"></i> Photo
                                    </span>
                                </div>
                                <div class="text-right ml-auto d-flex flex-column">
                                    <span class="small text-muted">Yesterday</span>
                                </div>
                            </a>
                            <a href="chat.html" class="list-group-item d-flex px-0 align-items-center">
                                <div class="pr-3">
                                    <span class="avatar avatar-state-info">
                                        <img src="/admin/assets/media/image/user/man_avatar1.jpg" class="rounded-circle"
                                            alt="image">
                                    </span>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">Barbette Bolf</h6>
                                    <span class="text-muted">
                                        <i class="fa fa-video-camera mr-1"></i> Video
                                    </span>
                                </div>
                                <div class="text-right ml-auto d-flex flex-column">
                                    <span class="small text-muted">Last week</span>
                                </div>
                            </a>
                            <a href="chat.html" class="list-group-item d-flex px-0 align-items-center">
                                <div class="pr-3">
                                    <span class="avatar avatar-state-secondary">
                                        <span class="avatar-title bg-warning rounded-circle">D</span>
                                    </span>
                                </div>
                                <div>
                                    <h6 class="mb-1">Dudley Laborde</h6>
                                    <span class="text-muted">Hello how are you?</span>
                                </div>
                                <div class="text-right ml-auto d-flex flex-column">
                                    <span class="small text-muted">2:32 PM</span>
                                </div>
                            </a>
                            <a href="chat.html" class="list-group-item d-flex px-0 align-items-center">
                                <div class="pr-3">
                                    <span class="avatar avatar-state-success">
                                        <img src="/admin/assets/media/image/user/man_avatar2.jpg" class="rounded-circle"
                                            alt="image">
                                    </span>
                                </div>
                                <div>
                                    <h6 class="mb-1">Barbaraanne Riby</h6>
                                    <span class="text-muted">Hi!</span>
                                </div>
                                <div class="text-right ml-auto d-flex flex-column">
                                    <span class="small text-muted">08:27 PM</span>
                                </div>
                            </a>
                            <a href="chat.html" class="list-group-item d-flex px-0 align-items-center">
                                <div class="pr-3">
                                    <span class="avatar avatar-state-danger">
                                        <img src="/admin/assets/media/image/user/women_avatar3.jpg" class="rounded-circle"
                                            alt="image">
                                    </span>
                                </div>
                                <div class="flex-grow- 1">
                                    <h6 class="mb-1">Mariana Ondrousek</h6>
                                    <span class="text-muted">
                                        <i class="fa fa-image mr-1"></i> Photo
                                    </span>
                                </div>
                                <div class="text-right ml-auto d-flex flex-column">
                                    <span class="small text-muted">Yesterday</span>
                                </div>
                            </a>
                            <a href="chat.html" class="list-group-item d-flex px-0 align-items-center">
                                <div class="pr-3">
                                    <span class="avatar avatar-state-warning">
                                        <img src="/admin/assets/media/image/user/man_avatar4.jpg" class="rounded-circle"
                                            alt="image">
                                    </span>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">Ruprecht Lait</h6>
                                    <span class="text-muted">
                                        <i class="fa fa-video-camera mr-1"></i> Video
                                    </span>
                                </div>
                                <div class="text-right ml-auto d-flex flex-column">
                                    <span class="small text-muted">Last week</span>
                                </div>
                            </a>
                            <a href="chat.html" class="list-group-item d-flex px-0 align-items-center">
                                <div class="pr-3">
                                    <span class="avatar avatar-state-info">
                                        <img src="/admin/assets/media/image/user/man_avatar1.jpg" class="rounded-circle"
                                            alt="image">
                                    </span>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">Cosme Hubbold</h6>
                                    <span class="text-muted">
                                        <i class="fa fa-video-camera mr-1"></i> Video
                                    </span>
                                </div>
                                <div class="text-right ml-auto d-flex flex-column">
                                    <span class="small text-muted">Last week</span>
                                </div>
                            </a>
                            <a href="chat.html" class="list-group-item d-flex px-0 align-items-center">
                                <div class="pr-3">
                                    <span class="avatar avatar-state-secondary">
                                        <span class="avatar-title bg-secondary rounded-circle">M</span>
                                    </span>
                                </div>
                                <div>
                                    <h6 class="mb-1">Mallory Darch</h6>
                                    <span class="text-muted">Hello how are you?</span>
                                </div>
                                <div class="text-right ml-auto d-flex flex-column">
                                    <span class="small text-muted">2:32 PM</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ./ Sidebar >>> Chat list -->
        </div>
        <!-- ./ Sidebar group -->


        <!-- Layout wrapper -->
        <div class="layout-wrapper">
            <!-- Header -->
            <div class="header d-print-none">
                <div class="header-container">
                    <div class="header-left">
                        <ul class="navbar-nav">
                            <li class="nav-item navigation-toggler">
                                <a href="#" class="nav-link">
                                    <i class="ti-menu"></i>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="header-right">
                        <ul class="navbar-nav">
                            <li class="nav-item btn-mobile-search">
                                <a href="#" title="Search" class="nav-link">
                                    <i data-feather="search"></i>
                                </a>
                            </li>

                            <li class="nav-item dropdown d-sm-inline d-none">
                                <a href="#" class="nav-link" title="Fullscreen" data-toggle="fullscreen">
                                    <i class="maximize" data-feather="maximize"></i>
                                    <i class="minimize" data-feather="minimize"></i>
                                </a>
                            </li>

                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" title="User menu"
                                    data-toggle="dropdown">
                                    <span class="mr-2 d-sm-inline d-none">
                                        Hi! <strong>{{ auth()->user()->username }}</strong>
                                    </span>
                                    <figure class="avatar avatar-sm">
                                        <img src="/images/icon.png" class="rounded-circle" alt="avatar">
                                    </figure>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-big">
                                    <div class="text-center py-4"
                                        data-background-image="/admin/assets/media/image/image1.jpg">
                                        <figure class="avatar avatar-lg mb-3 border-0">
                                            <img src="/images/icon.png" class="rounded-circle" alt="image">
                                        </figure>
                                        <h5 class="mb-0">{{ auth()->user()->username }}</h5>
                                    </div>
                                    <div class="list-group list-group-flush">

                                        <a href="/hotel-portal/logout" class="list-group-item text-danger">Sign Out!</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item header-toggler">
                            <a href="#" class="nav-link">
                                <i class="ti-arrow-down"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- ./ Header -->

            <!-- Content wrapper -->
            <div class="content-wrapper">
                <!-- Navigation -->
                <div class="navigation">
                    <!-- Logo -->
                    <div class="navigation-header">
                        <a class="navigation-logo" href="/hotel-portal">
                            <img class="logo" style="width: 150px;" src="/images/logo-header.png" alt="logo">
                            <img class="dark-logo" style="width: 150px;" src="/images/logo.png" alt="dark logo">
                            <img class="small-logo" style="width: 40px;" src="/images/icon.png" alt="small logo">
                            <img class="small-dark-logo" style="width: 40px;" src="/images/logo.png"
                                alt="small dark logo">
                        </a>
                        <a href="#" class="small-navigation-toggler"></a>
                        <a href="#" class="btn btn-danger mobile-navigation-toggler">
                            <i class="ti-close"></i>
                        </a>
                    </div>
                    <!-- ./ Logo -->
                    <!----------------------------------------------------------------------------------------------------------->
                    <!-- Menu wrapper -->
                    <div class="navigation-menu-wrapper">
                        <!-- Menu tab -->
                        <div class="navigation-menu-tab">
                            <ul>
                                <li>
                                    <a href="#" data-menu-target="#pages">
                                        <span class="menu-tab-icon">
                                            <i data-feather="layers"></i>
                                        </span>
                                        <span>General</span>
                                    </a>
                                </li>
                                <!--packages-->
                                <li>
                                    <a href="#" data-menu-target="#packages">
                                        <span class="menu-tab-icon">
                                            <i data-feather="layers"></i>
                                        </span>
                                        <span>Packages</span>
                                    </a>
                                </li>

                                <!--users-->
                                <li>
                                    <a href="#" data-menu-target="#users">
                                        <span class="menu-tab-icon">
                                            <i data-feather="layers"></i>
                                        </span>
                                        <span>Users</span>
                                    </a>
                                </li>

                                <!--reports-->
                                <li>
                                    <a href="#" data-menu-target="#reports">
                                        <span class="menu-tab-icon">
                                            <i data-feather="layers"></i>
                                        </span>
                                        <span>Reports</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- ./ Menu tab -->

                        <!-- Menu body -->
                        <!--general-->
                        <div class="navigation-menu-body">
                            <ul id="pages">
                                <li class="navigation-divider">General</li>
                                <li>
                                    <a class="{{ Request::segment(2) == '' ? 'active' : '' }}" href="/hotel-portal/">
                                        <span class="nav-link-icon" data-feather="info"></span>
                                        <span>Account Info</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="{{ Request::segment(2) == 'profile' ? 'active' : '' }}"
                                        href="/hotel-portal/profile">
                                        <span class="nav-link-icon" data-feather="plus"></span>
                                        <span>Hotel Profile</span>
                                    </a>
                                </li>
                            </ul>
                            <!--packages-->
                            <ul id="packages">
                                <li class="navigation-divider">Packages</li>
                                <li>
                                    <a class="{{ Request::segment(2) == 'add-packege' ? 'active' : '' }} {{ Request::segment(2) == 'edit-packege' ? 'active' : '' }}"
                                        href="/hotel-portal/add-packege">
                                        <span class="nav-link-icon" data-feather="plus"></span>
                                        <span>Add Packages</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="{{ Request::segment(2) == 'pkg-list' ? 'active' : '' }}"
                                        href="/hotel-portal/pkg-list">
                                        <span class="nav-link-icon" data-feather="list"></span>
                                        <span>Packages List</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="{{ Request::segment(2) == 'add-offer' ? 'active' : '' }}"
                                        href="/hotel-portal/add-offer">
                                        <span class="nav-link-icon" data-feather="plus"></span>
                                        <span>Add Offers</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="{{ Request::segment(2) == 'offers-list' ? 'active' : '' }}"
                                        href="/hotel-portal/offers-list">
                                        <span class="nav-link-icon" data-feather="list"></span>
                                        <span>Offers List</span>
                                    </a>
                                </li>
                            </ul>

                            <!--users-->
                            <ul id="users">
                                <li class="navigation-divider">Users</li>
                                <li>
                                    <a class="{{ Request::segment(2) == 'users-usg' ? 'active' : '' }}"
                                        href="/hotel-portal/users-usg">
                                        <span class="nav-link-icon" data-feather="plus"></span>
                                        <span>Add Users</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="{{ Request::segment(2) == 'users-list' ? 'active' : '' }}"
                                        href="/hotel-portal/users-list">
                                        <span class="nav-link-icon" data-feather="list"></span>
                                        <span>Users List</span>
                                    </a>
                                </li>
                            </ul>
                            <!--reports-->
                            <ul id="reports">
                                <li class="navigation-divider">reports</li>
                                <li>
                                    <a class="{{ Request::segment(2) == 'reports' ? 'active' : '' }}"
                                        href="/hotel-portal/reports">
                                        <span class="nav-link-icon" data-feather="plus"></span>
                                        <span>Add reports</span>
                                    </a>
                                </li>

                                <li>
                                    <a class="{{ Request::segment(2) == 'reportslist' ? 'active' : '' }}"
                                        href="/hotel-portal/reportslist">
                                        <span class="nav-link-icon" data-feather="list"></span>
                                        <span>Report List</span>
                                    </a>
                                </li>
                            </ul>

                        </div>



                        <!-- ./ Menu body -->
                    </div>
                    <!-- ./ Menu wrapper -->
                </div>
                <!-- ./ Navigation -->

                <!-- Content body -->
                <div class="content-body">


                    @yield('content')


                    <!-- Footer -->
                    <footer class="content-footer">
                        <div><a href="https://manakal.com" target="_blank">© {{ date('Y') }} manakal.com</a></div>

                    </footer>
                    <!-- ./ Footer -->
                </div>
                <!-- ./ Content body -->
            </div>
            <!-- ./ Content wrapper -->
        </div>
        <!-- ./ Layout wrapper -->

        <!-- Main scripts -->
        <script src="/admin/vendors/bundle.js"></script>

        <!-- Apex chart -->
        <script src="https://apexcharts.com/samples/assets/irregular-data-series.js"></script>
        <script src="/admin/vendors/charts/apex/apexcharts.min.js"></script>

        <!-- Daterangepicker -->
        <script src="/admin/vendors/datepicker/daterangepicker.js"></script>

        <!-- DataTable -->
        <script src="/admin/vendors/dataTable/datatables.min.js"></script>

        <!-- Dashboard scripts -->
        <script src="/admin/assets/js/examples/pages/ecommerce-dashboard.js"></script>

        <!-- select 2 -->
        <script src="/admin/vendors/select2/js/select2.min.js"></script>

        {{-- steps --}}
        <script src="/admin/vendors/form-wizard/jquery.steps.min.js"></script>

        <!-- App scripts -->
        <script src="/admin/assets/js/app.min.js"></script>

        {{-- repeater --}}
        <script src="/admin/vendors/jquery.repeater.min.js"></script>

        @yield('scripts')

    </body>

    </html>
