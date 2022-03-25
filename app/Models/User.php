<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Lib\Traits\Uuids;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Walletable\Contracts\Walletable;

class User extends Authenticatable implements Walletable
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
        'pin',
        'password',
        'status',
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
        'status' => \App\Casts\Status::class,
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

    /**
     * Get the name of wallet owner
     *
     * @return string
     */
    public function getOwnerName()
    {
        return $this->name;
    }

    /**
     * Get the email of wallet owner
     *
     * @return string
     */
    public function getOwnerEmail()
    {
        return $this->email;
    }

    /**
     * Get the ID of owner
     *
     * @return string
     */
    public function getOwnerID()
    {
        return $this->getKey();
    }

    /**
     * Get the ID of owner
     *
     * @return string
     */
    public function getOwnerImage()
    {
        return $this->avatar->child('small')->url();
    }

    /**
     * Get the morph name of owner
     *
     * @return string
     */
    public function getOwnerMorphName()
    {
        return $this->getMorphClass();
    }

    public function wallets(): MorphMany
    {
        return $this->MorphMany(Wallet::class, 'walletable');
    }

    public function transactions()
    {
        $wallets = $this->wallets()
            ->get('id')->pluck('id')->toArray();
        return Transaction::whereIn('wallet_id', $wallets)->latest();
    }
}
