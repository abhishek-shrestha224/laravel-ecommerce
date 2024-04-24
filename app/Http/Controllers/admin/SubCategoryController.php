<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $subCategories = SubCategory::select('sub_categories.*', 'categories.name as categoryName')->latest('id')->leftJoin('categories', 'categories.id', 'sub_categories.category_id');

        if (!empty($request->get('keyword'))) {
            $subCategories = $subCategories->where('sub_categories.name', 'like', '%' . $request->get('keyword') . '%');
        }

        $subCategories = $subCategories->paginate(10);

        return view('admin.sub-category.index', ['subCategories' => $subCategories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::orderBy('name', 'ASC')->get();
        return view('admin.sub-category.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'slug' => 'required|unique:sub_categories',
            'category' => 'required',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('sub-categories.create')->withErrors($validator)->withInput($request->only('name', 'status'));
        }

        $subCategory = new SubCategory();
        $subCategory->name = $request->name;
        $subCategory->slug = $request->slug;
        $subCategory->status = $request->status;
        $subCategory->category_id = $request->category;
        $subCategory->save();

        return redirect()->route('sub-categories.index')->with('msg', 'New Sub Category Created Sucessfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $subCategoryId)
    {
        $subCategory = SubCategory::findOrFail($subCategoryId);
        $categories = Category::orderBy('name', 'ASC')->get();
        return view('admin.sub-category.edit', ['subCategory' => $subCategory, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $subCategoryId)
    {
        $subCategory = SubCategory::findOrFail($subCategoryId);

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'slug' => 'required|unique:sub_categories,slug,' . $subCategory->id,
            'category' => 'required',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('sub-categories.edit', $subCategoryId)->withErrors($validator)->withInput($request->only('name'));
        }

        $subCategory->name = $request->name;
        $subCategory->slug = $request->slug;
        $subCategory->status = $request->status;
        $subCategory->category_id = $request->category;
        $subCategory->save();

        return redirect()->route('sub-categories.index')->with('msg', 'Sub Category Updated Sucessfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($subCategoryId, Request $request)
    {
        $subCategory = SubCategory::findOrFail($subCategoryId);

        $subCategory->delete();

        return redirect()->route('sub-categories.index')->with('msg', 'Sub Category Deleted Sucessfully.');
    }
}
