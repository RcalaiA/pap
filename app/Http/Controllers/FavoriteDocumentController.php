<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;

class FavoriteDocumentController extends Controller
{
    public function toggle(Request $request, Document $document)
    {
        $user = auth()->user();

        if ($user->favoriteDocuments->contains($document->id)) {
            $user->favoriteDocuments()->detach($document->id);
            $favorited = false;
        } else {
            $user->favoriteDocuments()->attach($document->id);
            $favorited = true;
        }

        return response()->json(['favorited' => $favorited]);
    }
}
