<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User; // Importar o User

class Document extends Model
{
    use HasFactory;

    // Relação muitos-para-muitos com Literacy
    public function literacies()
    {
        return $this->belongsToMany(Literacy::class, 'document_literacy');
    }

    // Relação muitos-para-muitos com User para os likes
    public function likes()
    {
        return $this->belongsToMany(User::class, 'document_likes')->withTimestamps();
    }
}
