<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $request_id
 * @property int $status_id
 * @property string $action_ref
 * @property string $topup_amt
 * @property string $expiry_date
 * @property string $card_seq_no_start
 * @property string $created_at
 * @property string $updated_at
 * @property string $sponsor_code
 * @property Request $request
 */
class CardLoad extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'card_load';

    /**
     * @var array
     */
    protected $fillable = ['request_id', 'status_id', 'action_ref', 'topup_amt', 'expiry_date', 'card_seq_no_start', 'created_at', 'updated_at', 'sponsor_code'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function request()
    {
        return $this->belongsTo('App\Request');
    }
}
