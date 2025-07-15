<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonialsList = Testimonial::latest()->paginate(10);

        return view(
            'admin.pages.client.testimonial.index',
            [
                'testimonialsList' => $testimonialsList,
                'breadcrumbs' => [
                    ['name' => 'Home', 'url' => '/admin'],
                    ['name' => 'Testimonials ', 'url' => null],
                ],
                'currentPage' => 'Testimonials',
            ],
        );
    }

    public function create()
    {
        return view('admin.pages.client.testimonial.create', [
            'breadcrumbs' => [
                ['name' => 'Home', 'url' => '/admin'],
                ['name' => 'Testimonial', 'url' => route('testimonial.index')],
                ['name' => 'Create', 'url' => null]
            ],
            'currentPage' => 'Create Testimonial',
        ],);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the form input
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'text' => 'required|string', // TinyMCE content is just HTML string
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
            $imagePath = $request->file('image')->store('clients_images', 'public');
        }
        Testimonial::create([
            'name' => $request->input('name'),
            'text' => $request->input('text'),
            'image' => $imagePath,
        ]);
        // Redirect to news index with success message
        return redirect()->route('testimonial.index')
            ->with('success', 'Testimonial created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Testimonial $testimonial)
    {
        return view('admin.pages.client.testimonial.show', [
            'testimonial' => $testimonial,
            'breadcrumbs' => [
                ['name' => 'Home', 'url' => '/admin'],
                ['name' => 'Testimonial', 'url' => route('testimonial.index')],
                ['name' => 'View', 'url' => null]
            ],
            'currentPage' => 'View Testimonial',
        ],);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Testimonial $testimonial)
    {
        return view('admin.pages.client.testimonial.edit', [
            'testimonial' => $testimonial,
            'breadcrumbs' => [
                ['name' => 'Home', 'url' => '/admin'],
                ['name' => 'Testimonial', 'url' => route('testimonial.index')],
                ['name' => 'Edit', 'url' => null]
            ],
            'currentPage' => 'Edit Testimonial',
        ],);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'text' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = $testimonial->image; // default to existing image
        if ($request->hasFile('image')) {

            // Delete old image if exists
            if ($testimonial->image && Storage::disk('public')->exists($testimonial->image)) {
                Storage::disk('public')->delete($testimonial->image);
            }

            // Store new image
            $imagePath = $request->file('image')->store('clients_images', 'public');
        }

        // Update news
        $testimonial->update([
            'name' => $request->name,
            'text' => $request->text,
            'image' => $imagePath,
        ]);

        return redirect()->route('testimonial.show', $testimonial->id)->with('success', 'Testimonial updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();

        // Optionally, delete the image file if it exists
        if ($testimonial->image) {
            Storage::disk('public')->delete($testimonial->image);
        }

        return redirect()->route('testimonial.index')->with('success', 'Testimonial deleted successfully.');
    }
}
