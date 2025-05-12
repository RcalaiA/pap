<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    // Método para mostrar os detalhes de UM documento
    public function show($id)
    {
        // Encontrar o documento pelo ID ou retornar 404 caso não exista
        $document = Document::findOrFail($id);

        // Retornar a view 'documentos.show' com os dados do documento
        return view('documentos.show', compact('document'));
    }

    // Método para filtrar documentos (sem alterações)
    public function filtrar(Request $request)
    {
        $query = Document::query();

        if ($request->has('formatos') && count($request->formatos)) {
            $query->whereIn('format', $request->formatos);
        }

        if ($request->has('idiomas') && count($request->idiomas)) {
            $query->whereIn('language', $request->idiomas);
        }

        if ($request->has('faixas') && count($request->faixas)) {
            $query->whereIn('age_group', $request->faixas);
        }

        if ($request->has('ano')) {
            $query->whereYear('published_at', '>=', $request->ano);
        }

        if ($request->has('pesquisa') && $request->pesquisa !== '') {
            $query->where('title', 'like', '%' . $request->pesquisa . '%');
        }

        $documentos = $query->get();

        return response()->json([
            'html' => view('partials.documents', compact('documentos'))->render(),
        ]);
    }
}
