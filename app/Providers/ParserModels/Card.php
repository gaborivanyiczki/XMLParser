<?php
/**
 * Created by PhpStorm.
 * User: gabor.ivanyiczki
 * Date: 8/16/2018
 * Time: 10:27 AM
 */

namespace App\Providers\ParserModels;


class Card extends Parser
{
    public $main_tag = "card";
    public $fulfil_data_1;
    public $card_cho_name;
    public $act_code;
    public $card_exp_date;
    public $card_design_code;
    public $stationery_code;
    public $delivery_code;



}