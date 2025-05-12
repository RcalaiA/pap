<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Literacy;

class LiteracyController extends Controller
{
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

        // Paginação ou pegar todos os documentos
        $documents = $query->paginate(12);

        // Verifica se não há documentos após os filtros
        $noDocuments = $documents->isEmpty();  // Se estiver vazio, significa que nenhum documento corresponde

        return view('literacies.show', compact('literacy', 'documents', 'noDocuments'));
    }
}
