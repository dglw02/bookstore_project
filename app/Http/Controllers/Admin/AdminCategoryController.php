<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class AdminCategoryController extends Controller
{
    public function create()
    {
        return view('admin.category.category_create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $storeData = $request->validate([
            'category_name' => 'required|max:255',
            'category_image' => 'required|max:255',
            'category_description' => 'required|max:2000',
        ]);
        $category = Category::create($storeData);
        return redirect('/admin/category')->with('completed', 'Category has been saved!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $category_id
     * @return \Illuminate\Http\Response
     */
    public function edit($category_id)
    {
        $category = Category::findOrFail($category_id);
        return view('admin.category.category_edit', compact('category'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $category_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $category_id)
    {
        $updateData = $request->validate([
            'category_name' => 'required|max:255',
            'category_image' => 'required|max:255',
            'category_description' => 'required|max:2000',
        ]);
        Category::wherecategory_id($category_id)->update($updateData);
        return redirect('/admin/category')->with('completed', 'Category has been updated');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $category_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($category_id)
    {
        $category = Category::findOrFail($category_id);
        $category->delete();
        return redirect('/admin/category')->with('completed', 'Category has been deleted');
    }

}
