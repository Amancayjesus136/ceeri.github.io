<!-- Begin page -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<div id="layout-wrapper">

<header id="page-topbar">
<div class="layout-width">
<div class="navbar-header">

    <div class="d-flex">
        <!-- LOGO -->
        <div class="navbar-brand-box horizontal-logo">
            <a href="{{ route('dashboard') }}" class="logo logo-dark">
                <span class="logo-sm">
                    <!-- <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="22"> -->
                </span>
                <span class="logo-lg">
                    <!-- <img src="{{ asset('assets/images/logo-dark.png') }}" alt="" height="17"> -->
                </span>
            </a>

            <a href="{{ route('dashboard') }}" class="logo logo-light">
                <span class="logo-sm">
                    <!-- <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="22"> -->
                </span>
                <span class="logo-lg">
                    <!-- <img src="{{ asset('assets/images/logo-light.png') }}" alt="" height="100"> -->
                </span>
            </a>
        </div>

        <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger" id="topnav-hamburger-icon">
            <span class="hamburger-icon">
                <span></span>
                <span></span>
                <span></span>
            </span>
        </button>

    </div>

    <div class="d-flex align-items-center">

        <div class="dropdown d-md-none topbar-head-dropdown header-item">
            <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle" id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="bx bx-search fs-22"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-search-dropdown">
                <form class="p-3">
                    <div class="form-group m-0">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                            <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="ms-1 header-item d-none d-sm-flex">
            <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle" data-toggle="fullscreen">
                <i class='bx bx-fullscreen fs-22'></i>
            </button>
        </div>
        
        <div class="dropdown ms-sm-3 header-item topbar-user">
            <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="d-flex align-items-center">
                                <img src="{{ asset(Auth::user()->foto ? 'storage/assets/images/' . Auth::user()->foto : 'assets/images/sin-foto.png') }}" class="rounded-circle header-profile-user" alt="user-profile-image">                  
                <span class="text-start ms-xl-2">
                        <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">{{ Auth::user()->name }}</span>
                        <!-- <span class="d-none d-xl-block ms-1 fs-12 text-muted user-name-sub-text">Admin-mid</span> -->
                    </span>
                </span>
            </button>
            <div class="dropdown-menu dropdown-menu-end">
                <!-- item-->
                <h6 class="dropdown-header">Bienvenid@ {{ Auth::user()->name }}!</h6>
                <a class="dropdown-item" href="{{ route('perfiles.index') }}"><i class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Perfil</span></a>
                <form method="POST" action="{{ route('logout') }}">
                @csrf
                    <a class="dropdown-item" href="#" onclick="event.preventDefault(); this.closest('form').submit();">
                        <i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span class="align-middle" data-key="t-logout">Cerrar Sección</span>
                    </a>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</header>

<!-- removeNotificationModal -->
<div id="removeNotificationModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="NotificationModalbtn-close"></button>
    </div>
    <div class="modal-body">
        <div class="mt-2 text-center">
            <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
            <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                <h4>Are you sure ?</h4>
                <p class="text-muted mx-4 mb-0">Are you sure you want to remove this Notification ?</p>
            </div>
        </div>
        <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
            <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn w-sm btn-danger" id="delete-notification">Yes, Delete It!</button>
        </div>
    </div>

</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="{{ route('dashboard') }}" class="logo logo-dark">
            <span class="logo-sm">
                <!-- <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="22"> -->
            </span>
            <span class="logo-lg">
                <!-- <img src="{{ asset('assets/images/logo-dark.png') }}" alt="" height="17"> -->
            </span>
        </a>
        <!-- Light Logo-->
        <a href="{{ route('dashboard') }}" class="logo logo-light">
            <span class="logo-sm">
                <!-- <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="22"> -->
            </span>
            <span class="logo-lg">
            <!-- <img src="{{ asset('assets/images/logo-light.png') }}" alt="" height="70" style="margin-top: 20px;"> -->
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>

            <!-- ============================================================== -->
            <!-- INICIO -->     
            <!-- ============================================================== --> 
            <li class="nav-item">
                <a class="nav-link menu-link" href="{{ route('login#*') }}">
                    <i class="fas fa-home"></i> <span data-key="t-Usuarios">Inicio</span>
                </a>
            </li>
            <!-- ============================================================== -->
            <!-- Seleccionar -->     
            <!-- ============================================================== --> 
            <li class="nav-item">
                <a class="nav-link menu-link" href="{{ route('seleccionar.index') }}">
                    <i class="far fa-calendar-alt"></i> <span data-key="t-Usuarios">Reserva</span>
                </a>
            </li>

            <!-- ============================================================== -->
            <!-- Clientes -->     
            <!-- ============================================================== --> 
            <li class="nav-item">
                <a class="nav-link menu-link" href="{{ route('Clientes.index') }}">
                <i class="fa-solid fa-person"></i> <span data-key="t-Usuarios">Clientes</span>
                </a>
            </li>

            <!-- ============================================================== -->
            <!-- Reporte -->     
            <!-- ============================================================== --> 

            <li class="nav-item">
                <a class="nav-link menu-link" href="{{ route('reportes.index') }}">
                    <i class="fa-solid fa-book"></i> <span data-key="t-Usuarios">Reportes</span>
                </a>
            </li>

            <!-- ============================================================== -->
            <!-- Reporte -->     
            <!-- ============================================================== --> 

            <li class="nav-item">
                <a class="nav-link menu-link" href="{{ route('Citas-hoy.index') }}">
                    <i class="fa-regular fa-clock"></i> <span data-key="t-Usuarios">Reservas para hoy</span>
                </a>
            </li>
               <!-- ============================================================== -->
                <!-- CONFIGURACIÓN -->     
                <!-- ============================================================== -->  
            
        </div> 
        
    </div>



    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>
<script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
