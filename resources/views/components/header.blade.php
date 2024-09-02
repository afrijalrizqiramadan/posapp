<header id="page-topbar">
    <div class="layout-width">
        <div class="navbar-header">
            <div class="d-flex">
                <!-- LOGO -->
                <div class="navbar-brand-box horizontal-logo">
                    <a href="index.html" class="logo logo-dark">
                        <span class="logo-sm">
                            <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="40">
                        </span>
                        <span class="logo-lg">
                            <img src="{{ asset('assets/images/logo-dark.png') }}" alt="" height="40">
                        </span>
                    </a>

                    <a href="index.html" class="logo logo-light">
                        <span class="logo-sm">
                            <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="40">
                        </span>
                        <span class="logo-lg">
                            <img src="{{ asset('assets/images/logo-light.png') }}" alt="" height="40">
                        </span>
                    </a>
                </div>

                <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger"
                    id="topnav-hamburger-icon">
                    <span class="hamburger-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </button>

                {{-- <form class="app-search">
                    <div class="position-relative">
                        <input type="text" class="form-control" placeholder="Search..." autocomplete="on"
                        id="search-options" value="">
                        <ul id="menu-list"></ul>

                        <span class="mdi mdi-magnify search-widget-icon"></span>
                        <span class="mdi mdi-close-circle search-widget-icon search-widget-icon-close d-none"
                            id="search-close-options"></span>
                    </div>

                    <div class="dropdown-menu dropdown-menu-lg" id="search-dropdown">
                        <div data-simplebar style="max-height: 320px;">
                            <!-- item-->
                            <div class="dropdown-header">
                                <h6 class="text-overflow text-muted mb-0 text-uppercase">Recent Searches</h6>
                            </div> --}}

                {{-- <div class="dropdown-item bg-transparent text-wrap">
                                <a href="index.html" class="btn btn-soft-secondary btn-sm btn-rounded">how to setup <i
                                        class="mdi mdi-magnify ms-1"></i></a>
                                <a href="index.html" class="btn btn-soft-secondary btn-sm btn-rounded">buttons <i
                                        class="mdi mdi-magnify ms-1"></i></a>
                            </div> --}}
                <!-- item-->
                {{-- <div class="dropdown-header mt-2">
                                <h6 class="text-overflow text-muted mb-1 text-uppercase">Pages</h6>
                            </div>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="ri-bubble-chart-line align-middle fs-18 text-muted me-2"></i>
                                <span>Analytics Dashboard</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="ri-lifebuoy-line align-middle fs-18 text-muted me-2"></i>
                                <span>Help Center</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="ri-user-settings-line align-middle fs-18 text-muted me-2"></i>
                                <span>My account settings</span>
                            </a> --}}

                <!-- item-->
                {{-- <div class="dropdown-header mt-2">
                                <h6 class="text-overflow text-muted mb-2 text-uppercase">Members</h6>
                            </div>

                            <div class="notification-list">
                                <!-- item -->
                                <a href="javascript:void(0);" class="dropdown-item notify-item py-2">
                                    <div class="d-flex">
                                        <img src="{{ asset('assets/images/users/avatar-2.jpg') }}"
                                            class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                        <div class="flex-1">
                                            <h6 class="m-0">Angela Bernier</h6>
                                            <span class="fs-11 mb-0 text-muted">Manager</span>
                                        </div>
                                    </div>
                                </a>
                                <!-- item -->
                                <a href="javascript:void(0);" class="dropdown-item notify-item py-2">
                                    <div class="d-flex">
                                        <img src="{{ asset('assets/images/users/avatar-3.jpg') }}"
                                            class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                        <div class="flex-1">
                                            <h6 class="m-0">David Grasso</h6>
                                            <span class="fs-11 mb-0 text-muted">Web Designer</span>
                                        </div>
                                    </div>
                                </a>
                                <!-- item -->
                                <a href="javascript:void(0);" class="dropdown-item notify-item py-2">
                                    <div class="d-flex">
                                        <img src="{{ asset('assets/images/users/avatar-5.jpg') }}"
                                            class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                        <div class="flex-1">
                                            <h6 class="m-0">Mike Bunch</h6>
                                            <span class="fs-11 mb-0 text-muted">React Developer</span>
                                        </div>
                                    </div>
                                </a>
                            </div> --}}
                {{-- </div>

                        <div class="text-center pt-3 pb-1">
                            <a href="pages-search-results.html" class="btn btn-primary btn-sm">View All Results <i
                                    class="ri-arrow-right-line ms-1"></i></a>
                        </div>
                    </div>
                </form> --}}
                <form class="app-search">
                    <div class="position-relative">
                        <input type="text" class="form-control" placeholder="Search..." autocomplete="on"
                            id="search-options">
                        <span class="mdi mdi-magnify search-widget-icon"></span>
                        <span class="mdi mdi-close-circle search-widget-icon search-widget-icon-close d-none"
                            id="search-close-options"></span>
                    </div>
                    <div class="dropdown-menu dropdown-menu-lg" id="search-dropdown">
                        <div data-simplebar style="max-height: 320px;">
                            <div class="dropdown-header">
                                <h6 class="text-overflow text-muted mb-0 text-uppercase">Cari Halaman</h6>
                            </div>
                            <div id="search-results"></div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="d-flex align-items-center">




                {{--
                <div class="ms-1 header-item d-flex">
                    <a href="{{ route('presensi.scan-qr') }}"
                        class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle">
                        <i class='ri-fingerprint-line fs-22'></i>
                    </a>
                </div> --}}
                <div class="ms-1 header-item d-sm-flex">
                    <a href="{{ route('app.pos.index') }}"
                        class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle">
                        <i class='bx bx-cart fs-22'></i>
                    </a>
                </div>
                <div class="ms-1 header-item d-none d-sm-flex">
                    <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle"
                        data-toggle="fullscreen">
                        <i class='bx bx-fullscreen fs-22'></i>
                    </button>
                </div>
                <div class="ms-1 header-item d-sm-flex">
                    <button type="button" onclick="gantiMode()"
                        class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle light-dark-mode">
                        <i class='bx bx-moon fs-22'></i>
                    </button>
                </div>

                <div class="dropdown ms-sm-3 header-item bg-light topbar-user">
                    <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <span class="d-flex align-items-center">
                            <img class="rounded-circle border-white header-profile-user"
                                src="{{ auth()->user()->profile_photo_url }}" alt="Header Avatar">
                            <span class="text-start ms-xl-2">
                                <span
                                    class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">{{ auth()->user()->name }}</span>
                                <span
                                    class="d-none d-xl-block ms-1 fs-12 text-muted user-name-sub-text">{{ auth()->user()->roles->first()->name ?? '' }}</span>
                            </span>
                        </span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                        <h6 class="dropdown-header">Hai, {{ auth()->user()->name }}</h6>
                        {{-- <a class="dropdown-item" href="{{ route('profile.auth') }}"><i
                                class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span
                                class="align-middle">Profile</span></a> --}}
                        {{-- <a class="dropdown-item" href="pages-profile-settings.html"><span
                                class="badge bg-soft-success text-success mt-1 float-end">New</span><i
                                class="mdi mdi-cog-outline text-muted fs-16 align-middle me-1"></i> <span
                                class="align-middle">Settings</span></a> --}}
                        <a class="dropdown-item text-danger" href="{{ route('auth.keluar') }}"><i
                                class="mdi mdi-logout text-danger fs-16 align-middle me-1"></i> <span
                                class="align-middle" data-key="t-logout">Logout</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
