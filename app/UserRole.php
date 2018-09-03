<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $user_id
 * @property int $role_id
 * @property string $created_at
 * @property string $updated_at
 */
class UserRole extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['user_id', 'role_id', 'created_at', 'updated_at'];

}
