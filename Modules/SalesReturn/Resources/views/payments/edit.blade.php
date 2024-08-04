@extends('layouts.app')

@section('title', 'Edit Payment')

@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('sale-returns.index') }}">Pengembalian Barang</a></li>
        <li class="breadcrumb-item"><a href="{{ route('sale-returns.show', $sale_return) }}">{{ $sale_return->reference }}</a></li>
        <li class="breadcrumb-item active">Edit Pembayaran</li>
    </ol>
@endsection

@section('content')
    <div class="container-fluid">
        <form id="payment-form" action="{{ route('sale-return-payments.update', $saleReturnPayment) }}" method="POST">
            @csrf
            @method('patch')
            <div class="row">
                <div class="col-lg-12">
                    @include('utils.alerts')
                    <div class="form-group">
                        <button class="btn btn-success">Update Payment <i class="bi bi-check"></i></button>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="reference">Referensi <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="reference" required readonly value="{{ $saleReturnPayment->reference }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="date">Tanggal <span class="text-danger">*</span></label>
                                        <input type="date" class="form-control" name="date" required value="{{ $saleReturnPayment->getAttributes()['date'] }}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="due_amount">Sisa<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="due_amount" required value="{{ format_currency($sale_return->due_amount) }}" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="amount">Jumlah<span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <input id="amount" type="text" class="form-control" name="amount" required value="{{ old('amount') ?? $saleReturnPayment->amount }}">
                                            <div class="input-group-append">
                                                <button id="getTotalAmount" class="btn btn-success" type="button">
                                                    <i class="bi bi-check-square"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="from-group">
                                        <div class="form-group">
                                            <label for="payment_method">Metode Pembayaran <span class="text-danger">*</span></label>
                                            <select class="form-control" name="payment_method" id="payment_method" required>
                                                <option {{ $saleReturnPayment->payment_method == 'Tunai' ? 'selected' : '' }} value="Tunai">Tunai</option>
                                                <option {{ $saleReturnPayment->payment_method == 'Kartu Kredit' ? 'selected' : '' }} value="Kartu Kredit">Kartu Kredit</option>
                                                <option {{ $saleReturnPayment->payment_method == 'Transfer Bank' ? 'selected' : '' }} value="Transfer Bank">Transfer Bank</option>
                                                <option {{ $saleReturnPayment->payment_method == 'Cek' ? 'selected' : '' }} value="Cek">Cek</option>
                                                <option {{ $saleReturnPayment->payment_method == 'Other' ? 'selected' : '' }} value="Other">Lainnya</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="note">Catatan</label>
                                <textarea class="form-control" rows="4" name="note">{{ old('note') ?? $saleReturnPayment->note }}</textarea>
                            </div>

                            <input type="hidden" value="{{ $sale_return->id }}" name="sale_return_id">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('page_scripts')
    <script src="{{ asset('js/jquery-mask-money.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#amount').maskMoney({
                prefix:'{{ settings()->currency->symbol }}',
                thousands:'{{ settings()->currency->thousand_separator }}',
                decimal:'{{ settings()->currency->decimal_separator }}',
            });

            $('#amount').maskMoney('mask');

            $('#getTotalAmount').click(function () {
                $('#amount').maskMoney('mask', {{ $sale_return->due_amount }});
            });

            $('#payment-form').submit(function () {
                var amount = $('#amount').maskMoney('unmasked')[0];
                $('#amount').val(amount);
            });
        });
    </script>
@endpush

