<?php

use App\Models\Category;
use App\Models\Literacy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\FavoriteController;
use App\Models\Story;
use Illuminate\Support\Facades\Auth;

Auth::loginUsingId(1);

Route::get('/', function () {
    $stories = Story::all();        
    return view('welcome', compact('stories'));
})->name('welcome');

Route::get('/literacias', function () {
    $literacies = Literacy::all();
    return view('literacies.index', compact('literacies'));
});

Route::middleware(['auth'])->group(function () {
    Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites.index');
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
    $literacy = Literacy::where('slug', $slug)->with('documents')->first();    
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

Route::middleware(['auth'])->group(function () {
    Route::post('/favorite/{literacyId}', [FavoriteController::class, 'toggle'])->name('favorite.toggle');
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
