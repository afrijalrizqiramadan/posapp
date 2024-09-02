<?php

namespace Modules\Product\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreProductRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'product_name' => ['required', 'string', 'max:255'],
            'product_code' => ['required', 'string', 'max:255', 'unique:products,product_code'],
            'product_barcode_symbology' => ['required', 'string', 'max:255'],
            'product_unit' => ['required', 'string', 'max:255'],
            'product_quantity' => ['required', 'integer', 'min:1'],
            'product_cost' => ['required', 'numeric', 'max:2147483647'],
            'product_price' => ['required', 'numeric', 'max:2147483647'],
            'product_price2' => ['required', 'numeric', 'max:2147483647'],
            'product_stock_alert' => ['required', 'integer', 'min:0'],
            'product_supplier' => ['required', 'string', 'max:255'],
            'product_order_tax' => ['nullable', 'integer', 'min:0', 'max:100'],
            'product_tax_type' => ['nullable', 'integer'],
            'product_note' => ['nullable', 'string', 'max:1000'],
            'category_id' => ['required', 'integer']
        ];
    }

    public function messages()
    {
        return [
            'product_name.required' => 'Kolom nama produk wajib diisi.',
            'product_name.string' => 'Nama produk harus berupa teks.',
            'product_name.max' => 'Nama produk tidak boleh lebih dari 255 karakter.',

            'product_code.required' => 'Kolom kode produk wajib diisi.',
            'product_code.string' => 'Kode produk harus berupa teks.',
            'product_code.max' => 'Kode produk tidak boleh lebih dari 255 karakter.',
            'product_code.unique' => 'Kode produk yang Anda masukkan sudah digunakan. Silakan pilih yang berbeda.',

            'product_barcode_symbology.required' => 'Kolom simbol barcode wajib diisi.',
            'product_barcode_symbology.string' => 'Simbol barcode harus berupa teks.',
            'product_barcode_symbology.max' => 'Simbol barcode tidak boleh lebih dari 255 karakter.',

            'product_unit.required' => 'Kolom unit produk wajib diisi.',
            'product_unit.string' => 'Unit produk harus berupa teks.',
            'product_unit.max' => 'Unit produk tidak boleh lebih dari 255 karakter.',

            'product_quantity.required' => 'Kolom jumlah produk wajib diisi.',
            'product_quantity.integer' => 'Jumlah produk harus berupa angka.',
            'product_quantity.min' => 'Jumlah produk harus minimal 1.',

            'product_cost.required' => 'Kolom biaya produk wajib diisi.',
            'product_cost.numeric' => 'Biaya produk harus berupa angka.',
            'product_cost.max' => 'Biaya produk tidak boleh lebih dari 2147483647.',

            'product_price.required' => 'Kolom harga produk wajib diisi.',
            'product_price.numeric' => 'Harga produk harus berupa angka.',
            'product_price.max' => 'Harga produk tidak boleh lebih dari 2147483647.',

            'product_price2.required' => 'Kolom harga produk kedua wajib diisi.',
            'product_price2.numeric' => 'Harga produk kedua harus berupa angka.',
            'product_price2.max' => 'Harga produk kedua tidak boleh lebih dari 2147483647.',

            'product_stock_alert.required' => 'Kolom pemberitahuan stok produk wajib diisi.',
            'product_stock_alert.integer' => 'Pemberitahuan stok produk harus berupa angka.',
            'product_stock_alert.min' => 'Pemberitahuan stok produk harus minimal 0.',

            'product_supplier.required' => 'Kolom pemasok produk wajib diisi.',
            'product_supplier.string' => 'Pemasok produk harus berupa teks.',
            'product_supplier.max' => 'Pemasok produk tidak boleh lebih dari 255 karakter.',

            'product_order_tax.nullable' => 'Pajak pesanan produk opsional.',
            'product_order_tax.integer' => 'Pajak pesanan produk harus berupa angka.',
            'product_order_tax.min' => 'Pajak pesanan produk harus minimal 0.',
            'product_order_tax.max' => 'Pajak pesanan produk tidak boleh lebih dari 100.',

            'product_tax_type.nullable' => 'Tipe pajak produk opsional.',
            'product_tax_type.integer' => 'Tipe pajak produk harus berupa angka.',

            'product_note.nullable' => 'Catatan produk opsional.',
            'product_note.string' => 'Catatan produk harus berupa teks.',
            'product_note.max' => 'Catatan produk tidak boleh lebih dari 1000 karakter.',

            'category_id.required' => 'Kolom ID kategori wajib diisi.',
            'category_id.integer' => 'ID kategori harus berupa angka.',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('create_products');
    }
}
