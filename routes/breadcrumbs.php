<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;
use Sentry\Breadcrumb;

Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('home'));
});

Breadcrumbs::for('product-categories.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Kategori Produk', route('product-categories.index'));
});

Breadcrumbs::for('products.create', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Buat Produk', route('products.create'));
});
Breadcrumbs::for('products.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
});
Breadcrumbs::for('products.copy', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
});
Breadcrumbs::for('products.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Daftar Produk', route('products.index'));
});
Breadcrumbs::for('barcode.print', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Barcode Print', route('barcode.print'));
});

Breadcrumbs::for('adjustments.create', function (BreadcrumbTrail $trail) {
    $trail->push('Tambahn Perubahan', route('adjustments.create'));
});
Breadcrumbs::for('adjustments.index', function (BreadcrumbTrail $trail) {
    $trail->push('Perubahan', route('adjustments.index'));
});
Breadcrumbs::for('customers.index', function (BreadcrumbTrail $trail) {
    $trail->push('Pelanggan', route('customers.index'));
});
Breadcrumbs::for('customers.create', function (BreadcrumbTrail $trail) {
    $trail->parent('customers.index');
    $trail->push('Pelanggan', route('customers.create'));
});
Breadcrumbs::for('customers.show', function (BreadcrumbTrail $trail) {
    $trail->parent('customers.index');
    $trail->push('Detail Pelanggan', route('customers.index'));
});
Breadcrumbs::for('customers.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('customers.index');
    $trail->push('Pelanggan', route('customers.index'));
});
Breadcrumbs::for('suppliers.index', function (BreadcrumbTrail $trail) {
    $trail->push('Suplier', route('suppliers.index'));
});
Breadcrumbs::for('suppliers.create', function (BreadcrumbTrail $trail) {
    $trail->parent('suppliers.index');
    $trail->push('Suplier', route('suppliers.create'));
});
Breadcrumbs::for('suppliers.show', function (BreadcrumbTrail $trail) {
    $trail->parent('suppliers.index');
    $trail->push('Detail Suplier', route('suppliers.index'));
});
Breadcrumbs::for('suppliers.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('suppliers.index');
    $trail->push('Suplier', route('customers.index'));
});
Breadcrumbs::for('profit-loss-report.index', function (BreadcrumbTrail $trail) {
    $trail->push('Laporan Laba Rugi', route('profit-loss-report.index'));
});
Breadcrumbs::for('payments-report.index', function (BreadcrumbTrail $trail) {
    $trail->push('Laporan Pembayaran', route('payments-report.index'));
});
Breadcrumbs::for('sales-report.index', function (BreadcrumbTrail $trail) {
    $trail->push('Laporan Penjualan', route('sales-report.index'));
});
Breadcrumbs::for('purchases-report.index', function (BreadcrumbTrail $trail) {
    $trail->push('Laporan Pembelian', route('purchases-report.index'));
});

Breadcrumbs::for('sales-return-report.index', function (BreadcrumbTrail $trail) {
    $trail->push('Laporan Pengembalian Penjualan', route('sales-return-report.index'));
});
Breadcrumbs::for('purchases-return-report.index', function (BreadcrumbTrail $trail) {
    $trail->push('Laporan Pengembalian Pembelian', route('purchases-return-report.index'));
});
Breadcrumbs::for('users.create', function (BreadcrumbTrail $trail) {
    $trail->parent('users.index');
    $trail->push('Buat Pengguna', route('users.create'));
});

Breadcrumbs::for('users.index', function (BreadcrumbTrail $trail) {
    $trail->push('Pengguna', route('users.index'));
});
Breadcrumbs::for('roles.index', function (BreadcrumbTrail $trail) {
    $trail->push('Peran', route('roles.index'));
});
Breadcrumbs::for('roles.create', function (BreadcrumbTrail $trail) {
    $trail->parent('roles.index');
    $trail->push('Tambah Peran', route('roles.create'));
});
Breadcrumbs::for('roles.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('roles.index');
    $trail->push('Edit Peran', route('roles.edit'));
});
Breadcrumbs::for('units.index', function (BreadcrumbTrail $trail) {
    $trail->push('Unit', route('units.index'));
});
Breadcrumbs::for('units.create', function (BreadcrumbTrail $trail) {
    $trail->parent('units.index');
    $trail->push('Tambah Unit', route('units.create'));
});
Breadcrumbs::for('units.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('units.index');
    $trail->push('Edit Unit', route('units.index'));
});
Breadcrumbs::for('product-categories.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('product-categories.index');
    $trail->push('Edit Kategori', route('product-categories.index'));
});
Breadcrumbs::for('products.show', function (BreadcrumbTrail $trail) {
    $trail->parent('products.index');
});
Breadcrumbs::for('product-categories.create', function (BreadcrumbTrail $trail) {
    $trail->parent('product-categories.index');
    $trail->push('Tambah Kategori', route('product-categories.create'));
});
Breadcrumbs::for('settings.index', function (BreadcrumbTrail $trail) {
    $trail->push('Pengaturan', route('settings.index'));
});
Breadcrumbs::for('app.pos.index', function (BreadcrumbTrail $trail) {
    $trail->push('POS', route('app.pos.index'));
});
Breadcrumbs::for('sales.index', function (BreadcrumbTrail $trail) {
    $trail->push('POS', route('app.pos.index'));
});
Breadcrumbs::for('sales.create', function (BreadcrumbTrail $trail) {
    $trail->parent('sales.index');
    $trail->push('Buat Penjualan', route('sales.create'));
});
