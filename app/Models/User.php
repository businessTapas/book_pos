<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Publisher;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
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
        'phone',
        'type',
        'role_id',
        'store_id',
        'publisher_id',
        'email_verified_at',
        'password',
        'status',
        'remember_token',
        'created_at',
        'updated_at',
        'created_by',
        'parent_id'
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

    function role(){
        return $this->belongsTo(Role::class);
    }

    public function publisher()
    {
        return $this->belongsTo(Publisher::class,'publisher_id','id');
    }
    public function store()
    {
        return $this->belongsTo(Store::class,'store_id','id');

    }
}
