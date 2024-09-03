<div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Kategori Produk</label>
                <select wire:model.live="category" class="form-control">
                    <option value="">Semua Produk</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Jumlah Produk</label>
                <select wire:model.live="showCount" class="form-control">
                    <option value="9">9 Produk</option>
                    <option value="15">15 Produk</option>
                    <option value="21">21 Produk</option>
                    <option value="30">30 Produk</option>
                    <option value="">Semua Produk</option>
                </select>
            </div>
        </div>
    </div>
    <hr>
</div>
