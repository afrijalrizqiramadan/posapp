@can('edit_products')
    <a href="{{ route('products.edit', $data->id) }}" class="btn btn-info btn-sm">
        <i class="bi bi-pencil"></i>
    </a>
@endcan
@can('edit_products')
    <a href="{{ route('products.copy', $data->id) }}" class="btn btn-info btn-sm">
        <i class="bi bi-copy"></i>
    </a>
@endcan
@can('show_products')
    <a href="{{ route('products.show', $data->id) }}" class="btn btn-success btn-sm">
        <i class="bi bi-eye"></i>
    </a>
@endcan
@can('delete_products')
    <button id="delete" class="btn btn-danger btn-sm"
        onclick="
    event.preventDefault();
    if (confirm('Apakah anda yakin? Ini akan menghapus data secara permanen!')) {
        document.getElementById('destroy{{ $data->id }}').submit()
    }
    ">
        <i class="bi bi-trash"></i>
        <form id="destroy{{ $data->id }}" class="d-none" action="{{ route('products.destroy', $data->id) }}"
            method="POST">
            @csrf
            @method('delete')
        </form>
    </button>
@endcan
