<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Request;
use Laravel\Sanctum\HasApiTokens;
use OwenIt\Auditing\Contracts\Auditable;
use Yajra\Address\HasAddress;

class User extends Authenticatable implements MustVerifyEmail, Auditable
{
    use HasApiTokens, HasFactory, Notifiable, \OwenIt\Auditing\Auditable, HasAddress;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

     public function fullName() {
         return $this->first_name . ' ' . $this->last_name;
     }

    public function photo() {
        if($this->photo) {
            return $this->photo;
        }

        return 'https://api.dicebear.com/7.x/avataaars/svg?seed=' . $this->id . '&mouth=smile&eyebrows=default&backgroundColor=d7dce0&top=dreads01,dreads02,frizzle,hat,shaggy,shortCurly,shortFlat,shortRound,shortWaved,theCaesar,theCaesarAndSidePart,winterHat1,winterHat02,winterHat03,winterHat04';
    }
}
