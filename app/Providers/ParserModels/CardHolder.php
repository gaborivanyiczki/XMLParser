<?php
/**
 * Created by PhpStorm.
 * User: gabor.ivanyiczki
 * Date: 8/16/2018
 * Time: 9:48 AM
 */

namespace App\Providers\ParserModels;


class CardHolder extends Parser
{
    public $main_tag = "cho";
    public $cho_code;
    public $client_code;
    public $cho_title;
    public $cho_first_name;
    public $cho_middle_name;
    public $cho_last_name;
    public $cho_dob;
    public $cho_email;
    public $cho_tel_1;
    public $cho_tel_2;
    public $cho_add_line_1;
    public $cho_add_line_2;
    public $cho_add_line_3;
    public $cho_add_town;
    public $cho_add_postcode;
    public $cho_country;
    public $cho_employee_ref;


}