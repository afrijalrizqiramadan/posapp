@extends('layouts.app')

@section('title', 'Kategori')

@section('third_party_stylesheets')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                @include('utils.alerts')
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('product-categories.create') }}" class="btn btn-success">
                            Tambah Kategori <i class="bi bi-plus"></i>
                        </a>

                        <div class="table-responsive">
                            {!! $dataTable->table() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('page_scripts')
    {!! $dataTable->scripts() !!}
@endpush
