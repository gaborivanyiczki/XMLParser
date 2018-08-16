<?php
/**
 * Created by PhpStorm.
 * User: gabor.ivanyiczki
 * Date: 8/16/2018
 * Time: 10:41 AM
 */

namespace App\Providers\ParserModels;


class CardLoad extends Parser
{
    public $main_tag = "card";
    public $tag = "card_load";
    public $topup_amt;
    public $expiry_date;
}