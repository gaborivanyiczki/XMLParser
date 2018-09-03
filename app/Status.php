<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $response_id
 * @property string $action_ref
 * @property string $status
 * @property string $result_code
 * @property string $result_detail
 * @property string $card_seq_no_start
 * @property string $card_seq_no_end
 * @property string $account_no
 * @property string $card_masked_pan
 * @property string $created_at
 * @property string $updated_at
 * @property Response $response
 * @property ActivateCard[] $activateCards
 * @property AdditionalCard[] $additionalCards
 * @property CardIssue[] $cardIssues
 * @property CardReissue[] $cardReissues
 * @property Client[] $clients
 * @property NewCardholder[] $newCardholders
 * @property UpdCardholder[] $updCardholders
 */
class Status extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'status';

    /**
     * @var array
     */
    protected $fillable = ['response_id', 'action_ref', 'status', 'result_code', 'result_detail', 'card_seq_no_start', 'card_seq_no_end', 'account_no', 'card_masked_pan', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function response()
    {
        return $this->belongsTo('App\Response');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function activateCards()
    {
        return $this->hasMany('App\ActivateCard');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function additionalCards()
    {
        return $this->hasMany('App\AdditionalCard');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cardIssues()
    {
        return $this->hasMany('App\CardIssue');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cardReissues()
    {
        return $this->hasMany('App\CardReissue');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function clients()
    {
        return $this->hasMany('App\Client');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function newCardholders()
    {
        return $this->hasMany('App\NewCardholder');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function updCardholders()
    {
        return $this->hasMany('App\UpdCardholder');
    }
}
