<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\CategoryDataTable;
use App\Helpers\Reply;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CategoryDataTable $dataTable)
    {
        return $dataTable->render('admin.categories.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::select(['id', 'name'])->get();
        return view('admin.categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $attributes = $request->validated();
        try {
            $attributes['slug'] = Str::slug($attributes['name']);
            Category::create($attributes);
            return Reply::success('Category added successfully');
        } catch (Exception $e) {
            return Reply::error('Failed to add category.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $categories = Category::select(['id', 'name'])->get();
        return view('admin.categories.edit', compact('categories', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $attributes = $request->validated();
        try {
            $attributes['slug'] = Str::slug($attributes['name']);
            $category->update($attributes);
            return Reply::success('Category updated successfully');
        } catch (Exception $e) {
            return Reply::error('Failed to update category.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        try {
            $category->delete();
            return Reply::success('Category deleted successfully');
        } catch (Exception $e) {
            return Reply::error('Failed to delete category');
        }
    }
}
