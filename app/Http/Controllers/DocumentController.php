<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    // Mostrar detalhes de um documento
    public function show($id)
    {
        $document = Document::findOrFail($id);
        return view('documentos.show', compact('document'));
    }

    // Método para filtrar documentos
    public function filtrar(Request $request)
    {
        $query = Document::query();

        if ($request->filled('formato')) {
            $query->where('format', $request->formato);
        }

        if ($request->filled('idioma')) {
            $query->where('language', $request->idioma);
        }

        if ($request->filled('faixa')) {
            $query->where('age_group', $request->faixa);
        }

        if ($request->filled('data_inicio') && $request->filled('data_fim')) {
            $query->whereBetween('created_at', [$request->data_inicio, $request->data_fim]);
        } elseif ($request->filled('data_inicio')) {
            $query->whereDate('created_at', '>=', $request->data_inicio);
        } elseif ($request->filled('data_fim')) {
            $query->whereDate('created_at', '<=', $request->data_fim);
        }

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        $documentos = $query->get();

        return response()->json([
            'html' => view('partials.documents', compact('documentos'))->render(),
        ]);
    }

    // Novo método para alternar o like/unlike de um documento
    public function toggleLike(Document $document)
    {
        $user = auth()->user();

        if (!$user) {
            return response()->json(['error' => 'Usuário não autenticado'], 403);
        }

        $liked = $document->likes()->where('user_id', $user->id)->exists();

        if ($liked) {
            $document->likes()->detach($user->id);
            return response()->json(['liked' => false]);
        } else {
            $document->likes()->attach($user->id);
            return response()->json(['liked' => true]);
        }
    }
}
