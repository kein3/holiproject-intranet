<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;           // ← Import de User

class Team extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    /**
     * Relation Many-to-Many vers User.
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
