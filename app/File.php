<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $user_id
 * @property string $file_name
 * @property string $path
 * @property string $created_at
 * @property string $updated_at
 * @property User $user
 */
class File extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['user_id', 'file_name', 'path', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