@push('style')
    <style>
        .dropdown-item {
            display: flex;
            align-items: center;
            padding: 10px;
            text-decoration: none;
            color: #333;
        }

        .dropdown-item i {
            font-size: 18px;
            margin-right: 10px;
        }

        .dropdown-item:hover {
            background-color: #f8f9fa;
        }
    </style>
@endpush

@push('scripts')
    <script>
        function gantiMode() {
            Livewire.emitTo('mode-aplikasi', 'gantiMode')
        }

        function gantiVertical() {
            Livewire.emitTo('mode-aplikasi', 'gantiVertical')
        }

        function gantiHorizontal() {
            Livewire.emitTo('mode-aplikasi', 'gantiHorizontal')
        }

        function gantiTwoColumn() {
            Livewire.emitTo('mode-aplikasi', 'gantiTwoColumn')
        }

        function gantiTopBarDark() {
            Livewire.emitTo('mode-aplikasi', 'gantiTopBarDark')
        }

        function gantiTopBarLight() {
            Livewire.emitTo('mode-aplikasi', 'gantiTopBarLight')
        }

        function gantiSideBarLG() {
            Livewire.emitTo('mode-aplikasi', 'gantiSideBarLG')
        }

        function gantiSideBarMD() {
            Livewire.emitTo('mode-aplikasi', 'gantiSideBarMD')
        }

        function gantiSideBarSM() {
            Livewire.emitTo('mode-aplikasi', 'gantiSideBarSM')
        }

        function gantiSideBarSMH() {
            Livewire.emitTo('mode-aplikasi', 'gantiSideBarSMH')
        }

        function gantiSideBarDefault() {
            Livewire.emitTo('mode-aplikasi', 'gantiSideBarDefault')
        }

        function gantiSideBarDetached() {
            Livewire.emitTo('mode-aplikasi', 'gantiSideBarDetached')
        }

        function gantiSideBarLight() {
            Livewire.emitTo('mode-aplikasi', 'gantiSideBarLight')
        }

        function gantiSideBarDark() {
            Livewire.emitTo('mode-aplikasi', 'gantiSideBarDark')
        }

        function gantiReset() {
            Livewire.emitTo('mode-aplikasi', 'resetButton')
            location.reload();

        }
    </script>
@endpush
