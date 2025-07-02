<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use App\Models\News;
use App\Models\Slider;
use App\Models\Testimonial;

class DashboardController extends Controller
{
    public function index()
    {
        $newsCount = News::count();
        $testimonialCount = Testimonial::count();
        $sliderCount = Slider::count();

        $latestNews = News::latest()->take(3)->get();
        $latestTestimonials = Testimonial::latest()->take(3)->get();
        $latestHeroes = Hero::latest()->take(3)->get();

        return view("admin.pages.dashboard", [
            'newsCount' => $newsCount,
            'testimonialCount' => $testimonialCount,
            'sliderCount' => $sliderCount,
            'latestNews' => $latestNews,
            'latestTestimonials' => $latestTestimonials,
            'latestHeroes' => $latestHeroes,
            'breadcrumbs' => [
                ['name' => 'Home', 'url' => '/admin'],
                ['name' => 'Dashboard', 'url' => null],
            ],
            'currentPage' => 'Dashboard',
        ]);
    }
}
