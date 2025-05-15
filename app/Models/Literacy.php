<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Literacy extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function documents()
    {
        return $this->belongsToMany(Document::class);
    }

    public function favorites()
    {
        return $this->belongsToMany(User::class, 'favorites');
    }

    public function isFavoritedByAuthUser()
    {
        return auth()->check() && $this->favorites()->wherePivot('user_id', auth()->id())->exists();
    }
}
