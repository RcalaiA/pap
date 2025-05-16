<?php

use App\Models\Literacy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LiteracyController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\CommentController; // Importar o CommentController
use Illuminate\Support\Facades\Auth;

Auth::loginUsingId(1); // Corrigi o método para camelCase

// Página inicial com histórias (caso necessário)
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Rota para listar todas as literacias usando o método index do controller
Route::get('/literacias', [LiteracyController::class, 'index'])->name('literacies.index');

// Rota para mostrar os detalhes de uma literacia e seus documentos filtrados
Route::get('/literacias/{slug}', [LiteracyController::class, 'show'])->name('literacies.show');

// Rota para exibir os detalhes de um documento específico
Route::get('/documentos/{id}', [DocumentController::class, 'show'])->name('documents.show');

// Rota para filtrar documentos dentro de uma literacia (caso exista o método filter no controller)
Route::post('/literacies/{literacy}/filter', [LiteracyController::class, 'filter'])->name('literacies.filter');

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
        'image' => $request->file('image')->getClientOriginalName(),
    ]);
})->name('literacies.store');

// Rotas protegidas por autenticação
Route::middleware(['auth'])->group(function () {
    // Rota para ver favoritos
    Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites.index');
    
    // Rota para adicionar ou remover um item dos favoritos
    Route::post('/favorite/{literacyId}', [FavoriteController::class, 'toggle'])->name('favorite.toggle');

    // Rota para curtir/descurtir documento
    Route::post('/documentos/{document}/like', [DocumentController::class, 'toggleLike'])->name('documents.like');

    // Rota para criar um comentário em um documento
    Route::post('/documentos/{document}/comments', [CommentController::class, 'store'])->name('comments.store');

    // Rota para deletar um comentário (se quiser permitir deletar)
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
});

// Rota para o dashboard (Jetstream)
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
