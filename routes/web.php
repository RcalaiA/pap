<?php

use App\Models\Category;
use App\Models\Literacy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\LiteracyController;
use App\Http\Controllers\DocumentController;
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

// Rota para filtrar os documentos
Route::post('/documents/filter', [DocumentController::class, 'filtrar'])->name('documents.filter');

// Rota para mostrar os detalhes de um documento
Route::get('/documentos/{id}', [DocumentController::class, 'show'])->name('documents.show'); // Alterado para 'show'

// Rota para criar literacia
Route::get('/literacias/create', function () {
    return view('literacies.create');
});

// Rota para mostrar a literacia
Route::get('/literacias/{slug}', function ($slug) {    
    $literacy = Literacy::where('slug', $slug)->with('documents')->first();    
    return view('literacies.show', compact('literacy'));
});

// Rota para filtrar literacias
Route::post('/literacies/filter', [LiteracyController::class, 'filter'])->name('literacies.filter');

// Rota para salvar literacia
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

// Rotas de favoritos e dashboard
Route::middleware(['auth'])->group(function () {
    Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites.index');
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
