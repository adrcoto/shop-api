<?php

namespace App;

use GenTux\Jwt\JwtPayloadInterface;
use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

/**
 * Class User
 *
 * @property string name
 * @property string email
 * @property string phone
 * @property string password
 * @property integer status
 * @property string avatar
 * @property integer role_id
 * @package App
 */
class User extends Model implements AuthenticatableContract, AuthorizableContract, JwtPayloadInterface
{
    use Authenticatable, Authorizable;

    /** @var int */
    const STATUS_ACTIVE = 1;

    /** @var int */
    const STATUS_INACTIVE = 0;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'role_id',
        'avatar',
        'status',
        'forgot_code'
    ];

    /**
     * The attributes excluded from the model'sss JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    protected $visible = [
        'id',
        'name',
        'email',
        'location',
        'phone',
        'avatar',
    ];

    /**
     * Jwt payload
     *
     * @return array
     */
    public function getPayload()
    {
        return [
            'id' => $this->id,
            'exp' => time() + 7200,
            'context' => [
                'email' => $this->email
            ]
        ];
    }

    /**
     * User role
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        return $this->belongsTo('App/Role');
    }

    /**
     * User Items
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function items()
    {
        return $this->hasMany('App/Item');
    }


    /**
     * User notifications
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function notifications()
    {
        return $this->hasMany('App/Notification');
    }

    /**
     * Login user
     *
     * @param $userEmail
     * @param $userPassword
     *
     * @return bool
     */
    public function login($userEmail, $userPassword)
    {
        $user = $this->where([
            'email' => $userEmail,
        ])->get()->first();

        if (!$user) {
            return false;
        }

        $password = $user->password;

        if (app('hash')->check($userPassword, $password)) {
            return $user;
        }

        return false;
    }
}
