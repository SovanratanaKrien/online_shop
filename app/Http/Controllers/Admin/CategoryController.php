<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();
        return view('admin.category.index', compact('category'));
    }

    public function add()
    {
        return view('admin.category.add');
    }

    public function create(Request $request)
    {
        $category = new Category();
        if ($request->hasFile('image'))
        {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('admin/category/uploads/image/',$filename);
            $category->image = $filename;
        }

        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->status = $request->input('status') == TRUE ? '1':'0';
        $category->popular = $request->input('popular') == TRUE ? '1':'0';
        $category->meta_title = $request->input('meta_title');
        $category->meta_descrip = $request->input('meta_descrip');
        $category->meta_keywords = $request->input('meta_keywords');

        $category->save();
        return redirect('/categories')->with('Status', "Add Category Successfully");
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request ,$id)
    {
        $category = Category::find($id);

        if ($request->hasFile('image'))
        {
            $path = 'admin/category/uploads/image/'.$category->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('admin/category/uploads/image/',$filename);
            $category->image = $filename;
        }
        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->status = $request->input('status') == TRUE ? '1':'0';
        $category->popular = $request->input('popular') == TRUE ? '1':'0';
        $category->meta_title = $request->input('meta_title');
        $category->meta_descrip = $request->input('meta_descrip');
        $category->meta_keywords = $request->input('meta_keywords');

        // $dataRequest = array(
        //     "name"      => $request->name,
        //     "description"      => $request->description,
        //     "status"      => $request->status,
        //     "popular"      => $request->popular,
        //     "meta_title"      => $request->meta_title,
        //     "meta_descrip"      => $request->meta_descrip,
        //     "meta_keywords"      => $request->meta_keywords
        // );
        // dd($dataRequest);
        $category->update();

        return redirect('/categories')->with('Status', "Updated Category Successfully");
    }

    public function destroy(Category $category, $id)
    {
        $category = Category::find($id);

        if ($category->image)
        {
            $path = 'admin/category/uploads/image/'.$category->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
        }

        $category->delete();

        return redirect('/categories')->with('Status', "Category deleted Successfully");
    }
}
