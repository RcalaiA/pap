<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Document;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Document $document)
    {
        $request->validate([
            'content' => 'required|string',
            'parent_id' => 'nullable|exists:comments,id',
        ]);

        $comment = new Comment();
        $comment->content = $request->input('content');
        $comment->user_id = auth()->id();
        $comment->document_id = $document->id;
        $comment->parent_id = $request->input('parent_id'); // pode ser null
        $comment->save();

        return redirect()->back()->with('success', 'Comentário enviado com sucesso!');
    }
}
