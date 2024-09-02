<?php

namespace Modules\Product\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Gate;
use Modules\Product\Entities\Category;
use Modules\Product\DataTables\ProductCategoriesDataTable;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class CategoriesController extends Controller
{
    use LivewireAlert;

    public function index(ProductCategoriesDataTable $dataTable)
    {
        abort_if(Gate::denies('access_product_categories'), 403);
        $category_max_id = Category::max('id') + 1;
        $category_code = 'CA_' . str_pad($category_max_id, 2, '0', STR_PAD_LEFT);

        return $dataTable->render('product::categories.index', ['category_code' => $category_code]);
    }




    public function store(Request $request)
    {

        abort_if(Gate::denies('access_product_categories'), 403);

        $request->validate([
            'category_code' => 'required|unique:categories,category_code',
            'category_name' => 'required'
        ]);

        Category::create([
            'category_code' => $request->category_code,
            'category_name' => $request->category_name,
        ]);

        toast('Kategori Dibuat!', 'success');

        return redirect()->route('product-categories.index');
    }


    public function edit($id)
    {
        abort_if(Gate::denies('access_product_categories'), 403);

        $category = Category::findOrFail($id);

        return view('product::categories.edit', compact('category'));
    }


    public function update(Request $request, $id)
    {
        abort_if(Gate::denies('access_product_categories'), 403);

        $request->validate([
            'category_code' => 'required|unique:categories,category_code,' . $id,
            'category_name' => 'required'
        ]);

        Category::findOrFail($id)->update([
            'category_code' => $request->category_code,
            'category_name' => $request->category_name,
        ]);

        toast('Kategori Produk Diperbarui!', 'info');

        return redirect()->route('product-categories.index');
    }
    public function create()
    {
        abort_if(Gate::denies('create_products-categories'), 403);

        return view('product::categories.create');
    }

    public function destroy($id)
    {
        abort_if(Gate::denies('access_product_categories'), 403);

        $category = Category::findOrFail($id);

        if ($category->products()->exists()) {
            return back()->withErrors('Can\'t delete because there are products associated with this category.');
        }

        $category->delete();

        toast('Kategori Produk Dihapus!', 'warning');

        return redirect()->route('product-categories.index');
    }
}
