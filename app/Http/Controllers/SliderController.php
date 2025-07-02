<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::latest()->paginate(10);

        return view(
            'admin.pages.slider.index',
            [
                'sliders' => $sliders,
                'breadcrumbs' => [
                    ['name' => 'Home', 'url' => '/admin'],
                    ['name' => 'Sliders ', 'url' => null],
                ],
                'currentPage' => 'Sliders',
            ],
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.slider.create', [
            'breadcrumbs' => [
                ['name' => 'Home', 'url' => '/admin'],
                ['name' => 'Slider', 'url' => route('slider.index')],
                ['name' => 'Create', 'url' => null]
            ],
            'currentPage' => 'Create Slider',
        ], );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the form input
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string', // TinyMCE content is just HTML string
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // max 2MB
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        // Handle image upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('slider_images', 'public');
        }
        Slider::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'image' => $imagePath,
        ]);
        // Redirect to news index with success message
        return redirect()->route('slider.index')
            ->with('success', 'Slider created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Slider $slider)
    {
        return view('admin.pages.slider.show', [
            'slider' => $slider,
            'breadcrumbs' => [
                ['name' => 'Home', 'url' => '/admin'],
                ['name' => 'Slider', 'url' => route('slider.index')],
                ['name' => 'View', 'url' => null]
            ],
            'currentPage' => 'View Slider',
        ], );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slider $slider)
    {
        return view('admin.pages.slider.edit', [
            'slider' => $slider,
            'breadcrumbs' => [
                ['name' => 'Home', 'url' => '/admin'],
                ['name' => 'Slider', 'url' => route('slider.index')],
                ['name' => 'Edit', 'url' => null]
            ],
            'currentPage' => 'Edit Slider',
        ], );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Handle image upload
        $imagePath = $slider->image; // default to existing image
        if ($request->hasFile('image')) {

            // Delete old image if exists
            if ($slider->image && Storage::disk('public')->exists($slider->image)) {
                Storage::disk('public')->delete($slider->image);
            }

            // Store new image
            $imagePath = $request->file('image')->store('slider_images', 'public');
        }

        // Update slider
        $slider->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
        ]);

        return redirect()->route('slider.show', $slider->id)->with('success', 'Slider updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider)
    {
        $slider->delete();

        // Optionally, delete the image file if it exists
        if ($slider->image) {
            Storage::disk('public')->delete($slider->image);
        }

        return redirect()->route('slider.index')->with('success', 'Slider deleted successfully.');
    }
}
