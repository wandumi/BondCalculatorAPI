<?php

namespace App\Models;

use App\Models\BondSettings;
use App\Models\Transferduty;
use App\Models\CommonSettings;
use Laravel\Sanctum\HasApiTokens;
use App\Models\PurchasePriceSettings;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

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
    ];

    public function bonds(){
        return $this->hasMany(BondSettings::class);
    }

    public function commonsettings(){
        return $this->hasMany(CommonSettings::class);
    }

    public function transfers(){
        return $this->hasMany(Transferduty::class);
    }

    public function purchaseprice(){
        return $this->hasMany(PurchasePriceSettings::class);
    } 
}
