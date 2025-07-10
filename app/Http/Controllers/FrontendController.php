<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\News;
use App\Models\Product;
use App\Models\Slider;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class FrontendController extends Controller
{

    public function index()
    {
        // fetch sliders, testimonials, only 3 news if needed

        $sliders = Slider::all();
        $testimonials = Testimonial::all();
        $news = News::latest()->take(3)->get();
        $brands = Brand::all();

        return view("frontend.pages.home", [
            'sliders' => $sliders,
            'testimonials' => $testimonials,
            'news' => $news,
            'brands' => $brands
        ]);
    }
    // Other methods for the frontend can be added here
    public function about()
    {
        $testimonials = Testimonial::all();
        return view('frontend.pages.about', [
            'testimonials' => $testimonials
        ]);
    }
    public function product()
    {
        // Fetch products or any other data needed for the product page
        $products = Product::all();
        $categories = Category::all();
        return view('frontend.pages.product', [
            'products' => $products,
            'categories' => $categories
        ]);
    }
    // productDetails page
    public function productDetails($id)
    {
        $product = Product::findOrFail($id);



        return view('frontend.pages.product_detail', [
            'product' => $product,
        ]);
    }
}
