<?php

namespace App\Http\Controllers;

use App\Models\Stuff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class StuffController extends Controller
{
    public function index()
    {
        $stuffList = Stuff::all()->sortByDesc('creates_at');
        return view('admin.pages.stuff.index', [
            'stuffList' => $stuffList,
            'breadcrumbs' => [
                ['name' => 'Home', 'url' => '/admin'],
                ['name' => 'Stuff', 'url' => null],
            ],
            'currentPage' => 'Stuff',
        ]);
    }
    public function create()
    {
        return view('admin.pages.stuff.create', [
            'breadcrumbs' => [
                ['name' => 'Home', 'url' => '/admin'],
                ['name' => 'Stuff', 'url' => route('stuff.index')],
                ['name' => 'Create', 'url' => null],
            ]
        ]);
    }
    public function store(Request $request)
    {
        // validate the form
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'phone' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // max 2MB
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // handle image upload
        $imagePath = null;
        if ($request->has('image')) {
            $imagePath = $request->file('image')->store('stuff', 'public');
        }
        Stuff::create([
            'name' => $request->input('name'),
            'position' => $request->input('position'),
            'phone' => $request->input('phone'),
            'image' => $imagePath,

        ]);
        return redirect()->route('stuff.index')->with('success', 'Stuff Created Successfull');
    }
    public function show(Stuff $stuff)
    {
        return view('admin.pages.stuff.show', [
            'stuff' => $stuff,
            'breadcrumbs' => [
                ['name' => 'Home', 'url' => '/admin'],
                ['name' => 'Stuff', 'url' => route('stuff.index')],
                ['name' => 'View', 'url' => null]
            ],
            'currentPage' => 'View Stuff',

        ]);
    }
    public function edit(Stuff $stuff)
    {
        return view('admin.pages.stuff.edit', [
            'stuff' => $stuff,
            'breadcrumbs' => [
                ['name' => 'Home', 'url' => '/admin'],
                ['name' => 'Stuff', 'url' => route('stuff.index')],
                ['name' => 'Edit', 'url' => null]
            ],
            'currentPage' => 'Edit Stuff',
        ],);
    }
    public function update(Request $request, Stuff $stuff)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'phone' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imagePath = $stuff->image; // default to existing image
        if ($request->hasFile('image')) {

            // Delete old image if exists
            if ($stuff->image && Storage::disk('public')->exists($stuff->image)) {
                Storage::disk('public')->delete($stuff->image);
            }

            // Store new image
            $imagePath = $request->file('image')->store('stuff', 'public');
        }
        // Update news
        $stuff->update([
            'name' => $request->name,
            'position' => $request->position,
            'phone' => $request->phone,
            'image' => $imagePath,
        ]);

        return redirect()->route('stuff.show', $stuff->id)->with('success', 'Stuff updated successfully.');
    }
    public function destroy(Stuff $stuff)
    {
        $stuff->delete();

        // Optionally, delete the image file if it exists
        if ($stuff->image) {
            Storage::disk('public')->delete($stuff->image);
        }

        return redirect()->route('stuff.index')->with('success', 'Stuff deleted successfully.');
    }
}
