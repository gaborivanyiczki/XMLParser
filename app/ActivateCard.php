<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $request_id
 * @property int $status_id
 * @property string $action_ref
 * @property string $card_seq_no
 * @property string $created_at
 * @property string $updated_at
 * @property string $sponsor_code
 * @property Request $request
 * @property Status $status
 */
class ActivateCard extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'activate_card';

    /**
     * @var array
     */
    protected $fillable = ['request_id', 'status_id', 'action_ref', 'card_seq_no', 'created_at', 'updated_at', 'sponsor_code'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function request()
    {
        return $this->belongsTo('App\Request');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function status()
    {
        return $this->belongsTo('App\Status');
    }
}
