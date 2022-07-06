<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::all();
        return view('admin.product.index', compact('product'));
    }

    public function add()
    {
        $category = Category::all();
        return view('admin.product.add', compact('category'));
    }

    public function create(Request $request)
    {
        $product = new Product();
        if ($request->hasFile('image'))
        {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('admin/product/uploads/image/',$filename);
            $product->image = $filename;
        }

        $product->cate_id = $request->input('cate_id');
        $product->name = $request->input('name');
        $product->slug = $request->input('slug');
        $product->small_description = $request->input('small_description');
        $product->description = $request->input('description');
        $product->original_price = $request->input('original_price');
        $product->selling_price = $request->input('selling_price');
        $product->tax = $request->input('tax');
        $product->qty = $request->input('qty');
        $product->status = $request->input('status') == TRUE ? '1':'0';
        $product->trending = $request->input('trending') == TRUE ? '1':'0';
        $product->meta_title = $request->input('meta_title');
        $product->meta_keywords = $request->input('meta_keywords');
        $product->meta_description = $request->input('meta_description');

        // $dataRequest = array(
        //     "cate_id"      => $request->cate_id,
        //     "name"      => $request->name,
        //     "slug"      => $request->slug,
        //     "small_description"      => $request->small_description,
        //     "description"      => $request->description,
        //     "original_price"      => $request->original_price,
        //     "selling_price"      => $request->selling_price,
        //     "image"      => $request->image,
        //     "tax"      => $request->tax,
        //     "qty"      => $request->qty,
        //     "status"      => $request->status,
        //     "trending"      => $request->trending,
        //     "meta_title"      => $request->meta_title,
        //     "meta_keywords"      => $request->meta_keywords,
        //     "meta_description"      => $request->meta_description
        // );
        // dd($dataRequest);

        $product->save();
        return redirect('/product')->with('Status', "Add Category Successfully");
    }

    public function destroy(Product $product, $id)
    {
        $product = Product::find($id);

        if ($product->image)
        {
            $path = 'admin/product/uploads/image/'.$product->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
        }

        $product->delete();

        return redirect('/product')->with('Status', "Product deleted Successfully");
    }
}
