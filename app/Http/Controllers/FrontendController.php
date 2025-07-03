<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\News;
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
}
