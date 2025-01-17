<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // Relationship with Post (One-to-Many)
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    // Optional: Configure the User Factory for seeding (if not yet defined)
    public function configure()
    {
        return $this->afterCreating(function (User $user) {
            $user->posts()->saveMany(Post::factory(5)->make());
        });
    }
}
