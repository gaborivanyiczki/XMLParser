<?php
/**
 * Created by PhpStorm.
 * User: gabor.ivanyiczki
 * Date: 8/16/2018
 * Time: 10:42 AM
 */

namespace App\Providers\ParserModels;


class ActivateCard extends Parser
{
    public $main_tag = "card";
    public $tag = "activate_card";
    public $card_seq_no;
}