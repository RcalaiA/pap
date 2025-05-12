<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    // Definindo a relação de muitos para muitos com a model Literacy
    public function literacies()
    {
        return $this->belongsToMany(Literacy::class, 'document_literacy');
    }
}
