<?php

use App\Models\Category;
use App\Models\Literacy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/literacias', function () {
    $literacies = Literacy::all();
    return view('literacies.index', compact('literacies'));
});


Route::get('/sobre', function () {
    return view('about');
});

Route::get('/categories', function () {
    $categories = Category::all();    
    return view('categories.index', compact('categories'));
});

Route::get('/categories/create', function () {
    return view('categories.create');
});

Route::get('/literacias/create', function () {
    return view('literacies.create');
});

Route::get('/literacias/{slug}', function ($slug) {
    $literacy = Literacy::where('slug', $slug)->first();    
    return view('literacies.show', compact('literacy'));
});

Route::post('/literacias/store', function (Request $request) {
    $validated = $request->validate([
        'name' => 'required|min:3',        
        'slug' => 'required',
        'image' => 'image',
        'description' => 'min:3'
    ]);

    Literacy::create([
        'name' => $request->input('name'),
        'slug' => $request->input('slug'),
        'description' => $request->input('description'),
        'image' => ($request->file('image')->getClientOriginalName()),
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
