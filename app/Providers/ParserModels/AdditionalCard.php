<?php
/**
 * Created by PhpStorm.
 * User: gabor.ivanyiczki
 * Date: 8/16/2018
 * Time: 10:37 AM
 */

namespace App\Providers\ParserModels;


class AdditionalCard extends Card
{
    public $tag = "add_card_issue";
    public $cho_code;
    public $prim_card_seq_no;
    public $card_seq_no;
    public $override_fee;
    public $disp_title;
    public $disp_first_name;
    public $disp_last_name;
    public $disp_add_line_1;
    public $disp_add_town;
    public $disp_add_postcode;
    public $disp_country;

}