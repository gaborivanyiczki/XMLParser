<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $request_id
 * @property int $status_id
 * @property string $action_ref
 * @property string $fulfil_data_1
 * @property string $card_seq_no_start
 * @property string $card_seq_no_end
 * @property string $client_code
 * @property string $card_cli_name
 * @property string $cho_code
 * @property string $card_cho_name
 * @property string $act_code
 * @property string $fulfil_data_2
 * @property string $fulfil_data_3
 * @property string $card_exp_date
 * @property string $prc_code
 * @property string $card_design_code
 * @property string $stationery_code
 * @property string $delivery_code
 * @property string $disp_title
 * @property string $disp_first_name
 * @property string $disp_last_name
 * @property string $disp_add_line_1
 * @property string $disp_add_line_2
 * @property string $disp_add_line_3
 * @property string $disp_add_town
 * @property string $disp_add_postcode
 * @property string $disp_country
 * @property string $created_at
 * @property string $updated_at
 * @property string $sponsor_code
 * @property string $fl_prof_ext_ref
 * @property Request $request
 * @property Status $status
 */
class CardIssue extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'card_issue';

    /**
     * @var array
     */
    protected $fillable = ['request_id', 'status_id', 'action_ref', 'fulfil_data_1', 'card_seq_no_start', 'card_seq_no_end', 'client_code', 'card_cli_name', 'cho_code', 'card_cho_name', 'act_code', 'fulfil_data_2', 'fulfil_data_3', 'card_exp_date', 'prc_code', 'card_design_code', 'stationery_code', 'delivery_code', 'disp_title', 'disp_first_name', 'disp_last_name', 'disp_add_line_1', 'disp_add_line_2', 'disp_add_line_3', 'disp_add_town', 'disp_add_postcode', 'disp_country', 'created_at', 'updated_at', 'sponsor_code', 'fl_prof_ext_ref'];

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
