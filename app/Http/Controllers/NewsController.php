<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;



class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $newsList = News::latest()->paginate(10);

        return view(
            'admin.pages.news.index',
            [
                'newsList' => $newsList,
                'breadcrumbs' => [
                    ['name' => 'Home', 'url' => '/admin'],
                    ['name' => 'News', 'url' => null],
                ],
                'currentPage' => 'News',
            ],
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.news.create', [
            'breadcrumbs' => [
                ['name' => 'Home', 'url' => '/admin'],
                ['name' => 'News', 'url' => route('news.index')],
                ['name' => 'Create', 'url' => null]
            ],
            'currentPage' => 'Create News',
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
            $imagePath = $request->file('image')->store('news_images', 'public');
        }
        News::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'image' => $imagePath,
        ]);
        // Redirect to news index with success message
        return redirect()->route('news.index')
            ->with('success', 'News created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        return view('admin.pages.news.show', [
            'news' => $news,
            'breadcrumbs' => [
                ['name' => 'Home', 'url' => '/admin'],
                ['name' => 'News', 'url' => route('news.index')],
                ['name' => 'View', 'url' => null]
            ],
            'currentPage' => 'View News',
        ],);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        return view('admin.pages.news.edit', [
            'news' => $news,
            'breadcrumbs' => [
                ['name' => 'Home', 'url' => '/admin'],
                ['name' => 'News', 'url' => route('news.index')],
                ['name' => 'Edit', 'url' => null]
            ],
            'currentPage' => 'Edit News',
        ],);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, News $news)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Handle image upload
        $imagePath = $news->image; // default to existing image
        if ($request->hasFile('image')) {

            // Delete old image if exists
            if ($news->image && Storage::disk('public')->exists($news->image)) {
                Storage::disk('public')->delete($news->image);
            }

            // Store new image
            $imagePath = $request->file('image')->store('news_images', 'public');
        }

        // Update news
        $news->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
        ]);

        return redirect()->route('news.show', $news->id)->with('success', 'News updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        $news->delete();

        // Optionally, delete the image file if it exists
        if ($news->image) {
            Storage::disk('public')->delete($news->image);
        }

        return redirect()->route('news.index')->with('success', 'News deleted successfully.');
    }
}
