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

        // Filtros comuns (GET ou AJAX)
        if ($request->filled('format')) {
            $query->whereIn('format', (array) $request->input('format'));
        }

        if ($request->filled('age_group')) {
            $query->whereIn('age_group', (array) $request->input('age_group'));
        }

        if ($request->boolean('is_interactive')) {
            $query->where('is_interactive', true);
        }

        if ($request->boolean('has_download')) {
            $query->where('has_download', true);
        }

        if ($request->filled('language')) {
            $query->whereIn('language', (array) $request->input('language'));
        }

        if ($request->filled('font')) {
            $query->whereIn('font', (array) $request->input('font'));
        }

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        $documents = $request->ajax() ? $query->get() : $query->paginate(12);

        // Se AJAX, devolve só o HTML da lista de documentos
        if ($request->ajax()) {
            $html = view('partials.documents', ['documents' => $documents])->render();
            return response()->json(['html' => $html]);
        }

        // Filtros dinâmicos (para os dropdowns/checklists da sidebar)
        $formats = $literacy->documents()->select('format')->distinct()->pluck('format')->sort()->values();
        $ageGroups = $literacy->documents()->select('age_group')->distinct()->pluck('age_group')->sort()->values();
        $languages = $literacy->documents()->select('language')->distinct()->pluck('language')->sort()->values();
        $fonts = $literacy->documents()->select('font')->distinct()->pluck('font')->sort()->values();

        return view('literacies.show', compact('literacy', 'documents', 'formats', 'ageGroups', 'languages', 'fonts'));
    }
}
