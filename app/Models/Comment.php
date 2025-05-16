<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'content',
        'user_id',
        'document_id',
        'parent_id',
    ];

    // Relação com usuário
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relação com documento
    public function document()
    {
        return $this->belongsTo(Document::class);
    }

    // Relação para respostas (filhas)
    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id')->with('user', 'replies');
    }
}
