@php
    $category_max_id = \Modules\Product\Entities\Category::max('id') + 1;
    $category_code = 'CA_' . str_pad($category_max_id, 2, '0', STR_PAD_LEFT);
@endphp
<div class="modal fade" id="categoryCreateModal" tabindex="-1" role="dialog" aria-labelledby="categoryCreateModal"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="categoryCreateModalLabel">Buat Kategori</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="category-form" action="{{ route('product-categories.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="category_code">Kode Kategori <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="category_code" required
                            value="{{ $category_code }}">
                    </div>
                    <div class="form-group">
                        <label for="category_name">Nama Kategori <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="category_name" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit"form="category-form" class="btn btn-success">Buat <i
                            class="bi bi-check"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // $(document).ready(function() {
    //     $('#categoryCreateModal').on('shown.bs.modal', function() {
    //         console.log('Category Create Modal is shown');
    //     });

    //     $('#categoryCreateModal form').on('submit', function(e) {
    //         e.preventDefault();
    //         console.log('Form submitted');
    //         // Add your form submission logic here
    //     });
    // });
</script>
