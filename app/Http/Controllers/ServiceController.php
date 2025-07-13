<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
    //
    public function index()
    {
        // Fetch the list of services, assuming a Service

        $serviceList = Service::all()->sortByDesc('created_at');
        return view(
            'admin.pages.service.index',
            [
                'serviceList' => $serviceList,
                'breadcrumbs' => [
                    ['name' => 'Home', 'url' => '/admin'],
                    ['name' => 'Services', 'url' => null],
                ],
                'currentPage' => 'Services',
            ],
        );
    }
    // create
    public function create()
    {
        return view('admin.pages.service.create', [
            'breadcrumbs' => [
                ['name' => 'Home', 'url' => '/admin'],
                ['name' => 'Service', 'url' => route('service.index')],
                ['name' => 'Create', 'url' => null]
            ],
            'currentPage' => 'Create Service',
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
            'description' => 'nullable|string',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);


        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        // Handle image upload
        $imagePaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePaths[] = $image->store('service', 'public');
            }
        }

        Service::create([
            'title' => $request->input('title'),
            'description' => $request->input('text') ?? null,
            'images' => json_encode($imagePaths),
            'is_active' => true,
        ]);
        // Redirect to news index with success message
        return redirect()->route('service.index')
            ->with('success', 'Service created successfully.');
    }



    public function edit(Service $service)
    {
        return view('admin.pages.service.edit', [
            'service' => $service,
            'breadcrumbs' => [
                ['name' => 'Home', 'url' => '/admin'],
                ['name' => 'Service', 'url' => route('service.index')],
                ['name' => 'Edit', 'url' => null]
            ],
            'currentPage' => 'Edit Product',
        ],);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        // Validate the form input
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Handle image upload
        $imagePaths = $service->images ? json_decode($service->images, true) : [];
        if ($request->hasFile('images')) {
            // Optionally, delete old images here if you want to replace them
            foreach ($request->file('images') as $image) {
                $imagePaths[] = $image->store('service', 'public');
            }
        }

        $service->update([
            'title' => $request->input('title'),

            'description' => $request->input('description') ?? null,
            'images' => json_encode($imagePaths),
            'is_active' => true,
        ]);

        return redirect()->route('service.index')
            ->with('success', 'Service updated successfully.');
    }

    public function show(Service $service)
    {
        return view('admin.pages.service.show', [
            'service' => $service,
            'breadcrumbs' => [
                ['name' => 'Home', 'url' => '/admin'],
                ['name' => 'Service', 'url' => route('service.index')],
                ['name' => 'Service', 'url' => null]
            ],
            'currentPage' => 'Show Service',
        ]);
    }

    // destroy product
    public function destroy(Service $service)
    {
        $service->delete();
        // delete multiple images
        if ($service->images) {
            $images = json_decode($service->images, true);
            foreach ($images as $image) {
                Storage::disk('public')->delete($image);
            }
        }

        // Redirect to the product index with a success message
        return redirect()->route('service.index')
            ->with('success', 'Service deleted successfully.');
    }
}
