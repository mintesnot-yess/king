<?php

namespace App\Http\Controllers;

use App\Models\Stuff;
use Illuminate\Http\Request;

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
    public function stor() {}
    public function show(Stuff $stuff) {}
    public function edit() {}
    public function update() {}
    public function destroy() {}
}
