<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{




    public function index()
    {
        $categories = Category::all();
        return view(
            'admin.pages.category.index',
            [
                'categories' => $categories,
                'breadcrumbs' => [
                    ['name' => 'Home', 'url' => '/admin'],
                    ['name' => 'Category ', 'url' => null],
                ],
                'currentPage' => 'Category',
            ],
        );
    }

    public function create()
    {

        $category = Category::latest()->paginate(10);

        return view(
            'admin.pages.category.create',
            [
                'cate$category' => $category,
                'breadcrumbs' => [
                    ['name' => 'Home', 'url' => '/admin'],
                    ['name' => 'Category ', 'url' => null],
                ],
                'currentPage' => 'Category',
            ],
        );
    }

    public function store(Request $request)
    {
        // Validate the form input
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255|unique:categories,title',
            'description' => 'nullable|string',

        ]);


        // dd($request->all());

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        // Handle image upload

        Category::create([
            'title' => $request->input('title'),
            'description' => $request->input('text') ?? null,

        ]);
        // Redirect to news index with success message
        return redirect()->route('category.index')
            ->with('success', 'Category created successfully.');
    }
    public function edit(Category $category)
    {
        return view(
            'admin.pages.category.edit',
            [
                'category' => $category,
                'breadcrumbs' => [
                    ['name' => 'Home', 'url' => '/admin'],
                    ['name' => 'Category ', 'url' => null],
                ],
                'currentPage' => 'Category',
            ],
        );
    }
    // destroy
    public function destroy(Category $category)
    {
        // Delete the category
        $category->delete();

        // Redirect to the index page with a success message
        return redirect()->route('category.index')
            ->with('success', 'Category deleted successfully.');
    }
}
