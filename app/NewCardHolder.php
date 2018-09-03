<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * @property int $id
 * @property int $request_id
 * @property int $status_id
 * @property string $action_ref
 * @property string $cho_code
 * @property string $client_code
 * @property string $cho_title
 * @property string $cho_first_name
 * @property string $cho_middle_name
 * @property string $cho_last_name
 * @property string $cho_dob
 * @property string $cho_add_line_1
 * @property string $cho_add_line_2
 * @property string $cho_add_town
 * @property string $cho_add_postcode
 * @property string $cho_country
 * @property string $cho_employee_ref
 * @property string $created_at
 * @property string $updated_at
 * @property string $sponsor_code
 * @property Request $request
 * @property Status $status
 */
class NewCardHolder extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'new_cardholder';

    /**
     * @var array
     */
    protected $fillable = ['request_id', 'status_id', 'action_ref', 'cho_code', 'client_code', 'cho_title', 'cho_first_name', 'cho_middle_name', 'cho_last_name', 'cho_dob', 'cho_add_line_1', 'cho_add_line_2', 'cho_add_town', 'cho_add_postcode', 'cho_country', 'cho_employee_ref', 'created_at', 'updated_at', 'sponsor_code'];

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


    public static function getCount(){

        $count = DB::table('new_cardholder')->count();

        return $count;
    }
}
