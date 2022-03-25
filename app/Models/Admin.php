<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Lib\Traits\Uuids;

class Admin extends Authenticatable
{
    use HasFactory;
    use Notifiable;
    use Uuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'avatar',
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'avatar' => \App\Casts\Avatar::class,
    ];



    protected $attributes = [
        'status' => 'active',
        'avatar' => '{
            "name": "default",
            "extension": "jpg",
            "mime": "image/jpg",
            "size": 2453,
            "dimension": {
                "width": 512,
                "height": 512
            },
            "status": "default",
            "sizes": {
                "thumb": {
                    "name": "default_thumb",
                    "extension": "jpg",
                    "mime": "image/jpg",
                    "size": 253,
                    "dimension": {
                        "width": 80,
                        "height": 80
                    }
                },
                "small": {
                    "name": "default_small",
                    "extension": "jpg",
                    "mime": "image/jpg",
                    "size": 953,
                    "dimension": {
                        "width": 256,
                        "height": 256
                    }
                }
            }
        }'
    ];
}
