<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $request_id
 * @property int $status_id
 * @property string $action_ref
 * @property string $crd_seq_no_orig
 * @property string $crd_seq_no_dest
 * @property string $act_code
 * @property string $override_fee
 * @property string $override_block
 * @property string $fulfil_data_1
 * @property string $card_cho_name
 * @property string $card_exp_date
 * @property string $card_design_code
 * @property string $stationery_code
 * @property string $delivery_code
 * @property string $created_at
 * @property string $updated_at
 * @property string $sponsor_code
 * @property Request $request
 * @property Status $status
 */
class CardReissue extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'card_reissue';

    /**
     * @var array
     */
    protected $fillable = ['request_id', 'status_id', 'action_ref', 'crd_seq_no_orig', 'crd_seq_no_dest', 'act_code', 'override_fee', 'override_block', 'fulfil_data_1', 'card_cho_name', 'card_exp_date', 'card_design_code', 'stationery_code', 'delivery_code', 'created_at', 'updated_at', 'sponsor_code'];

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
