<?php
/**
 * Created by PhpStorm.
 * User: gabor.ivanyiczki
 * Date: 8/16/2018
 * Time: 10:33 AM
 */

namespace App\Providers\ParserModels;


class CardReissue extends Card
{
    public $tag = "card_reissue";
    public $crd_seq_no_orig;
    public $crd_seq_no_dest;
    public $override_fee;
    public $override_block;
    public $account_no;
    public $card_masked_pan;
}