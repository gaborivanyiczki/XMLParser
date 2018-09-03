<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property int $user_id
 * @property string $created_at
 * @property string $updated_at
 */
class Response extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'user_id', 'created_at', 'updated_at'];

}
