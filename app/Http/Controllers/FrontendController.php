<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\News;
use App\Models\Product;
use App\Models\Service;
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
        $images = [];
        if ($product->images) {
            $decoded = json_decode($product->images, true);
            $images = is_array($decoded) ? $decoded : [$product->images];
        }


        return view('frontend.pages.product_detail', [
            'product' => $product,
            'images' => $images
        ]);
    }

    public function service()
    {
        $services = Service::all();
        return view('frontend.pages.service', [
            'services' => $services,
        ]);
    }
    public function serviceDetails($id)
    {
        $service = Service::findOrFail($id);
        $images = [];
        if ($service->images) {
            $decoded = json_decode($service->images, true);
            $images = is_array($decoded) ? $decoded : [$service->images];
        }


        return view('frontend.pages.service_detail', [
            'service' => $service,
            'images' => $images
        ]);
    }
}
