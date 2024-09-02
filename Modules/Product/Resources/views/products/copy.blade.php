@extends('layouts.app')

@section('title', 'Copy Produk')

@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Produk</a></li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>
@endsection

@section('content')
    <div class="container-fluid mb-4">
        <form id="product-form" action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    @include('utils.alerts')
                    <div class="form-group">
                        <button class="btn btn-success">Salin Produk <i class="bi bi-check"></i></button>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label for="product_name">Nama Produk <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="product_name" required
                                            value="{{ $product->product_name }}">

                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="product_code">Kode <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="product_code" name="product_code"
                                            required value="{{ $product->product_code }}">
                                        <div id="product-info" data-product-code="{{ $product->product_code }}"></div>

                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {{-- <label for="category_id">Kategori <span class="text-danger">*</span></label> --}}
                                        <select style="display: none;" class="form-control" name="category_id"
                                            id="category_id" required>
                                            @foreach (\Modules\Product\Entities\Category::all() as $category)
                                                <option {{ $category->id == $product->category->id ? 'selected' : '' }}
                                                    value="{{ $category->id }}">{{ $category->category_name }}</option>
                                            @endforeach
                                        </select>

                                        {{-- <label for="barcode_symbology">Simbol Barcode <span
                                                class="text-danger">*</span></label> --}}
                                        <select class="form-control" style="display: none;" name="product_barcode_symbology"
                                            id="barcode_symbology" required>
                                            <option {{ $product->product_barcode_symbology == 'C128' ? 'selected' : '' }}
                                                value="C128">Code 128</option>
                                            <option {{ $product->product_barcode_symbology == 'C39' ? 'selected' : '' }}
                                                value="C39">Code 39</option>
                                            <option {{ $product->product_barcode_symbology == 'UPCA' ? 'selected' : '' }}
                                                value="UPCA">UPC-A</option>
                                            <option {{ $product->product_barcode_symbology == 'UPCE' ? 'selected' : '' }}
                                                value="UPCE">UPC-E</option>
                                            <option {{ $product->product_barcode_symbology == 'EAN13' ? 'selected' : '' }}
                                                value="EAN13">EAN-13</option>
                                            <option {{ $product->product_barcode_symbology == 'EAN8' ? 'selected' : '' }}
                                                value="EAN8">EAN-8</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="product_cost">Harga Beli <span class="text-danger">*</span></label>
                                        <input id="product_cost" type="text" class="form-control" min="0"
                                            name="product_cost" required value="{{ $product->product_cost }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="product_price">Harga Ecer<span class="text-danger">*</span></label>
                                        <input id="product_price" type="text" class="form-control" min="0"
                                            name="product_price" required value="{{ $product->product_price }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="product_price2">Harga Grosir <span class="text-danger">*</span></label>
                                        <input id="product_price2" type="text" class="form-control" min="0"
                                            name="product_price2" required value="{{ $product->product_price2 }}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="product_quantity">Quantity <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control" name="product_quantity" required
                                            value="{{ $product->product_quantity }}" min="1">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="product_stock_alert">Peringatan Stok <span
                                                class="text-danger">*</span></label>
                                        <input type="number" class="form-control" name="product_stock_alert" required
                                            value="{{ $product->product_stock_alert }}" min="0">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {{-- <label for="product_supplier">Suplier <span class="text-danger">*</span></label> --}}
                                        <input type="hidden" class="form-control" name="product_supplier" required
                                            value="{{ $product->product_supplier }}">
                                    </div>
                                </div>

                            </div>

                            <div class="form-row">
                                {{-- <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="product_order_tax">Pajak (%)</label>
                                        <input type="number" class="form-control" name="product_order_tax"
                                            value="{{ $product->product_order_tax }}" min="0" max="100">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="product_tax_type">Tipe Pajak</label>
                                        <select class="form-control" name="product_tax_type" id="product_tax_type">
                                            <option value="" selected>None</option>
                                            <option {{ $product->product_tax_type == 1 ? 'selected' : '' }}
                                                value="1">Exclusive</option>
                                            <option {{ $product->product_tax_type == 2 ? 'selected' : '' }}
                                                value="2">Inclusive</option>
                                        </select>
                                    </div>
                                </div> --}}
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="product_unit">Unit <i class="bi bi-question-circle-fill text-info"
                                                data-toggle="tooltip" data-placement="top"
                                                title="This short text will be placed after Product Quantity."></i> <span
                                                class="text-danger">*</span></label>
                                        <select class="form-control" name="product_unit" id="product_unit" required>
                                            <option value="" selected>Select Unit</option>
                                            @foreach (\Modules\Setting\Entities\Unit::all() as $unit)
                                                <option {{ $product->product_unit == $unit->short_name ? 'selected' : '' }}
                                                    value="{{ $unit->short_name }}">
                                                    {{ $unit->name . ' | ' . $unit->short_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="product_note">Catatan</label>
                                <textarea name="product_note" id="product_note" rows="4 " class="form-control">{{ $product->product_note }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="image">Gambar Produk <i class="bi bi-question-circle-fill text-info"
                                        data-toggle="tooltip" data-placement="top"
                                        title="Max Files: 3, Max File Size: 1MB, Image Size: 400x400"></i></label>
                                <div class="dropzone d-flex flex-wrap align-items-center justify-content-center"
                                    id="document-dropzone">
                                    <div class="dz-message" data-dz-message>
                                        <i class="bi bi-cloud-arrow-up"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
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
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
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

            // Set nilai input kembali tanpa desimal
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

            $('#product_cost').maskMoney('mask');
            $('#product_price').maskMoney('mask');
            $('#product_price2').maskMoney('mask');

            $('#product-form').submit(function() {

                // var productCode = document.getElementById('product-info').getAttribute(
                //     'data-product-code');
                // var productCode2 = document.getElementById('product_code');
                // var nproductCode2 = document.querySelector('product_code').value;
                // if (productCode == nproductCode2) {
                //     event.preventDefault(); // Mencegah form dari submit otomatis
                //     productCode2.setCustomValidity(
                //         'Kode Tidak Boleh Sama');

                // } else {


                var product_cost = parseCurrency($('#product_cost').val());
                var product_price = parseCurrency($('#product_price').val());
                var product_price2 = parseCurrency($('#product_price2').val());

                $('#product_cost').val(product_cost);
                $('#product_price').val(product_price);
                $('#product_price2').val(product_price2);
                // }


            });
        });
    </script>
@endpush
