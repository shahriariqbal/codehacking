<?php
namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests;

class AdminCategoriesController extends Controller
{


    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }


      public function store(Request $request)
    {
        Category::create($request->all());
        return redirect('/admin/categories');
    }


    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }


    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->update($request->all());
        return redirect('/admin/categories');
    }


    public function destroy($id)
    {
        Category::findOrFail($id)->delete();
        return redirect('/admin/categories');
    }
}
