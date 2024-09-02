@extends('layouts.app')

@section('title', 'Tambah Kategori')

@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('product-categories.index') }}">Produk</a></li>
        <li class="breadcrumb-item active">Tambah</li>
    </ol>
@endsection

@section('content')
    @php
        $category_max_id = \Modules\Product\Entities\Category::max('id') + 1;
        $category_code = 'CA_' . str_pad($category_max_id, 2, '0', STR_PAD_LEFT);
    @endphp
    <div class="container-fluid">

        <form id="product-form" action="{{ route('product-categories.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="category_code">Kode Kategori <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="category_code" required value="{{ $category_code }}">
                </div>
                <div class="form-group">
                    <label for="category_name">Nama Kategori <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="category_name" required>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success">Tambah Kategori <i class="bi bi-check"></i></button>
            </div>
        </form>
    </div>

    <!-- Create Category Modal -->
    @include('product::includes.category-modal')
@endsection

@section('third_party_scripts')
    <script src="{{ asset('js/dropzone.js') }}"></script>
@endsection

@push('page_scripts')
    <script>
        var uploadedDocumentMap = {}
        Dropzone.options.documentDropzone = {
            url: '{{ route('dropzone.upload') }}',
            maxFilesize: 1,
            acceptedFiles: '.jpg, .jpeg, .png',
            maxFiles: 3,
            addRemoveLinks: true,
            dictRemoveFile: "<i class='bi bi-x-circle text-danger'></i> remove",
            headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            success: function(file, response) {
                $('form').append('<input type="hidden" name="document[]" value="' + response.name + '">');
                uploadedDocumentMap[file.name] = response.name;
            },
            removedfile: function(file) {
                file.previewElement.remove();
                var name = '';
                if (typeof file.file_name !== 'undefined') {
                    name = file.file_name;
                } else {
                    name = uploadedDocumentMap[file.name];
                }
                $.ajax({
                    type: "POST",
                    url: "{{ route('dropzone.delete') }}",
                    data: {
                        '_token': "{{ csrf_token() }}",
                        'file_name': `${name}`
                    },
                });
                $('form').find('input[name="document[]"][value="' + name + '"]').remove();
            },
            init: function() {
                @if (isset($product) && $product->getMedia('images'))
                    var files = {!! json_encode($product->getMedia('images')) !!};
                    for (var i in files) {
                        var file = files[i];
                        this.options.addedfile.call(this, file);
                        this.options.thumbnail.call(this, file, file.original_url);
                        file.previewElement.classList.add('dz-complete');
                        $('form').append('<input type="hidden" name="document[]" value="' + file.file_name + '">');
                    }
                @endif
            }
        }
    </script>

    <script src="{{ asset('js/jquery-mask-money.js') }}"></script>
    <script>
        function parseCurrency(value) {
            // Menghapus simbol 'Rp' dan titik
            let numericValue = value.replace(/Rp|\./g, '');
            // Mengubah string menjadi angka
            return parseInt(numericValue, 10);
        }
        $(document).ready(function() {
            $('#product_cost').maskMoney({
                prefix: '{{ settings()->currency->symbol }}',
                thousands: '{{ settings()->currency->thousand_separator }}',
                decimal: '{{ settings()->currency->decimal_separator }}',
                precision: 0
            });
            $('#product_price').maskMoney({
                prefix: '{{ settings()->currency->symbol }}',
                thousands: '{{ settings()->currency->thousand_separator }}',
                decimal: '{{ settings()->currency->decimal_separator }}',
                precision: 0
            });
            $('#product_price2').maskMoney({
                prefix: '{{ settings()->currency->symbol }}',
                thousands: '{{ settings()->currency->thousand_separator }}',
                decimal: '{{ settings()->currency->decimal_separator }}',
                precision: 0
            });

            $('#product-form').submit(function() {
                var product_cost = parseCurrency($('#product_cost').val());
                var product_price = parseCurrency($('#product_price').val());
                var product_price2 = parseCurrency($('#product_price2').val());
                $('#product_cost').val(product_cost);
                $('#product_price').val(product_price);
                $('#product_price2').val(product_price2);
            });
        });
    </script>
@endpush
