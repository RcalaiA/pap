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

        // Filtros do GET
        if ($request->filled('format')) {
            $query->whereIn('format', $request->input('format'));
        }

        if ($request->filled('age_group')) {
            $query->whereIn('age_group', $request->input('age_group'));
        }

        if ($request->boolean('is_interactive')) {
            $query->where('is_interactive', true);
        }

        if ($request->boolean('has_download')) {
            $query->where('has_download', true);
        }

        if ($request->filled('language')) {
            $query->whereIn('language', $request->input('language'));
        }

        if ($request->filled('font')) {
            $query->whereIn('font', $request->input('font'));
        }

        $documents = $query->paginate(12);

        // Filtros dinâmicos
        $formats = $literacy->documents()->select('format')->distinct()->pluck('format')->sort()->values();
        $ageGroups = $literacy->documents()->select('age_group')->distinct()->pluck('age_group')->sort()->values();
        $languages = $literacy->documents()->select('language')->distinct()->pluck('language')->sort()->values();
        $fonts = $literacy->documents()->select('font')->distinct()->pluck('font')->sort()->values();

        return view('literacies.show', compact('literacy', 'documents', 'formats', 'ageGroups', 'languages', 'fonts'));
    }

    public function filter(Request $request, $id)
    {
        $literacy = Literacy::findOrFail($id);
        $query = $literacy->documents();

        if ($request->filled('format')) {
            $query->whereIn('format', $request->format);
        }

        if ($request->filled('age_group')) {
            $query->whereIn('age_group', $request->age_group);
        }

        if ($request->boolean('is_interactive')) {
            $query->where('is_interactive', true);
        }

        if ($request->boolean('has_download')) {
            $query->where('has_download', true);
        }

        if ($request->filled('language')) {
            $query->whereIn('language', $request->language);
        }

        if ($request->filled('font')) {
            $query->whereIn('font', $request->font);
        }

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        $documents = $query->get();
        $html = view('partials.documents', ['documents' => $documents])->render();

        return response()->json(['html' => $html]);
    }
}
