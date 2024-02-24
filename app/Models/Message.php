<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    // Relation un à plusieurs avec le modèle User
    public function user()
    {
        return $this->belongsTo(User::class); // Utilisez User::class au lieu de Message::class
    }
}
