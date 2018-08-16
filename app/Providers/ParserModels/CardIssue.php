<?php
/**
 * Created by PhpStorm.
 * User: gabor.ivanyiczki
 * Date: 8/16/2018
 * Time: 10:10 AM
 */

namespace App\Providers\ParserModels;


class CardIssue extends Card
{
    public $tag = "card_issue";
    public $card_seq_no_start;
    public $card_seq_no_end;
    public $client_code;
    public $card_cli_name;
    public $cho_code;
    public $fulfil_data_2;
    public $fulfil_data_3;
    public $prc_code;
    public $delivery_code;
    public $disp_title;
    public $disp_first_name;
    public $disp_last_name;
    public $disp_add_line_1;
    public $disp_add_line_2;
    public $disp_add_line_3;
    public $disp_add_town;
    public $disp_add_postcode;
    public $disp_country;


}