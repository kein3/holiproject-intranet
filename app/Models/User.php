<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // Import indispensable
use Illuminate\Notifications\Notifiable;
use App\Models\Team; // Import de la classe Team pour la relation

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Les champs assignables en masse.
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'bio',
        'role',
    ];

    /**
     * Les attributs qui doivent être cachés pour les tableaux.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Les casts de types de données.
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Accesseur pour obtenir l'URL de l'avatar.
     */
    public function getAvatarUrlAttribute(): string
    {
        return $this->avatar
            ? asset('storage/' . $this->avatar)
            : asset('images/default-avatar.png');
    }

    /**
     * Relation Many-to-Many vers Team.
     */
    public function teams()
    {
        return $this->belongsToMany(Team::class);
    }
}
