<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Literacy;

class LiteracyController extends Controller
{
    // NOVO: Lista todas as literacias, favoritas primeiro (para a página principal por exemplo)
    public function index()
    {
        $literacies = Literacy::all();

        if (Auth::check()) {
            $literacies = $literacies->sortByDesc(function ($literacy) {
                return $literacy->isFavoritedByAuthUser();
            });
        }

        return view('literacies.index', compact('literacies')); // Altere o nome da view se necessário
    }

    // Já existente: Mostra uma literacia e seus documentos filtrados
    public function show($slug, Request $request)
    {
        $literacy = Literacy::where('slug', $slug)->firstOrFail();
        $query = $literacy->documents();

        // Filtros comuns (GET)
        if ($request->filled('formato')) {
            $query->whereIn('format', $request->input('formato'));
        }

        if ($request->filled('faixa')) {
            $query->whereIn('age_group', $request->input('faixa'));
        }

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        // Filtro de idioma
        if ($request->filled('idioma')) {
            $query->whereIn('language', $request->input('idioma'));
        }

        // Filtro de ano
        if ($request->filled('ano')) {
            $query->whereYear('created_at', '=', $request->input('ano'));
        }

        // Paginação dos documentos
        $documents = $query->paginate(12);
        $noDocuments = $documents->isEmpty();

        return view('literacies.show', compact('literacy', 'documents', 'noDocuments'));
    }
}
