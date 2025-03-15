<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\BrandDataTable;
use App\Helpers\Reply;
use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use App\Models\Brand;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(BrandDataTable $dataTable)
    {
        return $dataTable->render('admin.brands.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BrandRequest $request)
    {
        $attributes = $request->validated();
        try {
            if ($request->has('logo')) {
                $file = $request->file('logo');
                $fileName = "brand_" . time() . "." . $file->getClientOriginalExtension();
                $file->storeAs('images/brands', $fileName, 'public');
                $attributes['logo'] = $fileName;
            }
            $attributes['slug'] = Str::slug($attributes['name']);
            Brand::create($attributes);
            return Reply::success('Brand added successfully');
        } catch (Exception $e) {
            return Reply::error($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        return view('admin.brands.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BrandRequest $request, Brand $brand)
    {
        $attributes = $request->validated();
        try {
            if ($request->has('logo')) {
                $path = 'images/brands/' . $brand->getRawOriginal('logo');
                if ($brand->getRawOriginal('logo') && Storage::disk('public')->exists($path)) {
                    Storage::disk('public')->delete($path);
                }
                $file = $request->file('logo');
                $fileName = "brand_" . time() . "." . $file->getClientOriginalExtension();
                $file->storeAs('images/brands', $fileName, 'public');
                $attributes['logo'] = $fileName;
            }
            $attributes['slug'] = Str::slug($attributes['name']);
            $brand->update($attributes);
            return Reply::success('Brand updated successfully');
        } catch (Exception $e) {
            return Reply::error('Failed to update brand');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        try {
            $path = 'images/brands/' . $brand->getRawOriginal('logo');
            if ($brand->getRawOriginal('logo') && Storage::disk('public')->exists($path)) {
                Storage::disk('public')->delete($path);
            }
            $brand->delete();
            return Reply::success('Brand deleted successfully');
        } catch (Exception $e) {
            return Reply::error('Failed to delete brand');
        }
    }
}
