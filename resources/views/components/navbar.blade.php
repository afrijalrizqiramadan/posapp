<div class="app-menu navbar-menu">
    <div class="navbar-brand-box">
        <a href="{{ route('home') }}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ asset('assets/images/image.png') }}" class="rounded" alt="" height="40">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('assets/images/image.png') }}" class="rounded" alt="" height="40">
            </span>
        </a>
        <a href="{{ route('home') }}" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ asset('assets/images/image.png') }}" class="rounded" alt="" height="40">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('assets/images/image.png') }}" class="rounded" alt="" height="40">
            </span>
        </a>
        <div class="vertical-overlay"></div>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu"></div>

            <ul class="navbar-nav fw-medium" id="navbar-nav">

                <li class="nav-item">

                    <a href="{{ route('home') }}" class="nav-link {{ menuAktif(route('home')) }}" role="button">
                        <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Dashboard</span>
                    </a>

                </li>
                @can('access_products')
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#produk" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="produk">
                            <i class="ri-folder-shield-line"></i> <span data-key="t-dashboards">Produk</span>
                        </a>
                        @can('access_product_categories')
                            <div class="collapse menu-dropdown" id="produk">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ route('product-categories.index') }}"
                                            class="nav-link {{ menuAktif(route('product-categories.index')) }}"
                                            data-key="t-crm">
                                            Kategori Produk </a>
                                    </li>
                                </ul>
                            </div>
                        @endcan
                        @can('create_products')
                            <div class="collapse menu-dropdown" id="produk">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ route('products.create') }}"
                                            class="nav-link {{ menuAktif(route('products.create')) }}" data-key="t-crm">
                                            Buat Produk </a>
                                    </li>
                                </ul>
                            </div>
                        @endcan
                        <div class="collapse menu-dropdown" id="produk">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('products.index') }}"
                                        class="nav-link {{ menuAktif(route('products.index')) }}" data-key="t-crm">
                                        Lihat Produk </a>
                                </li>
                            </ul>
                        </div>
                        @can('print_barcodes')
                            <div class="collapse menu-dropdown" id="produk">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ route('barcode.print') }}"
                                            class="nav-link {{ menuAktif(route('barcode.print')) }}" data-key="t-crm">
                                            Print Kode </a>
                                    </li>
                                </ul>
                            </div>
                        @endcan
                    </li>
                @endcan

                {{-- @can('access_adjustments')
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#adjustments" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="adjustments">
                            <i class="ri-list-settings-line"></i> <span data-key="t-dashboards">Perubahan</span>
                        </a>
                        @can('create_adjustments')
                            <div class="collapse menu-dropdown" id="adjustments">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ route('adjustments.create') }}"
                                            class="nav-link {{ menuAktif(route('adjustments.create')) }}" data-key="t-crm">
                                            Buat Perubahan </a>
                                    </li>
                                </ul>
                            </div>
                        @endcan
                        @can('create_products')
                            <div class="collapse menu-dropdown" id="adjustments">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ route('adjustments.index') }}"
                                            class="nav-link {{ menuAktif(route('adjustments.index')) }}" data-key="t-crm">
                                            Perubahan </a>
                                    </li>
                                </ul>
                            </div>
                        @endcan

                    </li>
                @endcan --}}


                @can('access_customers|access_suppliers')
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#customer" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="customer">
                            <i class="ri-profile-line"></i> <span data-key="t-dashboards">Pelanggan Suplier</span>
                        </a>
                        @can('access_customers')
                            <div class="collapse menu-dropdown" id="customer">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ route('customers.index') }}"
                                            class="nav-link {{ menuAktif(route('customers.index')) }}" data-key="t-crm">
                                            Pelanggan </a>
                                    </li>
                                </ul>
                            </div>
                        @endcan
                        @can('access_suppliers')
                            <div class="collapse menu-dropdown" id="customer">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ route('suppliers.index') }}"
                                            class="nav-link {{ menuAktif(route('suppliers.index')) }}" data-key="t-crm">
                                            Suplier </a>
                                    </li>
                                </ul>
                            </div>
                        @endcan

                    </li>
                @endcan

                @can('access_reports')
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#report" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="report">
                            <i class="ri-draft-line"></i> <span data-key="t-dashboards">Laporan</span>
                        </a>
                        <div class="collapse menu-dropdown" id="report">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('profit-loss-report.index') }}"
                                        class="nav-link {{ menuAktif(route('profit-loss-report.index')) }}"
                                        data-key="t-crm">
                                        Laporan Laba Rugi </a>
                                </li>
                            </ul>
                        </div>
                        <div class="collapse menu-dropdown" id="report">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('payments-report.index') }}"
                                        class="nav-link {{ menuAktif(route('payments-report.index')) }}"
                                        data-key="t-crm">
                                        Laporan Pembayaran </a>
                                </li>
                            </ul>
                        </div>
                        <div class="collapse menu-dropdown" id="report">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('sales-report.index') }}"
                                        class="nav-link {{ menuAktif(route('sales-report.index')) }}" data-key="t-crm">
                                        Laporan Pembelian </a>
                                </li>
                            </ul>
                        </div>
                        <div class="collapse menu-dropdown" id="report">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('purchases-report.index') }}"
                                        class="nav-link {{ menuAktif(route('purchases-report.index')) }}"
                                        data-key="t-crm">
                                        Laporan Penjualan </a>
                                </li>
                            </ul>
                        </div>
                        <div class="collapse menu-dropdown" id="report">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('sales-return-report.index') }}"
                                        class="nav-link {{ menuAktif(route('sales-return-report.index')) }}"
                                        data-key="t-crm">
                                        Laporan Pengembalian Penjualan </a>
                                </li>
                            </ul>
                        </div>
                        <div class="collapse menu-dropdown" id="report">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('purchases-return-report.index') }}"
                                        class="nav-link {{ menuAktif(route('purchases-return-report.index')) }}"
                                        data-key="t-crm">
                                        Laporan Pengembalian Pembelian </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endcan

                @can('access_sales')
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#adjustments" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="adjustments">
                            <i class="ri-list-settings-line"></i> <span data-key="t-dashboards">Penjualan</span>
                        </a>
                        @can('create_sales')
                            <div class="collapse menu-dropdown" id="adjustments">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ route('adjustments.create') }}"
                                            class="nav-link {{ menuAktif(route('sales.create')) }}" data-key="t-crm">
                                            Buat Penjualan </a>
                                    </li>
                                </ul>
                            </div>
                        @endcan
                        <div class="collapse menu-dropdown" id="adjustments">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('adjustments.index') }}"
                                        class="nav-link {{ menuAktif(route('sales.index')) }}" data-key="t-crm">
                                        Penjualan </a>
                                </li>
                            </ul>
                        </div>

                    </li>
                @endcan
                @can('access_user_management')
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#user" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="user">
                            <i class="ri-profile-line"></i> <span data-key="t-dashboards">Pengguna</span>
                        </a>
                        <div class="collapse menu-dropdown" id="user">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('users.create') }}"
                                        class="nav-link {{ menuAktif(route('users.create')) }}" data-key="t-crm">
                                        Buat Pengguna </a>
                                </li>
                            </ul>
                        </div>
                        <div class="collapse menu-dropdown" id="user">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('users.index') }}"
                                        class="nav-link {{ menuAktif(route('users.index')) }}" data-key="t-crm">
                                        Pengguna </a>
                                </li>
                            </ul>
                        </div>
                        <div class="collapse menu-dropdown" id="user">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('roles.index') }}"
                                        class="nav-link {{ menuAktif(route('roles.index')) }}" data-key="t-crm">
                                        Peran </a>
                                </li>
                            </ul>
                        </div>

                    </li>
                @endcan
                @can('access_currencies|access_settings')
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#setting" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="setting">
                            <i class="ri-settings-2-line"></i> <span data-key="t-dashboards">Pengaturan</span>
                        </a>
                        @can('access_units')
                            <div class="collapse menu-dropdown" id="setting">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ route('units.index') }}"
                                            class="nav-link {{ menuAktif(route('units.index')) }}" data-key="t-crm">
                                            Unit </a>
                                    </li>
                                </ul>
                            </div>
                        @endcan
                        @can('access_settings')
                            <div class="collapse menu-dropdown" id="setting">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ route('settings.index') }}"
                                            class="nav-link {{ menuAktif(route('settings.index')) }}" data-key="t-crm">
                                            Pengaturan </a>
                                    </li>
                                </ul>
                            </div>
                        @endcan

                    </li>
                @endcan
            </ul>
        </div>
    </div>
</div>
