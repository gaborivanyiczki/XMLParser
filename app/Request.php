<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $sponsor_id
 * @property int $user_id
 * @property string $name
 * @property string $created_at
 * @property string $updated_at
 * @property Country $country
 * @property User $user
 */
class Request extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['sponsor_id', 'user_id', 'name', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function country()
    {
        return $this->belongsTo('App\Country', 'sponsor_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
