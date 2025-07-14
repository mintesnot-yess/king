<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class GalleryController extends Controller
{
    public function index()
    {
        $gallery = Gallery::all();
        return view('admin.pages.gallery.index', [
            'gallery' => $gallery,
            'breadcrumbs' => [
                ['name' => 'Home', 'url' => '/admin'],
                ['name' => 'Gallery', 'url' => null],
            ],
            'currentPage' => 'Gallery',

        ]);
    }

    public function create()
    {
        return view('admin.pages.gallery.create', [
            'breadcrumbs' => [
                ['name' => 'Home', 'url' => '/admin'],
                ['name' => 'Gallery', 'url' => route('gallery.index')],
                ['name' => 'Create', 'url' => null]
            ],
            'currentPage' => 'Create Gallery',
        ],);
    }
    public function store(Request $request)
    {
        // Validate form input
        $validator = Validator::make($request->all(), [
            'type' => 'required|in:image,video',
            'videoLink' => 'required_if:type,video|nullable|url',
            'image' => 'required_if:type,image|nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $filePath = null;

        // Handle Image Upload
        if ($request->input('type') === 'image' && $request->hasFile('image')) {
            $filePath = $request->file('image')->store('gallery', 'public');
        }

        // Handle Video Link
        if ($request->input('type') === 'video') {
            $filePath = $request->input('videoLink');
        }

        // Store the gallery item
        Gallery::create([
            'type' => $request->input('type'),
            'file_path' => $filePath,
        ]);

        return redirect()->route('gallery.index')
            ->with('success', 'Gallery item created successfully.');
    }

    public function destroy(Gallery $gallery)
    {
        // Delete image file from storage if it's an image
        if ($gallery->type === 'image' && $gallery->file_path) {
            Storage::disk('public')->delete($gallery->file_path);
        }

        $gallery->delete();

        return redirect()->route('gallery.index')
            ->with('success', 'Gallery item deleted successfully.');
    }
}
