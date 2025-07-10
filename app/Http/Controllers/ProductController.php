<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index()
    {

        $productsList = Product::latest()->paginate(10);

        return view(
            'admin.pages.product.index',
            [
                'productsList' => $productsList,
                'breadcrumbs' => [
                    ['name' => 'Home', 'url' => '/admin'],
                    ['name' => 'Products', 'url' => null],
                ],
                'currentPage' => 'Products',
            ],
        );
    }
    public function create()
    {
        $categories =  Category::all();
        return view('admin.pages.product.create', [
            'categories' => $categories,
            'breadcrumbs' => [
                ['name' => 'Home', 'url' => '/admin'],
                ['name' => 'Product', 'url' => route('product.index')],
                ['name' => 'Create', 'url' => null]
            ],
            'currentPage' => 'Create Product',
        ],);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the form input
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'required|string',
        ]);


        // dd($request->all());

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        // Handle image upload
        $imagePaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePaths[] = $image->store('products', 'public');
            }
        }

        Product::create([
            'title' => $request->input('title'),
            'category' => $request->input('category'),
            'description' => $request->input('text') ?? null,
            'images' => json_encode($imagePaths),
            'is_active' => true,
        ]);
        // Redirect to news index with success message
        return redirect()->route('testimonial.index')
            ->with('success', 'Testimonial created successfully.');
    }



    public function edit(Product $product)
    {
        return view('admin.pages.product.edit', [
            'product' => $product,
            'categories' => Category::all(),
            'breadcrumbs' => [
                ['name' => 'Home', 'url' => '/admin'],
                ['name' => 'Product', 'url' => route('product.index')],
                ['name' => 'Edit', 'url' => null]
            ],
            'currentPage' => 'Edit Product',
        ],);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        // Validate the form input
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Handle image upload
        $imagePaths = $product->images ? json_decode($product->images, true) : [];
        if ($request->hasFile('images')) {
            // Optionally, delete old images here if you want to replace them
            foreach ($request->file('images') as $image) {
                $imagePaths[] = $image->store('products', 'public');
            }
        }

        $product->update([
            'title' => $request->input('title'),
            'category' => $request->input('category'),
            'description' => $request->input('description') ?? null,
            'images' => json_encode($imagePaths),
            'is_active' => true,
        ]);

        return redirect()->route('product.index')
            ->with('success', 'Product updated successfully.');
    }
    // show
    public function show(Product $product)
    {
        return view('admin.pages.product.show', [
            'product' => $product,
            'breadcrumbs' => [
                ['name' => 'Home', 'url' => '/admin'],
                ['name' => 'Product', 'url' => route('product.index')],
                ['name' => 'Product', 'url' => null]
            ],
            'currentPage' => 'Show Product',
        ]);
    }
}
