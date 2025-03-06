<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Literacy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller {
    // Método para alternar o favorito (mantendo o que você já tinha)
    public function toggle($literacyId) {
        $user = Auth::user();
        $favorite = Favorite::where('user_id', $user->id)
                            ->where('literacy_id', $literacyId)
                            ->first();

        if ($favorite) {
            $favorite->delete();
            return response()->json(['favorited' => false]);
        } else {
            Favorite::create([
                'user_id' => $user->id,
                'literacy_id' => $literacyId
            ]);
            return response()->json(['favorited' => true]);
        }
    }

    // Novo método para exibir os favoritos
    public function index() {
        $user = Auth::user();
        $literacies = Literacy::whereHas('favorites', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->get();

        return view('favorites', compact('literacies'));
    }
}
