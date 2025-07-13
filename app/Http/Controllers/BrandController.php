<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::all();
        return view('admin.pages.brands.index', [
            'brands' => $brands,
            'breadcrumbs' => [
                ['name' => 'Home', 'url' => '/admin'],
                ['name' => 'Brands', 'url' => null],
            ],
            'currentPage' => 'Brands',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.brands.create', [
            'breadcrumbs' => [
                ['name' => 'Home', 'url' => '/admin'],
                ['name' => 'Brands', 'url' => route('brand.index')],
                ['name' => 'Create', 'url' => null]
            ],
            'currentPage' => 'Create Brand',
        ],);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the form input
        $validator = Validator::make($request->all(), [
            'image' => 'required|mimes:jpeg,png,jpg,svg|max:2048', // max 2MB
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        // Handle image upload image
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('brand_images', 'public');
        }

        Brand::create([
            'image' => $imagePath,
        ]);
        // Redirect to Brand index with success message
        return redirect()->route('brand.index')
            ->with('success', 'Brand created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        return view('admin.pages.brands.show', [
            'brand' => $brand,
            'breadcrumbs' => [
                ['name' => 'Home', 'url' => '/admin'],
                ['name' => 'Brand', 'url' => route('brand.index')],
                ['name' => 'View', 'url' => null]
            ],
            'currentPage' => 'View Brand',
        ],);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();

        // Optionally, delete the image file if it exists
        if ($brand->image) {
            Storage::disk('public')->delete($brand->image);
        }

        return redirect()->route('brand.index')->with('success', 'brand deleted successfully.');
    }
}
